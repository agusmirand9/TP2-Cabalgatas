<x-layouts.main>
    <x-slot:title>Inicio</x-slot:title>

    <section>
        <h1>{{ config('app.name') }}</h1>
        <p>Cabalgatas por el campo correntino. Descubrí la verdadera vida de estancia.</p>
    </section>

    <section>
        <h2>Nuestras cabalgatas</h2>

        @if($rides->isEmpty())
            <p>Todavía no hay cabalgatas disponibles.</p>
        @else
            <ul class="card-grid list-unstyled">
                @foreach($rides as $ride)
                    <li>
                        <article class="card-item">
                            <h3>
                                <a href="{{ route('rides.show', ['ride' => $ride]) }}">{{ $ride->name }}</a>
                            </h3>
                            <p>
                                {{ $ride->duration_label }} · Dificultad {{ $ride->difficulty }} ·
                                ${{ number_format($ride->price, 0, ',', '.') }} por persona
                            </p>
                        </article>
                    </li>
                @endforeach
            </ul>

            <p><a href="{{ route('rides.index') }}">Ver todas las cabalgatas</a></p>
        @endif
    </section>

    <section>
        <h2>Novedades</h2>

        @if($posts->isEmpty())
            <p>Todavía no hay novedades publicadas.</p>
        @else
            <ul class="card-grid list-unstyled">
                @foreach($posts as $post)
                    <li>
                        <article class="card-item">
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