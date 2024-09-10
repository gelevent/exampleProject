<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class TeacherPerformancePage2 extends Model
{
    protected $table = 'teacher_performance_page2';
    protected $fillable = [
        'teacher_name',
        'evaluator_name',
        'penilaian_1',
        'penilaian_2',
        'penilaian_3',
        'penilaian_4',
        'penilaian_5',
        'penilaian_6'
    ];
}
