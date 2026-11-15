<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

/**
 * maneja las paginas del blog
 */

class BlogController extends Controller
{
    /**
     * muestra el listado paginado de posts publicados, del mas nuevo al viejo
     */

    public function index()
    {
        $posts = Post::published()
            ->with('author')
            ->orderBy('published_at', 'desc')
            ->paginate(6);

        return view('blog.index', [
            'posts' => $posts,
        ]);

    }

    /**
     * muestra el detalle del post
     */

    public function show(string $slug)
    {
        $post = Post::published()
            ->with('author')
            ->where('slug', $slug)
            ->firstOrFail();
            
        return view('blog.show', [
            'post' => $post,
            
        ]);
    }
}
