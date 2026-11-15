<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\User;

/**
 * maneja los usuarios en el panel de admin
 */
class UserController extends Controller
{
    /**
     * muestra el listado paginado de los usuarios
     */

    public function index()
    {
        $users = User::with('role')
            ->withCount('bookings')
            ->orderBy('name')
            ->paginate(10);

        return view('admin.users.index', [
            'users' => $users,
        ]);
    }

    /**
     * muestra el detall del usuario con sus reservas
     */
    public function show(User $user)
    {
        $user->load('role');

        $bookings = $user->bookings()
            ->with('ride')
            ->orderBy('ride_date', 'desc')
            ->get();

        return view('admin.users.show', [
            'user' => $user,
            'bookings' => $bookings,
        ]);
    }
}
