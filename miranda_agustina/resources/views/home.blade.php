<x-layouts.main>
    <x-slot:title>Inicio</x-slot:title>

    <section>
        <h1>{{ config('app.name') }}</h1>
        <p>Cabalgatas por el campo correntino. Descubrí la verdadera vida de estancia.</p>
    </section>

    <section>
        <h2>Nuestras cabalgatas</h2>
        <ul>
            <li>
                <h3>Cabalgata corta</h3>
                <p>Un paseo tranquilo, ideal para quienes se suben a un caballo por primera vez.</p>
            </li>
            <li>
                <h3>Cabalgata de medio día</h3>
                <p>Un recorrido más largo por el lago del campo, con una parada para descansar.</p>
            </li>
            <li>
                <h3>Cabalgata al atardecer</h3>
                <p>Una salida para ver caer el sol.</p>
            </li>
        </ul>
    </section>

    <section>
        <h2>Novedades</h2>

        @if($posts->isEmpty())
            <p>Todavía no hay novedades publicadas.</p>
        @else
            <ul class="list-unstyled">
                @foreach($posts as $post)
                    <li class="mb-3">
                        <article>
                            <h3>
                                <a href="{{ route('blog.show', ['slug' => $post->slug]) }}">{{ $post->title }}</a>
                            </h3>
                            <p>
                                <time datetime="{{ $post->published_at->toDateString() }}">{{ $post->published_at->format('d/m/Y') }}</time>
                            </p>
                            <p>{{ $post->excerpt }}</p>
                        </article>
                    </li>
                @endforeach
            </ul>

            <p><a href="{{ route('blog.index') }}">Ver todas las novedades</a></p>
        @endif
    </section>
    
</x-layouts.main>