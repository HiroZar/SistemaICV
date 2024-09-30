<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Classroom extends Model
{
    use HasFactory;

    protected $fillable = [
        'nombre',
        'nivel',
        'grado',
        'seccion'
    ];

    public function teachers()
    {
        return $this->belongsToMany(Teacher::class, 'classroom_teacher'); // Asumiendo una relación muchos a muchos
    }

    public function students()
    {
        return $this->hasMany(ClassroomDetail::class);
    }

    public function attendances()
    {
        return $this->hasMany(Attendance::class);
    }

    public function grades()
    {
        return $this->hasMany(Grade::class);
    }
}
