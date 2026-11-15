<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Post;


class HomeController extends Controller
{
    /**
     * muestra la pagina de inicio con los ultimos post publicados
     */
    public function index()
    {
        $posts = Post::published()
            ->with('author')
            ->orderBy('published_at', 'desc')
            ->limit(3)
            ->get();

        return view('home', [
            'posts' => $posts,
        ]);
    }
}
