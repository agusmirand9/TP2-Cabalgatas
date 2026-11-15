<x-layouts.main>
    <x-slot:title>Usuarios</x-slot:title>

    <h1>Usuarios</h1>

    @if($users->isEmpty())
        <p>Todavía no hay usuarios registrados.</p>
    @else
        <div class="table-responsive">
            <table class="table">
                <caption>Usuarios registrados</caption>
                <thead>
                    <tr>
                        <th scope="col">Nombre</th>
                        <th scope="col">Email</th>
                        <th scope="col">Rol</th>
                        <th scope="col">Contrataciones</th>
                        <th scope="col">Acciones</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach($users as $user)
                        <tr>
                            <th scope="row">{{ $user->name }}</th>
                            <td>{{ $user->email }}</td>
                            <td>{{ $user->role->label }}</td>
                            <td>{{ $user->bookings_count }}</td>
                            <td>
                                <a href="{{ route('admin.users.show', ['user' => $user]) }}">
                                    Ver detalle<span class="visually-hidden"> de {{ $user->name }}</span>
                                </a>
                            </td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
        </div>

        {{ $users->links() }}
    @endif

    <p class="mt-4">
        <a href="{{ route('admin.dashboard') }}">Volver al panel</a>
    </p>

</x-layouts.main>