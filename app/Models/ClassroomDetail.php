<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ClassroomDetail extends Model
{
    use HasFactory;

    protected $fillable = [
        'id_classroom',
        'id_student',
        'status',
    ];

    public function student()
    {
        return $this->belongsTo(Student::class, 'id_student');
    }

    public function classroom()
    {
        return $this->belongsTo(Classroom::class, 'id_classroom');
    }
}
