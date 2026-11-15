<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Post;
use App\Models\Ride;


class HomeController extends Controller
{
    /**
     * muestra la pagina de inicio con los ultimos post publicados y cabalgatas
     */
    public function index()
    {
        $rides = Ride::orderBy('price')
            ->limit(3)
            ->get();

        $posts = Post::published()
            ->with('author')
            ->orderBy('published_at', 'desc')
            ->limit(3)
            ->get();

        return view('home', [
            'rides' => $rides,
            'posts' => $posts,
        ]);
    }
}
