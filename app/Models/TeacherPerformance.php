<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class TeacherPerformance extends Model
{
    use HasFactory;

    protected $fillable = [
        'teacher_name',
        'evaluator_name',
        'penilaian_1',
        'penilaian_2',
        'penilaian_3',
        'penilaian_4',
        'penilaian_5',
        'penilaian_6',
    ];
}
