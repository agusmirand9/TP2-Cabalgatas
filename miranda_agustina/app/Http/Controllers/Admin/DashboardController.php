<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

/**
 * maneja el panel del admin
 */

class DashboardController extends Controller
{
    public function index()
    {
        return view('admin.dashboard');
    }
}
