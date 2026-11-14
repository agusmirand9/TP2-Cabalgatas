<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;
/**
 * un rol de un usuario
 */

class Role extends Model
{
    protected $primaryKey = 'role_id';
    /**
     * usuarios que tienen ese rol
     */

    public function users(): HasMany
    {
        return $this->hasMany(User::class, 'role_fk', 'role_id');
    }
}
