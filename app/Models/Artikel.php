<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Storage;
use App\Models\Bookmark;

class Artikel extends Model
{
    protected $fillable = ['judul', 'isi', 'gambar', 'bookmark'];

    public function bookmarks()
    {
        return $this->hasMany(Bookmark::class);
    }
}