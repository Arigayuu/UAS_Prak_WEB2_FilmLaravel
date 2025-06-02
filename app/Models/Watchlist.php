<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Watchlist extends Model
{
    use HasFactory;

    protected $fillable = [
        'user_id',
        'film_id',
        'status', // 'plan_to_watch', 'watching', 'completed'
        'added_at'
    ];

    protected $casts = [
        'added_at' => 'datetime'
    ];

    public function user()
    {
        return $this->belongsTo(User::class);
    }

    public function film()
    {
        return $this->belongsTo(Film::class);
    }
} 