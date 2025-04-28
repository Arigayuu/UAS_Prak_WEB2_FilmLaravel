<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Comment extends Model
{
    use HasFactory;
    
    protected $fillable = ['film_id', 'name', 'content'];

    public function film()
    {
        return $this->belongsTo(Film::class);
    }
}
