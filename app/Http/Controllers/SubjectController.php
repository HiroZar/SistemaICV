<?php

namespace App\Http\Controllers;

use App\Models\Grade;
use App\Models\Subject;
use App\Models\Teacher;
use Illuminate\Http\Request;

class SubjectController extends Controller
{
    public function index(){
        $subjects = Subject::all();
        $teachers = Teacher::all();
        return view('project.subject.index', compact('subjects','teachers'));
    }

    public function create(){
        $grades = Grade::all();
        return view('project.subject.create', compact('grades'));
    }

    public function store(Request $request){
        $validated = $request->validate([
            'nombre' => 'required|string|max:100',
            'nivel'  => 'required|exists:grades,id',
        ],[
            'nombre.required' => 'El nombre del curso es obligatorio.',
            'nivel.required'  => 'El nivel es obligatorio.',
            'nivel.exists'    => 'El grado seleccionado no es válido.',
        ]);
        Subject::create([
            'nombre' => $validated['nombre'],
            'grade_id' => $validated['nivel'],
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
            'nivel' => 'required|in:1,2,3,4,5,6,7,8,9,10,11',
        ]);

        $subject = Subject::findOrFail($id);
        $subject->update([
            'nombre' => $validated['nombre'],
            'grade_id' => $validated['nivel'],
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
}
