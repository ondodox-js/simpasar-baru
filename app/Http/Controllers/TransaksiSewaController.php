<?php

namespace App\Http\Controllers;

use App\Lapak;
use App\Pedagang;
use App\Sewa;
use App\TransaksiSewa;
use Illuminate\Http\Request;

class TransaksiSewaController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $data = [
            'items' => TransaksiSewa::joinSewaLapak()
        ];

        return view('admin.transaksi-sewa.index', $data);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        request()->session()->remove('data');

        $data = [
            'sewas' => Sewa::joinLapak()
        ];
        return view('admin.transaksi-sewa.create', $data);
    }

    public function afterCreate(Request $request){
        $request_validate = [
            'idSewa' => 'required|numeric',
            'jumlahPeriode' => 'required|numeric'
        ];
        $request->validate($request_validate);

        $sewa = Sewa::find($request->idSewa);
        $transaksi = $sewa->bayarSewa($request);

        $data = [
            'pedagang' => Pedagang::find($sewa->id_pedagang),
            'lapak' => Lapak::find($sewa->id_lapak),
            'sewa' => $sewa,
            'transaksi' => $transaksi
        ];

        $request->session()->push('data', (object) $data);

        return view('admin.transaksi-sewa.pembayaran', $data);
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
        $transaksi = $data->transaksi;
        $sewa = $data->sewa;

        $transaksi->simpanTransaksi($sewa);

        return redirect()->route('admin.transaksi-sewa.index');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\TransaksiSewa  $transaksiSewa
     * @return \Illuminate\Http\Response
     */
    public function show(TransaksiSewa $transaksiSewa)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\TransaksiSewa  $transaksiSewa
     * @return \Illuminate\Http\Response
     */
    public function edit(TransaksiSewa $transaksiSewa)
    {
        $data = [
            'item' => $transaksiSewa->findData()
        ];

        return view('admin.transaksi-sewa.edit', $data);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\TransaksiSewa  $transaksiSewa
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, TransaksiSewa $transaksiSewa)
    {
        $request_validate = [
            'jumlahPeriode' => 'required|numeric'
        ];

        $request->validate($request_validate);

        $transaksiSewa->updateTransaksi($request);

        return redirect()->route('admin.transaksi-sewa.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\TransaksiSewa  $transaksiSewa
     * @return \Illuminate\Http\Response
     */
    public function destroy(TransaksiSewa $transaksiSewa)
    {
        $transaksiSewa->deleteTransaksi();
        return redirect()->route('admin.transaksi-sewa.index');
    }
}
