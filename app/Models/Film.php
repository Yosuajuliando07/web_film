<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Maize\Markable\Markable;
use Maize\Markable\Models\Favorite;

class Film extends Model
{
    use HasFactory, Markable;

    protected $table = 'film';

    protected $fillable = [
        'image',
        'trailer',
        'judul',
        'deskripsi',
        'tahun',
    ];

    protected static $marks = [
        Favorite::class,
    ];

    public function jadwal()
    {
        return $this->belongsToMany(Jadwal::class, 'jadwal_tayang');
    }
}
