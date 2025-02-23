<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;

class User extends Authenticatable
{
    use HasFactory, Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var list<string>
     */
    protected $fillable = [
        'name',
        'email',
        'password',
        'role',  // Menambahkan 'role' ke dalam mass assignable
    ];

    /**
     * The attributes that should be hidden for serialization.
     *
     * @var list<string>
     */
    protected $hidden = [
        'password',
        'remember_token',
    ];

    /**
     * The attributes that should be cast.
     *
     * @return array<string, string>
     */
    protected function casts(): array
    {
        return [
            'email_verified_at' => 'datetime',
            'password' => 'hashed',
        ];
    }

    /**
     * Cek apakah pengguna adalah admin.
     *
     * @return bool
     */
    public function isAdmin(): bool
    {
        return $this->role === 'admin'; // Cek apakah role adalah admin
    }

    /**
     * Cek apakah pengguna adalah user biasa.
     *
     * @return bool
     */
    public function isUser(): bool
    {
        return $this->role === 'user'; // Cek apakah role adalah user
    }
}
