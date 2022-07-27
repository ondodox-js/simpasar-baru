<?php

namespace App\Http\Controllers;

use App\Produk;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class ProdukController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $produks = Produk::all()->sortBy('nama_produk');

        $data = [
            'produks' => $produks
        ];
        
        return view('admin.produk.index', $data);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.produk.tambah');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $request_validate = [
            'namaProduk' => 'required',
            'hargaProduk' => 'required|numeric',
            'urlGambar' => 'required|image'
        ];
        $request->validate($request_validate);
        $gambar = $request->file('urlGambar');
        $produk_baru = new Produk();
        $produk_baru->nama_produk = $request->namaProduk;
        $produk_baru->harga_terbaru = $request->hargaProduk;

        if(is_null($gambar)){
            return redirect()->route('admin.produk.index');
        }
        
        $nama_file = Storage::disk('local')->put('public/produk', $gambar);
        
        $produk_baru->url_gambar = str_replace('public', 'storage', $nama_file);
        $produk_baru->save();
        return redirect()->route('admin.produk.index');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id_produk)
    {
        $produk = Produk::find($id_produk);

        $data = [
            'produk' => $produk
        ];
        return view('admin.produk.edit', $data);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id_produk)
    {
        $produk = Produk::find($id_produk);
        $produk->nama_produk = $request->namaProduk;
        if(!is_null($request->hargaProdukBaru)){
            $produk->harga_lama = $produk->harga_terbaru;
            $produk->harga_terbaru = $request->hargaProdukBaru;
        }
        $produk->save();
        return redirect()->route('admin.produk.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id_produk)
    {
        $produk = Produk::find($id_produk);

        $produk->delete();
        return redirect()->route('admin.produk.index');
    }
}
