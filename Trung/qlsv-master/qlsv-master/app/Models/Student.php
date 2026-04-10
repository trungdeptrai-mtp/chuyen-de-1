<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Student extends Model
{
    protected $fillable = [
    'ma_sv',
    'ho_ten',
    'nam_sinh',
    'email',
    'lop'
];
}
