<?php

namespace App\Http\Controllers;

use App\Artikel;
use Illuminate\Http\Request;

class ArtikelController extends Controller
{
    public function index(){
        $artikels = Artikel::all();

        $data = [
            'artikels' => $artikels
        ];

        return view('admin.artikel.index', $data);
    }

    public function create(){
        return view('admin.artikel.tambah');
    }

    public function store(Request $request){
        Artikel::create($request->all());

        return redirect()->route('admin.artikel.index');
    }
}
