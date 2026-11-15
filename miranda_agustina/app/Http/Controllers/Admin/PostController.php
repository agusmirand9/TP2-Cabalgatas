<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Post;


/**
 * maneja el abm de las novedades del blog en el admin
 */
class PostController extends Controller
{
    /**
     * muestra la lista de todas las novedades
     */
    public function index()
    {
        $posts = Post::with('author')
            ->orderBy('published_at', 'desc')
            ->paginate(10);

        return view('admin.posts.index', [
            'posts' => $posts,
        ]);
    }

    /**
     * muestra el form para crear una novedad
     */
    public function create()
    {
        return view('admin.posts.create');
    }

    /**
     * valida los datos, si hay guarda la imagen y crea la novedad con el usuario
     */
    public function store(Request $request)
    {
        $data = $request->validate([
            'title' => 'required|min:3|max:120',
            'excerpt' => 'required|min:10|max:255',
            'content' => 'required|min:20',
            'published_at' => 'required|date|after_or_equal:today',
            'cover' => 'nullable|image|mimes:jpg,jpeg,png,webp|max:2048',
            'cover_description' => 'required_with:cover|nullable|max:255',
        ], [
            'title.required' => 'El título no puede quedar vacío.',
            'title.min' => 'El título debe tener al menos :min caracteres.',
            'title.max' => 'El título no puede superar los :max caracteres.',
            'excerpt.required' => 'El resumen no puede quedar vacío.',
            'excerpt.min' => 'El resumen debe tener al menos :min caracteres.',
            'excerpt.max' => 'El resumen no puede superar los :max caracteres.',
            'content.required' => 'El contenido no puede quedar vacío.',
            'content.min' => 'El contenido debe tener al menos :min caracteres.',
            'published_at.required' => 'La fecha de publicación no puede quedar vacía.',
            'published_at.date' => 'La fecha de publicación no tiene un formato válido.',
            'published_at.after_or_equal' => 'La fecha de publicación no puede ser anterior a hoy.',
            'cover.image' => 'El archivo elegido tiene que ser una imagen.',
            'cover.mimes' => 'La imagen tiene que ser JPG, PNG o WEBP.',
            'cover.max' => 'La imagen no puede pesar más de 2 MB.',
            'cover.uploaded' => 'No se pudo subir la imagen. Probá con una de menos de 2 MB.',
            'cover_description.required_with' => 'Si subís una imagen, tenés que describirla.',
            'cover_description.max' => 'La descripción no puede superar los :max caracteres.',
        ]);

        $data['slug'] = Post::uniqueSlugFor($data['title']);
        $data['cover'] = $request->file('cover')?->store('covers');
        
        $request->user()->posts()->create($data);

        return redirect()
            ->route('admin.posts.index')
            ->with('feedback.message', 'La novedad "' . $data['title'] . '" se creó con éxito.');
    }
}
