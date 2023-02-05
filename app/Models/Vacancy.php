<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Vacancy extends Model
{
    use HasFactory;

    protected $dates = [
        'last_day',
    ];

    protected $fillable = [
        'title',
        'payment_id',
        'category_id',
        'company',
        'last_day',
        'description',
        'image',
        'user_id',
        'is_published'
    ];
}
