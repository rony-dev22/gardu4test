<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\Auth;

class AdminController extends Controller
{
    public function dashboard()
    {
        if (Auth::user()->role !== 'admin') {
            abort(403);
        }

        return view('admin.dashboard');
    }
}