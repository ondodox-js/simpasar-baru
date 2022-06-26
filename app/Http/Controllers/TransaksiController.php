<?php

namespace App\Http\Controllers;

use App\Lapak;
use App\Pedagang;
use App\Services\Midtrans\CreateSnapTokenService;
use App\Sewa;
use App\Transaksi;
use Illuminate\Http\Request;

class TransaksiController extends Controller
{
    public function index(){

        $pemesanans = Transaksi::pemesanan();

        $data = [
            'pemesanans' => $pemesanans
        ];
        return view('admin.transaksi.index', $data);
    }

    public function showPembayaran(Request $request){
        $data_trs = $request->session()->get('data_transaksi');
        $lapak = Lapak::find($data_trs['idLapak']);
        $periode_sewa = $data_trs['periode'];

        $data = [
            'periode_sewa' => $periode_sewa,
            'id_lapak' => $lapak->id_lapak,
            'harga_sewa' => $lapak->harga_sewa,
            'posisi_lapak' => $lapak->posisi,
            'luas_lapak' => $lapak->luas,
            'nama_lengkap' => $data_trs['namaLengkap'],
            'email' => $data_trs['email'],
            'no_hp' => $data_trs['noHp'],
            'alamat' => $data_trs['alamat'],
            'nik' => $data_trs['nik']
        ];

        $transaksi = new CreateSnapTokenService($data);

        $snap_data = $transaksi->getSnapTokenPenyewaan();
        $data['snap_token'] = $snap_data['snap_token'];
        $data['kode_pembayaran'] = $snap_data['kode_pembayaran'];

        Transaksi::savePenyewaan($data);

        return view('admin.transaksi.pembayaran',$data);
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
