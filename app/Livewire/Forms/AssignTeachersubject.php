<?php

namespace App\Livewire\Forms;
use App\Models\Subject;
use Livewire\Component;

class AssignTeachersubject extends Component
{

    public $subject_id;
    public $teacher_id;
    public $teachers = [];

    public function mount($nsubject, $teachers)
    {
        $this->subject_id = $nsubject; // Inicializar el ID de la asignatura
        $this->teachers = $teachers; // Inicializar la lista de docentes

        // Verificar que el subject_id se esté inicializando correctamente

    }

    public function assignTeacher()
    {
        
        $this->validate([
            'teacher_id' => 'required|exists:teachers,id',
        ]);
        Subject::where('id', $this->subject_id)->update(['teacher_id' => $this->teacher_id]);
        session()->flash('success', 'Docente asignado correctamente al curso.');
        $this->teacher_id = null;

        $this->emit('closeModal');
    }

    public function render()
    {
        return view('livewire.forms.assign-teachersubject');
    }
}
