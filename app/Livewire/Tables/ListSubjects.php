<?php

namespace App\Livewire\Tables;

use App\Models\Subject;
use App\Models\Teacher;
use Livewire\Component;

class ListSubjects extends Component
{
    public $teachers = [];
    public $subjects = [];

    protected $listeners = ['subjectUpdated' => 'refreshSubjects'];

    public function mount()
    {
        $this->loadData();
    }

    public function loadData()
    {
        $this->subjects = Subject::all();
        $this->teachers = Teacher::all();
    }

    public function refreshSubjects()
    {
        $this->loadData(); // Carga nuevamente los datos
    }

    public function render()
    {
        return view('livewire.tables.list-subjects');
    }
}
