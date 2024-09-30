<?php

namespace App\Http\Controllers;

use App\Models\Subject;
use Illuminate\Http\Request;

class SubjectController extends Controller
{
    public function index(){
        $subjects = Subject::all();
        return view('project.subject.index', compact('subjects'));
    }

    public function create(){
        return view('project.subject.create');
    }

    public function store(Request $request){
        $request->validate([
            'nombre' => 'required|string|max:100',
            'descripcion' => 'nullable|string|max:100',
            'nivel' => 'required|in:1,2,3,4,5,6,7,8,9,10,11',
        ]);
        Subject::create([
            'nombre' => $request->input('nombre'),
            'descripcion' => $request->input('descripcion'),
            'nivel' => $request->input('nivel'),
        ]);
        return redirect()->route('project.subject.index')->with('success', 'Curso creado exitosamente.');
    }

    public function edit($id){
        $subject = Subject::findOrFail($id);
        return view('project.subject.edit', compact('subject'));
    }

    public function update(Request $request, $id){
        $request->validate([
            'nombre' => 'required|string|max:100',
            'descripcion' => 'nullable|string|max:100',
            'nivel' => 'required|in:1,2,3,4,5,6,7,8,9,10,11',
        ]);
        $subject = Subject::findOrFail($id);
        $subject->update($request->only(['nombre', 'descripcion', 'nivel']));
        return redirect()->route('project.subject.index')->with('success', 'Curso actualizado exitosamente.');
    }

    public function destroy($id){
        $subject = Subject::findOrFail($id);
        $subject->delete();
        return redirect()->route('project.subject.index')->with('success', 'Curso eliminado con exitosamente.');
    }
}
