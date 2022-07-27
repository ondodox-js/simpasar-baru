<?php

namespace App\Http\Controllers;

use App\TransaksiRetribusi;
use App\TransaksiSewa;
use Illuminate\Http\Request;
use PDF;

class AdminController extends Controller
{
    public function index()
    {
        return view('admin.index');
    }

    public function laporan(Request $request){
        $transaksi = null;
        $request->session()->remove('data');
        
        if($request->query()){
            $start = explode('/', $request['start']);
            $end = explode('/', $request['end']);

            $t_sewa = TransaksiSewa::whereMonth('tanggal_transaksi', '>=', $start[0])
            ->whereMonth('tanggal_transaksi', '<=', $end[0])
            ->whereYear('tanggal_transaksi', '>=', $start[1])
            ->whereYear('tanggal_transaksi', '<=', $end[1])->get();

            $transaksi = TransaksiRetribusi::whereMonth('tanggal_transaksi', '>=', $start[0])
            ->whereMonth('tanggal_transaksi', '<=', $end[0])
            ->whereYear('tanggal_transaksi', '>=', $start[1])
            ->whereYear('tanggal_transaksi', '<=', $end[1])->get()->concat($t_sewa);
        }else{
            $transaksi = TransaksiSewa::all()->concat(TransaksiRetribusi::all());
        }

        $data = [
            'transaksis' => $transaksi->map(function($e){return $e->findData();}),
            'total' =>$transaksi->sum('jumlah_bayar'),
            'date' => $request->query()
        ];

        $request->session()->push('data', $data);
        return view('admin.laporan.index', $data);
    }

    public function exportLaporan(){
        $data = request()->session()->get('data')[0];

        $pdf = PDF::loadView('admin.laporan.export', $data)->setPaper('a4', 'landscape');
        
        return $pdf->download('laporan-' . time() . '.pdf');
    }
}
