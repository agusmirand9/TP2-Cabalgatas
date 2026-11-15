<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Database\Eloquent\Casts\Attribute;

/**
 * un rol de un usuario
 */

class Role extends Model
{
    protected $primaryKey = 'role_id';
    /**
     * usuarios que tienen ese rol
     */

    /**
     * nombre del rol español en pantalla
     */
    public function label(): Attribute
    {
        return Attribute::make(
            get: fn ($value, array $attributes) => match ($attributes['name']) {
                'admin' => 'Administrador',
                default => 'Usuario',
            },
        );
    }

    public function users(): HasMany
    {
        return $this->hasMany(User::class, 'role_fk', 'role_id');
    }
}
