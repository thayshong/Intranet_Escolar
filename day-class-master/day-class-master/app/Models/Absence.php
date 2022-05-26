<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Absence extends Model
{
    use HasFactory;

    protected $fillable=[
        'date','student_id','presence'
    ];

    public function students(){
        return $this->belongsTo(Student::class);
    }
}
