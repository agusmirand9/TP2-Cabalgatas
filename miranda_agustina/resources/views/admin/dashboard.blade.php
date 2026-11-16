<x-layouts.main>
    <x-slot:title>Panel de administración</x-slot:title>

    <h1>Panel de administración</h1>
    <p>Gestioná las publicaciones del blog y revisá los usuarios del sitio desde acá.</p>

    <nav aria-label="Secciones del panel de administración">
        <ul class="card-grid list-unstyled">
            <li class="card-item card-link">
                <svg class="card-icon" xmlns="http://www.w3.org/2000/svg" width="32" height="32" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round" aria-hidden="true" focusable="false">
                    <path d="M14 2H6a2 2 0 0 0-2 2v16a2 2 0 0 0 2 2h12a2 2 0 0 0 2-2V8z"/>
                    <polyline points="14 2 14 8 20 8"/>
                    <line x1="16" y1="13" x2="8" y2="13"/>
                    <line x1="16" y1="17" x2="8" y2="17"/>
                </svg>
                <h2>
                    <a class="stretched-link" href="{{ route('admin.posts.index') }}">Novedades <span aria-hidden="true">&rarr;</span></a>
                </h2>
                <p>Creá, editá y eliminá las entradas del blog.</p>
            </li>

            <li class="card-item card-link">
                <svg class="card-icon" xmlns="http://www.w3.org/2000/svg" width="32" height="32" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round" aria-hidden="true" focusable="false">
                    <path d="M17 21v-2a4 4 0 0 0-4-4H5a4 4 0 0 0-4 4v2"/>
                    <circle cx="9" cy="7" r="4"/>
                    <path d="M23 21v-2a4 4 0 0 0-3-3.87"/>
                    <path d="M16 3.13a4 4 0 0 1 0 7.75"/>
                </svg>
                <h2>
                    <a class="stretched-link" href="{{ route('admin.users.index') }}">Usuarios <span aria-hidden="true">&rarr;</span></a>
                </h2>
                <p>Consultá los usuarios registrados y las cabalgatas que contrataron.</p>
            </li>
        </ul>
    </nav>
</x-layouts.main>