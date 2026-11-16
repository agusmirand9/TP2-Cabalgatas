<x-layouts.main>
    <x-slot:title>Novedades</x-slot:title>

    <h1>Novedades</h1>
    <p>
        <a class="btn btn-primary" href="{{ route('admin.posts.create') }}">Crear novedad</a>
    </p>

    @if($posts->isEmpty())
        <p>Todavía no hay novedades cargadas.</p>
    @else
        <div class="table-responsive">
            <table class="table">
                <caption>Novedades del blog</caption>
                <thead>
                    <tr>
                        <th scope="col">Título</th>
                        <th scope="col">Autor</th>
                        <th scope="col">Publicación</th>
                        <th scope="col">Estado</th>
                        <th scope="col">Acciones</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach($posts as $post)
                        <tr>
                            <th scope="row">{{ $post->title }}</th>
                            <td>{{ $post->author->name }}</td>
                            <td>
                                <time datetime="{{ $post->published_at->toDateString() }}">{{ $post->published_at->format('d/m/Y') }}</time>
                            </td>
                            <td>{{ $post->published_at->isFuture() ? 'Programada' : 'Publicada' }}</td>
                            <td>
                                <ul class="list-unstyled mb-0">
                                    <li>
                                        <a href="{{ route('admin.posts.edit', ['post' => $post]) }}">Editar<span class="visually-hidden"> {{ $post->title }}</span>
                                        </a>
                                    </li>
                                    <li>
                                        <a href="{{ route('admin.posts.delete', ['post' => $post]) }}">Eliminar<span class="visually-hidden"> {{ $post->title }}</span>
                                        </a>
                                    </li>
                                </ul>
                            </td>
                            
                        </tr>
                    @endforeach
                </tbody>
            </table>
        </div>

        {{ $posts->links() }}
    @endif

    <p class="mt-4">
        <a href="{{ route('admin.dashboard') }}">Volver al panel</a>
    </p>

</x-layouts.main>