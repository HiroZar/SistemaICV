<?php

namespace App\Http\Controllers;

use App\Models\Teacher;
use App\Models\User;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;

class TeacherController extends Controller
{
    public function index()
    {
        $teachers = Teacher::with('user')->get();
        return view('project.teacher.index', compact('teachers'));
    }

    public function create()
    {
        return view('project.teacher.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'nombres' => 'required|string|max:100|regex:/^[\p{L} ]+$/u',
            'apellidos' => 'required|string|max:100|regex:/^[\p{L} ]+$/u',
            'dni' => 'required|digits:8|unique:teachers,dni,'. $request->dni,
            'fecha_nacimiento' => 'required|date|before_or_equal:' . Carbon::now()->subYears(18)->toDateString(),
            'direccion' => 'string|max:100',
            'telefono' => 'string|max:15|regex:/^[+0-9\s()-]+$/',
            'especialidad' => 'required|string|max:100',
        ], [
            'dni.unique' => 'El DNI ya está en uso.',
            'dni.digits' => 'Debe ingresar un DNI válido.',
            'telefono.regex' => 'Ingrese un telefono válido.',
            'nombres.regex' => 'Ingrese un nombre valido',
            'apellidos.regex' => 'Ingrese un apellido valido',
            'fecha_nacimiento.before_or_equal' => 'Ingrese una fecha de nacimiento válida.',

        ]);
        $nombres = explode(' ', trim($request->nombres));
        $apellidos = explode(' ', trim($request->apellidos));
        $inicialNombre = strtolower(substr($nombres[0], 0, 1));
        $primerApellido = strtolower($apellidos[0]);
        $inicialSegundoApellido = strtolower(substr($apellidos[1] ?? '', 0, 1));
        $email = $inicialNombre . $primerApellido . $inicialSegundoApellido.'@icv.edu.pe';

        if (User::where('email', $email)->exists()) {
            $email = $inicialNombre . $primerApellido . $inicialSegundoApellido. rand(100, 9999) . '@icv.edu.pe';
        }

        DB::beginTransaction();
        try {
            $user = User::create([
                'name' => $request->apellidos . ' ' . $request->nombres,
                'email' => $email,
                'password' => Hash::make($request->dni),
            ]);
            $userId = $user->id;
            Teacher::create(array_merge($request->all(), ['user_id' => $userId]));
            DB::commit();
        } catch (\Exception $e) {
            DB::rollBack();
            return redirect()->route('project.teacher.create')->with('error', 'Error al registrar el docente: ' . $e->getMessage());
        }

        return redirect()->route('project.teacher.index')->with('success', 'Docente registrado exitosamente.');
    }

    public function show($id)
    {
        $teacher = Teacher::findOrFail($id);
        return view('project.teacher.show', compact('teacher'));
    }

    public function edit($id)
    {   $teacher = Teacher::findOrFail($id);
        return view('project.teacher.edit', compact('teacher'));
    }

    public function update(Request $request, $id)
    {
        $request->validate([
            'nombres' => 'required|string|max:100|regex:/^[\p{L} ]+$/u',
            'apellidos' => 'required|string|max:100|regex:/^[\p{L} ]+$/u',
            'fecha_nacimiento' => 'required|date|before_or_equal:' . Carbon::now()->subYears(18)->toDateString(),
            'direccion' => 'string|max:100',
            'telefono' => 'string|max:15|regex:/^[+0-9\s()-]+$/',
            'especialidad' => 'required|string|max:100',
        ], [
            'dni.digits' => 'Debe ingresar un DNI válido.',
            'telefono.regex' => 'Ingrese un telefono válido.',
            'nombres.regex' => 'Ingrese un nombre valido',
            'apellidos.regex' => 'Ingrese un apellido valido',
            'fecha_nacimiento.before_or_equal' => 'Ingrese una fecha de nacimiento válida.',
        ]);
        $teacher = Teacher::findOrFail($id);
        $user = User::find($teacher->user_id);
        $user->update([
            'name' => $request->apellidos . ' ' . $request->nombres,]);
        $teacher->update($request->only(['nombres','apellidos','fecha_nacimiento','direccion','telefono','especialidad']));
        return redirect()->route('project.teacher.index')->with('success', 'Docente actualizado exitosamente.');
    }

    public function destroy($id)
    {
        $teacher = Teacher::findOrFail($id);
        $teacher->delete();
        return redirect()->route('project.teacher.index')->with('success', 'Docente eliminado exitosamente.');
    }
}
