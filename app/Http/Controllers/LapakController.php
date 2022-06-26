<?php

namespace App\Http\Controllers;

use App\Lapak;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class LapakController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function viewlapak()
    {
        return view('view-lapak');
    }

    public function index()
    {
        $lapaks = Lapak::all()->sortBy('posisi');

        $data = [
            'lapaks' => $lapaks
        ];

        return view('admin.lapak.index', $data);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.lapak.tambah');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $lapak = new Lapak();

        $lapak->posisi = $request->posisi;
        $lapak->luas = $request->luas;
        $lapak->harga_sewa = $request->harga;

        $lapak->save();
        return redirect()->route('admin.lapak.index');
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
    public function destroy($id_lapak)
    {
        $lapak = Lapak::find($id_lapak);

        $lapak->delete();
        return redirect()->route('admin.lapak.index');
    }
}
