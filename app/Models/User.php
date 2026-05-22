<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;

class User extends Authenticatable
{
    use HasFactory, Notifiable;

    protected $fillable = [
        'role_id',
        'name',
        'email',
        'password',
    ];

    protected $hidden = [
        'password',
        'remember_token',
    ];

    protected function casts(): array
    {
        return [
            'email_verified_at' => 'datetime',
            'password' => 'hashed',
        ];
    }

    // Relasi: User belongsTo Role
    public function role()
    {
        return $this->belongsTo(Role::class);
    }

    // Helper method untuk cek role
    public function isAdmin()
    {
        return $this->role->nama_role === 'admin';
    }

    public function isUser()
    {
        return $this->role->nama_role === 'user';
    }
}