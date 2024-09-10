<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class dataGuru extends Model
{
    use HasFactory;
    protected $table = ('data');
    protected $fillable = ['name', 'nik', 'ttl', 'guruMapel', 'jenisKelamin','pendidikan'];
}
