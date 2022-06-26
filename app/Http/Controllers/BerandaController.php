<?php

namespace App\Http\Controllers;

class BerandaController extends Controller
{
    public function index(){
        return view('user.index');
    }

    public function tentang(){
        return view('user.profile');
    }

    public function denahLapak(){
        return view('user.lokasi');
    }

    public function barangDagang(){
        return view('user.barang_dagang');
    }
}
