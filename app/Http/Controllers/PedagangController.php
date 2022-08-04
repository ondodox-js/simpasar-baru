<?php

namespace App\Http\Controllers;

use App\Lapak;
use App\Pedagang;
use App\Sewa;
use DateTime;
use Illuminate\Http\Request;


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

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $lapaks = Lapak::lapakTersedia();

        request()->session()->remove('data');

        $data = [
            'lapaks' => $lapaks
        ];
        return view('admin.pedagang.tambah', $data);
    }

    public function afterCreate(Request $request){

        $request_validate = [
            'nik' => 'required|digits:16|numeric',
            'namaLengkap' => 'required|min:3',
            'noHp' => 'required|min:9|numeric',
            'alamat' => 'required|min:3',
            'idLapak' => 'required',
            'periode' => 'required|numeric'
        ];

        $request->validate($request_validate);

        $pedagang = Pedagang::pedagangObject($request);
        $lapak = Lapak::find($request->idLapak);
        $sewa = new Sewa();
        $sewa->id_lapak = $lapak->id_lapak;
        $sewa->periode = $request->periode;

        
        $data = [
            'pedagang' => $pedagang,
            'lapak' => $lapak,
            'sewa' => $sewa
        ];
        
        $request->session()->push('data', $data);
        
        return view('admin.pedagang.pembayaran', $data);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    { 
        $data = $request->session()->get('data')[0];
        Sewa::simpanDataPenyewaan($data['pedagang'], $data['lapak'], $data['sewa']);

        return redirect()->route('admin.pedagang.index');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $data = [
            'pedagang' => Pedagang::find($id)
        ];
        
        return view('admin.pedagang.show', $data);
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
            'pedagang' => Pedagang::find($id)
        ];
        return view('admin.pedagang.edit', $data);
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
            'nik' => 'required|digits:16|numeric',
            'namaLengkap' => 'required|min:3',
            'noHp' => 'required|min:9|numeric',
            'alamat' => 'required|min:3'
        ];

        $crudentials = $request->validate($request_validate);
        
        $pedagang = Pedagang::find($id);
        $pedagang->updateData((object) $crudentials);

        return redirect()->route('admin.pedagang.show', ['id' => $id]);
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

        $pedagang->deleteData();
        return redirect()->route('admin.pedagang.index');
    }
}
