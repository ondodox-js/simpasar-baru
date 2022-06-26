<?php

namespace App\Http\Controllers;

use App\Retribusi;
use Illuminate\Http\Request;

class RetribusiController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $data = [
            'retribusis' => Retribusi::all()
        ];
        return view('admin.retribusi.index', $data);
    }

    public function retribusi()
    {
        return view('retribusi');
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.retribusi.tambah');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $retribusi = new Retribusi();
        $retribusi->layanan = $request->layanan;
        $retribusi->biaya_awal = $request->biayaAwal;

        $retribusi->save();
        
        return redirect()->route('admin.retribusi.index');
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
    public function edit($id_retribusi)
    {
        $retribusi = Retribusi::find($id_retribusi);

        $data = [
            'retribusi' => $retribusi
        ];

        return view('admin.retribusi.edit', $data);
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
        dd($request);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id_retribusi)
    {
        $retribusi = Retribusi::find($id_retribusi);

        $retribusi->delete();

        return redirect()->route('admin.retribusi.index');
    }
}
