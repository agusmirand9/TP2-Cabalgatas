<x-layouts.main>
    <x-slot:title>{{ $post->title }}</x-slot:title>

    <article>
        <header>
            <h1>{{ $post->title }}</h1>
            <p>
                Por {{ $post->author->name }} el
                <time datetime="{{ $post->published_at->toDateString() }}">{{ $post->published_at->format('d/m/Y') }}</time>
            </p>
        </header>

        @if($post->cover)
            <img
                src="{{ asset('storage/' . $post->cover) }}"
                alt="{{ $post->cover_description }}"
                class="img-fluid mb-3"
            >
        @endif

        <p class="lead">{{ $post->excerpt }}</p>

        <div>
            {!! nl2br(e($post->content)) !!}
        </div>
    </article>

    <p class="mt-4">
        <a href="{{ route('blog.index') }}">Volver al blog</a>
    </p>
    
</x-layouts.main>