<x-layouts.main>
    <x-slot:title>Panel de administración</x-slot:title>

    <h1>Panel de administración</h1>
    <p>Gestioná las publicaciones del blog y revisá los usuarios del sitio desde acá.</p>

    <nav aria-label="Secciones del panel de administración">
        <ul>
            <li><a href="{{ route('admin.users.index') }}">Usuarios</a></li>
            <li><a href="{{ route('admin.posts.index') }}">Novedades</a></li>
        </ul>
    </nav>

</x-layouts.main>