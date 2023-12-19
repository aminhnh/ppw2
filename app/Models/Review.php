<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Review extends Model
{
    use HasFactory;
    protected $fillable = ['user_id', 'buku_id', 'rating', 'review', 'status'];
    public function user()
    {
        return $this->belongsTo(User::class, 'user_id');
    }

    public function buku()
    {
        return $this->belongsTo(Buku::class, 'buku_id');
    }
    public function rating()
    {
        return $this->belongsTo(Rating::class, 'rating_id');
    }
    public static function boot()
    {
        parent::boot();

        static::creating(function ($review) {
            $review->filterProfanity();

            $review->status = 'unmoderated';
        });
    }

    public function user()
    {
        return $this->belongsTo(User::class, 'user_id');
    }

    public function buku()
    {
        return $this->belongsTo(Buku::class, 'buku_id');
    }

    public function filterProfanity()
    {
        $this->review = str_ireplace('bad', '***', $this->review);
        $this->review = str_ireplace('anj', '***', $this->review);
    }
}
