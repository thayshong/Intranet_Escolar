<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Grade extends Model
{
    use HasFactory;
    protected $fillable = [
        'value', 'student_id', 'subject_id'
    ];

    public function students(){
        return $this->belongsTo(Student::class);
    }
    
    public function subjects(){
        return $this->belongsTo(Suject::class);
    }
}
