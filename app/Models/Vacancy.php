<?php

namespace App\Models;

use App\Models\Payment;
use App\Models\Category;
use App\Models\Candidate;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

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

    public function payment()
    {
        return $this->belongsTo(Payment::class);
    }

    public function category()
    {
        return $this->belongsTo(Category::class);
    }

    public function candidates()
    {
        return $this->hasMany(Candidate::class);
    }
}
