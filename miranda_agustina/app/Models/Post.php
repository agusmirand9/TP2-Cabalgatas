<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

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
    protected function Casts(): array
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
        return $this->BelongsTo(User::class, 'user_fk', 'id');
    }

}
