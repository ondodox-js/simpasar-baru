<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class TransaksiRetribusi extends Model
{
    protected $table = 'transaksi_retribusi';
    protected $primaryKey = 'id_transaksi';

    protected $fillable = ['id_sewa', 'jumlah_bayar', 'jumlah_periode'];

    const CREATED_AT = 'tanggal_transaksi';
    const UPDATED_AT = null;

    public static function joinSewaLapak(){
        return TransaksiRetribusi::join('sewas', 'transaksi_retribusi.id_sewa', '=', 'sewas.id_sewa')->join('lapaks', 'sewas.id_lapak', '=', 'lapaks.id_lapak')->get();
    }

    public function bayarSewa($request){
        $lapak = Lapak::find($this->id_lapak);

        $transaksi = new TransaksiSewa();
        $transaksi->id_sewa = $this->id_sewa;
        $transaksi->jumlah_bayar = $lapak->biayaSewa($request->jumlahPeriode);
        if($request->keterangan){
            $transaksi->keterangan = $request->keterangan;
        }
        $transaksi->jumlah_periode = $request->jumlahPeriode;

        return $transaksi;
    }

    public static function transaksiBaru($request){
        $periode = $request->jumlahPeriode;

        $transaksi = new TransaksiRetribusi();
        $transaksi->id_sewa = $request->idSewa;
        $transaksi->jumlah_periode = $periode;
        $transaksi->jumlah_bayar = Retribusi::biayaSeluruh() * $periode;
        if($request->keterangan){
            $transaksi->keterangan = $request->keterangan;
        }

        return $transaksi;
    }

    public function findData(){
        return $this->where('id_transaksi', '=', $this->id_transaksi)->join('sewas', 'transaksi_retribusi.id_sewa', '=', 'sewas.id_sewa')->join('lapaks', 'sewas.id_lapak', '=', 'lapaks.id_lapak')->first();
    }

    public function updateTransaksi($request){
        $periode = $request->jumlahPeriode;
        
        $this->jumlah_periode = $request->jumlahPeriode;
        $this->jumlah_bayar = Retribusi::biayaSeluruh() * $periode;
        if($request->keterangan){
            $this->keterangan = $request->keterangan;
        };

        $this->save();
    }
}
