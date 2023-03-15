<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Candidate extends Model
{
    protected $fillable = [
        'vacancy_id',
        'user_id',
        'cv',
    ];
    use HasFactory;
}
