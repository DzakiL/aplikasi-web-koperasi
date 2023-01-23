<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;

class DashboardController extends Controller
{
    public function index()
    {
        $datas = User::all();
        // dd($datas);
        return view('admin.dashboard', compact('datas'));
    }
}
