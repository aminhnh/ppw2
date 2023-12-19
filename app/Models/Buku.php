<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;

class Buku extends Model
{
    use HasFactory;
    protected $table = 'buku';
    protected $fillable = [
        'judul',
        'penulis',
        'harga',
        'tgl_terbit',
        'filename',
        'filepath',
    ];
    public function galleries(): HasMany
    {
        return $this->hasMany(Galeri::class);
    }
    public function ratings()
    {
        return $this->hasMany(Rating::class, 'buku_id');
    }
    public function favorites()
    {
        return $this->hasMany(Favorite::class);
    }
    public function categories()
    {
        return $this->belongsToMany(Category::class);
    }
}

