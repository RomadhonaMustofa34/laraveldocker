<?php

namespace App\Http\Controllers\Fw;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class DashboardController extends Controller
{
    public function index()
    {
        // Data bisa kamu kirim ke view kalau mau
        $data = [
            'title' => 'Dashboard',
            'message' => 'Selamat datang di halaman dashboard!',
        ];

        return view('fw.dashboard.index', $data);
    }
}
