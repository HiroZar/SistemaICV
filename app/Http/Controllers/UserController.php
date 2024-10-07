<?php

namespace App\Http\Controllers;

use App\Models\Subject;
use App\Models\Teacher;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class UserController extends Controller
{
    public function showProfileTeacher()
    {
        $user = Auth::user();
        if ($user->hasRole('teacher')) {
            $id = $user->teacher->id;
        }

        $teacher = Teacher::findOrFail($id);
        $subjects = Subject::where('teacher_id', $teacher->id)->get();
        $subjects = $subjects->sortBy(function ($subject) {
            return $subject->grade->id;
        });

        $groupedSubjects = [
            'primaria' => [],
            'secundaria' => []
        ];

        foreach ($subjects as $subject) {
            $gradeLevel = $subject->grade->nivel;
            if ($gradeLevel == 1) {
                $groupedSubjects['primaria'][$subject->grade->id][] = $subject;
            } elseif ($gradeLevel == 2) {
                $groupedSubjects['secundaria'][$subject->grade->id][] = $subject;
            }
        }
        return view('project.settings.show', compact('teacher', 'groupedSubjects'));
    }
}
