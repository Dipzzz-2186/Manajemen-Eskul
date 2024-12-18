<?php

namespace App\Models;

use App\Models\Ekskul\Ekskul;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;

class User extends Authenticatable
{
    use HasFactory, Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $fillable = [
        'name',
        'email',
        'password',
        'role', // pastikan ada kolom role
        'birth_date',
        'profile_picture',
    ];

    /**
     * The attributes that should be hidden for serialization.
     *
     * @var array<int, string>
     */
    protected $hidden = [
        'password',
        'remember_token',
    ];

    /**
     * Get the attributes that should be cast.
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
     * Relasi dengan Ekskul
     */
    public function ekskul() 
    {
        return $this->belongsTo(Ekskul::class);
    }

    /**
     * Relasi dengan Ekskul banyak
     */
    public function ekskuls()
    {
        return $this->belongsToMany(Ekskul::class, 'pendaftarans');
    }

    /**
     * Relasi dengan grades
     */
    public function grades()
    {
        return $this->belongsToMany(Ekskul::class, 'penilaians');
    }

    /**
     * Memeriksa apakah user memiliki role tertentu
     */
    public function hasRole($role)
    {
        return $this->role === $role;
    }
}
