<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Student extends Model
{
    use HasFactory;
    protected $fillable = [
        'name','id','gender','birth_date','classroom_id', 'cel'
    ];

    public function grades()
    {
        return $this->hasMany(Grade::class);
    }
    public function abcenses()
    {
        return $this->hasMany(Absence::class);
    }

    //TODO: relacionamento Model Student
    public function classrooms()
    {
        return $this->belongsTo(Classroom::class);
    }

}
