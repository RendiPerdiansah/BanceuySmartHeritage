<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class AdminController extends Controller
{
    public function index()
    {
        return view('layout.v_dashboard_tamplate');
    }

    public function pengunjung()
    {
        return view('welcome');
    }

    public function pengelola()
    {
        return view('welcome');
    }
}
