<x-layouts.main>
    <x-slot:title>Eliminar novedad</x-slot:title>

    <h1>Eliminar novedad</h1>

    <p>
        ¿Seguro que querés eliminar la novedad “{{ $post->title }}”, publicada el
        <time datetime="{{ $post->published_at->toDateString() }}">{{ $post->published_at->format('d/m/Y') }}</time>?
        Esta acción no se puede deshacer.
    </p>

    <form action="{{ route('admin.posts.destroy', ['post' => $post]) }}" method="post">
        @csrf

        <button type="submit" class="btn btn-danger">Sí, eliminar</button>
        <a href="{{ route('admin.posts.index') }}">No, volver al listado</a>
    </form>
    
</x-layouts.main>