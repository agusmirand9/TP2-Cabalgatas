<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Support\Str;

/**
 * representa una entrada del blog
 */
class Post extends Model
{
    protected $primaryKey = 'post_id';

    protected $fillable =[
        'title',
        'slug',
        'excerpt',
        'content',
        'published_at',
        'cover',
        'cover_description',
    ];
    /**
     * conversion automatica del tipo para los atributos
     */
    protected function casts(): array
    {
        return [ 
            'published_at' => 'date',
        ];
    }

    /**
     * usuario que escribio el post
     */
    public function author(): BelongsTo
    {
        return $this->belongsTo(User::class, 'user_fk', 'id');
    }

    /**
     * filtra las entradas ya publicadas por fecha de hoy
     */

    public function scopePublished(Builder $query) : void
    {
        $query->where('published_at', '<=', today());
    }

    /**
     * genera un slug unico tomando el titulo, agregando un numero si ya existe
     */

    public static function uniqueSlugFor(string $title): string
    {
        $base = Str::slug($title) ?: 'novedad';
        $slug = $base;
        $counter = 2;

        while (static::where('slug', $slug)->exists()) {
            $slug = $base . '-' . $counter;
            $counter++;
        }

        return $slug;
    }




}
