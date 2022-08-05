<?php

namespace App\Http\Controllers;

use App\Lapak;
use App\Pedagang;
use App\Retribusi;
use App\Sewa;
use App\TransaksiRetribusi;
use Illuminate\Http\Request;

class TransaksiRetribusiController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $data = [
            'items' => TransaksiRetribusi::joinSewaLapak()
        ];


        return view('admin.transaksi-retribusi.index', $data);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        {
            request()->session()->remove('data');
    
            $data = [
                'sewas' => Sewa::joinLapak()
            ];
            return view('admin.transaksi-retribusi.create', $data);
        }
    }

    public function afterCreate(Request $request){
        $request_validate = [
            'idSewa' => 'required|numeric',
            'jumlahPeriode' => 'required|numeric'
        ];
        $request->validate($request_validate);

        if($request->jumlahPeriode < 1){
            return back()->with('message', 'Periode harus lebih besar dari 0');
        }

        $sewa = Sewa::find($request->idSewa);
        $transaksi = TransaksiRetribusi::transaksiBaru($request, $sewa);

        $data = [
            'pedagang' => Pedagang::find($sewa->id_pedagang),
            'lapak' => Lapak::find($sewa->id_lapak),
            'sewa' => $sewa,
            'transaksi' => $transaksi,
            'retribusi' => Retribusi::find($sewa->id_lapak)
        ];

        $request->session()->push('data', (object) $data['transaksi']);

        return view('admin.transaksi-retribusi.pembayaran', $data);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $transaksi = $request->session()->get('data')[0];
        $transaksi->save();

        return redirect()->route('admin.transaksi-retribusi.index');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\TransaksiRetribusi  $transaksiRetribusi
     * @return \Illuminate\Http\Response
     */
    public function show(TransaksiRetribusi $transaksiRetribusi)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\TransaksiRetribusi  $transaksiRetribusi
     * @return \Illuminate\Http\Response
     */
    public function edit(TransaksiRetribusi $transaksiRetribusi)
    {
        $data = [
            'item' => $transaksiRetribusi->findData()
        ];

        return view('admin.transaksi-retribusi.edit', $data);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\TransaksiRetribusi  $transaksiRetribusi
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, TransaksiRetribusi $transaksiRetribusi)
    {
        $request_validate = [
            'jumlahPeriode' => 'required|numeric'
        ];
        $request->validate($request_validate);

        $transaksiRetribusi->updateTransaksi($request);

        return redirect()->route('admin.transaksi-retribusi.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\TransaksiRetribusi  $transaksiRetribusi
     * @return \Illuminate\Http\Response
     */
    public function destroy(TransaksiRetribusi $transaksiRetribusi)
    {
        $transaksiRetribusi->delete();

        return redirect()->route('admin.transaksi-retribusi.index');
    }
}
