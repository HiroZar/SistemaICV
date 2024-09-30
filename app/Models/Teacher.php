<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Teacher extends Model
{
    use HasFactory;

    protected $fillable = [
        'user_id',

    ];

    public function classrooms()
    {
        return $this->hasMany(Classroom::class);
    }
    public function user()
    {
        return $this->belongsTo(User::class); // Relación de uno a uno
    }

}
