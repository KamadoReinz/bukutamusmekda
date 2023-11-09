<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class DashboardController extends Controller
{
    public function dashboard()
    {
        $data['header_title'] = 'Dashboard';
        if (Auth::user()->role == 1)
            {
                return view('admin.dashboard', $data);
            }
            elseif (Auth::user()->role == 2)
            {
                return view('petugas.dashboard', $data);
            }
    }
}
