<x-layouts.main>
    <x-slot:title>{{ $ride->name }}</x-slot:title>

    <article>
        <header>
            <h1>{{ $ride->name }}</h1>
        </header>

        @if($ride->cover)
            <img
                src="{{ asset('storage/' . $ride->cover) }}"
                alt="{{ $ride->cover_description }}"
                class="img-fluid mb-3"
            >
        @endif

        <div>
            {!! nl2br(e($ride->description)) !!}
        </div>

        <h2>Datos de la salida</h2>
        <dl>
            <dt>Duración</dt>
            <dd>{{ $ride->duration_label }}</dd>

            <dt>Dificultad</dt>
            <dd>{{ $ride->difficulty }}</dd>

            <dt>Precio por persona</dt>
            <dd>${{ number_format($ride->price, 0, ',', '.') }}</dd>
        </dl>
    </article>

    <p class="mt-4">
        <a href="{{ route('rides.index') }}">Volver a las cabalgatas</a>
    </p>
    
</x-layouts.main>