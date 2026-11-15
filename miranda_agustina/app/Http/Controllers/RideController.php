<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Ride;

/**
 * maneja las paginas publicadas de las cabalgatas
 */

class RideController extends Controller
{
    /**
     * muestra el listado de estas, de la mas barata a la mas cara
     */
    public function index()
    {
        $rides = Ride::orderBy('price')->get();

        return view('rides.index', [
            'rides' => $rides,
        ]);
    }

    /**
     * muestra el detalla de una cabalgata
     */

    public function show(Ride $ride)
    {
        return view('rides.show', [
            'ride' => $ride,
        ]);
    }
}
