<?php

namespace App\Http\Controllers;

use App\Lapak;
use App\Pedagang;
use App\Services\Midtrans\CreateSnapTokenService;
use App\Services\Midtrans\TransactionService;
use App\Sewa;
use App\Transaksi;
use App\TransaksiSewa;
use Illuminate\Http\Request;
use stdClass;

class TransaksiController extends Controller
{
    public function index(){
        request()->flush();

        $data = [
            'pemesanans' => TransaksiSewa::dataPemesanan()
        ];

        return view('admin.transaksi.index', $data);
    }

    public function showPembayaran(Request $request){
        $data_trs = $request->session()->get('data_transaksi');

        $pemesanan = new stdClass();
        $pemesanan->pedagang = Pedagang::pedagangObject($data_trs);
        $pemesanan->lapak = Lapak::find($data_trs['idLapak']);
        $pemesanan->periode = $data_trs['periode'];

        $transaksi = new CreateSnapTokenService($pemesanan);
        
        $data = $transaksi->getSnapTokenPenyewaan();

        $sewa = Sewa::simpanDataPenyewaan($data->pedagang, $data->lapak, $data->periode);

        TransaksiSewa::simpanDataTransaksi($sewa, $data);

        return view('admin.transaksi.pembayaran',(array) $data);
    }

    public function store(Request $request){
        $pedagang = new Pedagang();
        $pedagang->nik = $request->nik;
        $pedagang->nama_lengkap = $request->namaLengkap;
        $pedagang->no_hp = $request->noHp;
        $pedagang->alamat = $request->alamat;
        $pedagang->save();

        $lapak = Lapak::find($request->idLapak);
        $lapak->status = false;  

        $sewa = new Sewa();
        $sewa->id_pedagang = $pedagang->id_pedagang;
        $sewa->id_lapak = $request->idLapak;
        $sewa->periode = $request->periode;
        $sewa->harga = $lapak->harga;

        $sewa->save();
        $lapak->save();
    }

    public function sewaIndex(){
        return view('admin.transaksi.sewa');
    }
    public function retribusiIndex(){
        return view('admin.transaksi.retribusi');
    }
}
