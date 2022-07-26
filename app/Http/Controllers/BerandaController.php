<?php

namespace App\Http\Controllers;

use App\Produk;

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
        $produks = Produk::all();
        $data = [
            'produks' => $produks
        ];

        return view('user.barang_dagang', $data);
    }
}
