<?php

namespace App\Http\Controllers;

use App\Lapak;
use App\Retribusi;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class LapakController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $lapaks = Retribusi::joinLapak()->sortBy('posisi');

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
        $data = [
            'retribusis' => Retribusi::all()->sortBy('kelas')
        ];


        return view('admin.lapak.tambah', $data);
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
            'posisi' => 'required',
            'luas' => 'required|numeric',
            'harga' => 'required|numeric',
            'idRetribusi' => 'required|numeric'
        ];

        $request->validate($request_validate);

        $lapak = new Lapak();

        $lapak->posisi = $request->posisi;
        $lapak->luas = $request->luas;
        $lapak->harga_sewa = $request->harga;
        $lapak->id_retribusi = $request->idRetribusi;

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
        $data = [
            'lapak' => Lapak::find($id)
        ];

        return view('admin.lapak.edit', $data);
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
        $request_validate = [
            'posisi' => 'required',
            'luas' => 'required|numeric',
            'harga' => 'required|numeric'
        ];

        $crudentials = $request->validate($request_validate);

        $lapak = Lapak::find($id);

        $lapak->updateData((object) $crudentials);

        return redirect()->route('admin.lapak.index');
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
