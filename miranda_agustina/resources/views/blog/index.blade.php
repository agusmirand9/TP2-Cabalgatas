<x-layouts.main>
    <x-slot:title>Blog</x-slot:title>

    <h1>Blog</h1>
    <p>Novedades, consejos y noticias del campo.</p>

    @if($posts->isEmpty())
        <p>Todavía no hay novedades publicadas.</p>
    @else
        <ul class="card-grid list-unstyled">
            @foreach($posts as $post)
                <li>
                    <article class="card-item">
                        @if($post->cover)
                            <img
                                src="{{ asset('storage/' . $post->cover) }}"
                                alt="{{ $post->cover_description }}"
                                class="img-fluid mb-2"
                            >
                        @endif

                        <h2>
                            <a href="{{ route('blog.show', ['slug' => $post->slug]) }}">{{ $post->title }}</a>
                        </h2>
                        <p>
                            Por {{ $post->author->name }} el
                            <time datetime="{{ $post->published_at->toDateString() }}">{{ $post->published_at->format('d/m/Y') }}</time>
                        </p>
                        <p>{{ $post->excerpt }}</p>
                        <a href="{{ route('blog.show', ['slug' => $post->slug]) }}">
                            Leer más<span class="visually-hidden"> sobre {{ $post->title }}</span>
                        </a>
                    </article>
                </li>
            @endforeach
        </ul>

        {{ $posts->links() }}
    @endif

</x-layouts.main>