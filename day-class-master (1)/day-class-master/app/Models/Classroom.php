<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Classroom extends Model
{
    use HasFactory; 
    protected $fillable = [
        'id', 'name',
    ];

    //TODO: relacionamento Model Classroom
    public function students()
    {
        return $this->hasMany(Student::class);
    }

    //TODO: tabela pivo classrooms_has_teachers
    public function teachers()
    {
        return $this->belongsToMany(Teacher::class);
    }

}
