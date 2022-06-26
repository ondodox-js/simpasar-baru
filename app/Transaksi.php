<?php

namespace App;

use App\Services\Midtrans\TransactionService;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;

class Transaksi extends Model
{
    
    public static function savePenyewaan($transaksi){
        $pedagang = new Pedagang();
        $pedagang->nama_lengkap = $transaksi['nama_lengkap'];
        $pedagang->email = $transaksi['email'];
        $pedagang->no_hp = $transaksi['no_hp'];
        $pedagang->alamat = $transaksi['alamat'];
        $pedagang->nik = $transaksi['nik'];
        $pedagang->save();

        $lapak = Lapak::find($transaksi['id_lapak']);
        $lapak->status = false;
        $lapak->save();

        $sewa = new Sewa();
        $sewa->harga_awal = $lapak->harga_sewa;
        $sewa->periode = $transaksi['periode_sewa'];
        $sewa->id_pedagang = $pedagang->id_pedagang;
        $sewa->id_lapak = $lapak->id_lapak;
        $sewa->save();

        $transaksi_sewa = [
            'kode_pembayaran' => $transaksi['kode_pembayaran'],
            'id_sewa' => $sewa->id_sewa,
            'jumlah_bayar' => $sewa->harga_awal * $sewa->periode,
            'tanggal_transaksi' => now()
        ];
        DB::table('transaksi_sewa')
            ->insert($transaksi_sewa);
    }

    public static function pemesanan(){
        $transaksis = DB::table('transaksi_sewa')->where('status', '=', false)->get();
        // dd($transaksis);
        foreach($transaksis as $transaksi){
            $kode = $transaksi->kode_pembayaran;
            $data = Transaksi::cekStatus($kode);
            if($data->transaction_status === 'settlement'){
                DB::table('transaksi_sewa')->where('kode_pembayaran', '=', $kode)->limit(1)->update(['status' => true]);
            }
        }
        return DB::table('transaksi_sewa')->get();

    }

    public static function cekStatus($kode_pembayaran){
        $transaksi = new TransactionService($kode_pembayaran);
        return $transaksi->getStatus();
    }
}
