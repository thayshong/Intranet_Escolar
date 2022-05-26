<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Teacher extends Model
{
    use HasFactory;

    protected $fillable = [
        'name','classroom_id',
    ];

    //TODO: tabela pivo classrooms_has_teachers
    public function classrooms(){
        return $this->belongsToMany(Classroom::class);
    }
    public function subjects(){
        
        return $this->hasMany(Subject::class);
    }
    public function subjects_has_teachers(){
        
        return $this->belongsToMany(Subject::class);
    }
}
