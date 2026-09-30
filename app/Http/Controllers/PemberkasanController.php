<?php

namespace App\Http\Controllers;

use App\Models\Dokumen;
use Illuminate\Support\Facades\Auth;

class PemberkasanController extends Controller
{
    public function index()
    {
        if (Auth::user()->role !== 'admin') {
            abort(403);
        }

        $pemberkasan = Dokumen::with([
            'user',
            'pemeriksaan'
        ])
            ->latest()
            ->get();

        return view('admin.pemberkasan.index', compact('pemberkasan'));
    }
}