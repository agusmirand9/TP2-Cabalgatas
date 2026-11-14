<?php

namespace App\Models;

// use Illuminate\Contracts\Auth\MustVerifyEmail;
use Database\Factories\UserFactory;
use Illuminate\Database\Eloquent\Attributes\Fillable;
use Illuminate\Database\Eloquent\Attributes\Hidden;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasMany;

#[Fillable(['name', 'email', 'password'])]
#[Hidden(['password', 'remember_token'])]
class User extends Authenticatable
{
    /** @use HasFactory<UserFactory> */
    use HasFactory, Notifiable;

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
     * rol asignado a un usuario
     */
    public function role(): BelongsTo
    {
        return $this->belongsTo(Role::class, 'role_fk', 'role_id');
    }

    /**
     * post del usuario
     */
    public function post(): HasMany
    {
        return $this->hasMany(Post::class, 'user_fk');
    }

    /**
     * reservas del usuario
     */
    public function bookings(): HasMany
    {
        return $this->hasMany(Booking::class,'user_fk');
    }

    /**
     * si el usuario es admin
     */
    public function isAdmin():bool
    {
        return $this->role->name === 'admin';
    }
}
 