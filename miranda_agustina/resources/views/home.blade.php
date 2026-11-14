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
        <p>//noticias del blog.</p>
    </section>
</x-layouts.main>