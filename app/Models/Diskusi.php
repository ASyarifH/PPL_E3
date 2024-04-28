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
    protected $table = 'diskusi'; // Tentukan nama tabel sesuai dengan yang sebenarnya
    
    protected $fillable = [
        'pertanyaan', 'jawaban', 'slug', 'user_id', // tambahkan 'title' ke dalam $fillable
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
