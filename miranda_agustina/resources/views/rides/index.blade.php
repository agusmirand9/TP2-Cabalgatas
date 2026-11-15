<x-layouts.main>
    <x-slot:title>Cabalgatas</x-slot:title>

    <h1>Cabalgatas</h1>
    <p>Elegí el recorrido que mejor se adapte a vos, desde un paseo corto hasta una jornada completa por el campo.</p>

    @if($rides->isEmpty())
        <p>Todavía no hay cabalgatas disponibles.</p>
    @else
        <ul class="list-unstyled">
            @foreach($rides as $ride)
                <li class="mb-4">
                    <article>
                        @if($ride->cover)
                            <img
                                src="{{ asset('storage/' . $ride->cover) }}"
                                alt="{{ $ride->cover_description }}"
                                class="img-fluid mb-2"
                            >
                        @endif

                        <h2>
                            <a href="{{ route('rides.show', ['ride' => $ride]) }}">{{ $ride->name }}</a>
                        </h2>
                        <p>
                            Duración: {{ $ride->duration_label }}.
                            Dificultad: {{ $ride->difficulty }}.
                        </p>
                        <p>Precio por persona: ${{ number_format($ride->price, 0, ',', '.') }}</p>
                        <a href="{{ route('rides.show', ['ride' => $ride]) }}">
                            Ver detalle<span class="visually-hidden"> de {{ $ride->name }}</span>
                        </a>
                    </article>
                </li>
            @endforeach
        </ul>
    @endif

</x-layouts.main>