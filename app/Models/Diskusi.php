<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Diskusi extends Model
{
        /**
     * The table associated with the model.
     *
     * @var string
     */
    protected $table = 'diskusi';
    
    protected $fillable = [
        'pertanyaan', 'slug', 'user_id', // tambahkan 'title' ke dalam $fillable
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
}
