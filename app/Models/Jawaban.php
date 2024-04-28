<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Jawaban extends Model
{
    protected $fillable = ['jawaban', 'user_id', 'diskusi_id'];

    public function pemilik()
    {
        return $this->belongsTo(User::class, 'user_id');
    }
}
