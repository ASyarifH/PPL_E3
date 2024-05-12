<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;

class User extends Authenticatable
{
    use HasFactory, Notifiable;

    protected $fillable = [
        'name', 'email', 'password', 'role',
    ];

    protected $hidden = [
        'password', 'remember_token',
    ];

    protected $casts = [
        'email_verified_at' => 'datetime',
    ];
    /**
     * Method untuk memperbarui data pengguna.
     *
     * @param array $data
     * @return bool
     */
    public function updateUser(array $data)
    {
        // Validasi data jika diperlukan
        // Misalnya, pastikan email yang baru tidak konflik dengan email lainnya
        if (isset($data['email']) && $data['email'] !== $this->email) {
            $this->validate($data, [
                'email' => 'required|string|email|unique:users|max:255',
            ]);
        }

        // Update data pengguna
        return $this->update($data);
    }

}