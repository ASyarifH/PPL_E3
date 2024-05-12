<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Bookmark extends Model
{
    protected $fillable = ['user_id', 'artikel_id'];

    public function artikel()
    {
        return $this->belongsTo(Artikel::class);
    }
}