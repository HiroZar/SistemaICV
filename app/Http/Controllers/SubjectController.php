<?php

namespace App\Http\Controllers;

use App\Models\Grade;
use App\Models\Subject;
use App\Models\Teacher;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class SubjectController extends Controller
{
    public function __construct()
    {
        $this->middleware('permission:subject.index', ['only' => ['index']]);
        $this->middleware('permission:subject.create', ['only' => ['create', 'store']]);
        $this->middleware('permission:subject.edit', ['only' => ['edit', 'update']]);
        $this->middleware('permission:subject.destroy', ['only' => ['destroy']]);
        $this->middleware('permission:subject.assingteacher', ['only' => ['assingteacher']]);
        $this->middleware('permission:subject.removeteacher', ['only' => ['removeteacher']]);
    }

    public function index(){
        $subjects = Subject::all();
        $teachers = Teacher::all();
        $grades = Grade::all();
        return view('project.subject.index', compact('subjects','teachers','grades'));
    }

    public function create(){
        $grades = Grade::all();
        return view('project.subject.create', compact('grades'));
    }

    public function store(Request $request){
        $validated = $request->validate([
            'nombre' => 'required|string|max:100',
            'abreviado' => 'required|string|max:10',
            'nivel'  => 'required|exists:grades,id',
        ],[
            'nombre.required' => 'El nombre del curso es obligatorio.',
            'nivel.required'  => 'El nivel es obligatorio.',
            'nivel.exists'    => 'El grado seleccionado no es válido.',
            'abreviado.required' => 'El nombre abreviado del curso es obligatorio.',
            'abreviado.max' => 'Como maximo puede contener 10 carácteres.',
        ]);
        Subject::create([
            'nombre' => $validated['nombre'],
            'grade_id' => $validated['nivel'],
            'abreviado' => $validated['abreviado'],
        ]);
        return redirect()->route('project.subject.index')->with('success', 'Curso creado exitosamente.');
    }

    public function edit($id){
        $subject = Subject::findOrFail($id);
        $grades = Grade::all();
        return view('project.subject.edit', compact('subject', 'grades'));
    }

    public function update(Request $request, $id){
        $validated = $request->validate([
            'nombre' => 'required|string|max:100',
            'abreviado' => 'required|string|max:10',
            'nivel'  => 'required|exists:grades,id',
        ]);

        $subject = Subject::findOrFail($id);
        $subject->update([
            'nombre' => $validated['nombre'],
            'grade_id' => $validated['nivel'],
            'abreviado' => $validated['abreviado'],
        ]);
        return redirect()->route('project.subject.index')->with('success', 'Curso actualizado exitosamente.');
    }

    public function assingteacher(Request $request, $id){
        $validated = $request->validate([
            'teacher_id' => 'required|exists:teachers,id',
        ]);

        $subject = Subject::findOrFail($id);
        $subject->update([
            'teacher_id' => $validated['teacher_id'],
        ]);
        return redirect()->route('project.subject.index')->with('success', 'Docente asignado correctamente');
    }

    public function removeteacher(Request $request, $id){
        $subject = Subject::findOrFail($id);
        $subject->update([
            'teacher_id' => null,
        ]);
        return redirect()->route('project.subject.index')->with('success', 'Docente removido exitosamente');
    }

    public function destroy($id){
        $subject = Subject::findOrFail($id);
        $subject->delete();
        return redirect()->route('project.subject.index')->with('success', 'Curso eliminado con exitosamente.');
    }

    public function teachersubjects(){
        $user = Auth::user();
        $teacher = Teacher::findOrFail($user->teacher->id);
        $subjects = Subject::where('teacher_id', $teacher->id)->get();
        return view('project.teacher.subjects', compact('subjects'));
    }
}
