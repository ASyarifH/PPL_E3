<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Diskusi extends Model
{
    protected $table = 'diskusi';
    
    protected $fillable = [
        'pertanyaan', 'slug', 'user_id',
    ];

    public function author()
    {
        return $this->belongsTo(User::class, 'user_id');
    }

    public function jawaban()
    {
        return $this->hasMany(Jawaban::class);
    }

    public function getRouteKeyName()
    {
        return 'slug';
    }

    public function countJawaban()
    {
        return $this->jawaban()->count();
    }
}
