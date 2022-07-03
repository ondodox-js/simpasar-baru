<?php

namespace App\Http\Controllers;

use App\Lapak;
use App\Pedagang;
use App\Sewa;
use Illuminate\Http\Request;

use Illuminate\Support\Facades\DB;

class PedagangController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $pedagangs = Pedagang::pedagangAktif();
        $data = [
            'pedagangs' => $pedagangs
        ];

        return view('admin.pedagang.index', $data);
    }

    public function viewpedagang()
    {
        $user = DB::table('pedagang')->get();

        return view('view-pedagang', compact('user'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $lapaks = Lapak::lapakTersedia();

        $data = [
            'lapaks' => $lapaks
        ];
        return view('admin.pedagang.tambah', $data);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    { 
        $request->session()->put('data_transaksi', $request->all());
        return redirect()->route('admin.transaksi.pembayaran');
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
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id_pedagang)
    {
        $pedagang = Pedagang::find($id_pedagang);

        $pedagang->delete();
        return redirect()->route('admin.pedagang.index');
    }
}
