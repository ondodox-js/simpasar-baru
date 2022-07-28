<?php

namespace App;

use DateTime;
use Illuminate\Database\Eloquent\Model;

class Sewa extends Model
{
    protected $primaryKey = 'id_sewa';
    protected $fillable = ['id_pedagang', 'id_lapak', 'periode', 'harga_awal'];
    const CREATED_AT = 'tanggal_sewa';
    const UPDATED_AT = null;

    public static function dataPenyewa(){
        return Sewa::join('pedagangs', 'pedagangs.id_pedagang', '=', 'sewas.id_pedagang')
        ->join('lapaks', 'lapaks.id_lapak', '=', 'sewas.id_lapak')
        ->where('sewas.status', '=', true)
        ->get(['pedagangs.*', 'lapaks.posisi', 'sewas.*']);
    }

    public static function simpanDataPenyewaan(Pedagang $pedagang,Lapak $lapak, Sewa $sewa){
        $pedagang->save();
        $lapak->status = false;
        $lapak->save();

        $sewa->harga_awal = $lapak->harga_sewa;
        $sewa->id_pedagang = $pedagang->id_pedagang;
        $sewa->id_lapak = $lapak->id_lapak;

        $sewa->save();
    }

    public static function getLapak(Pedagang $pedagang){
        $lapaks = Sewa::join('lapaks', 'sewas.id_lapak', '=', 'lapaks.id_lapak')->where('id_pedagang', '=', $pedagang->id_pedagang)->get(['sewas.*', 'lapaks.posisi', 'lapaks.luas']);

        return $lapaks;
    }

    public static function joinLapak(){
        return Sewa::join('lapaks', 'sewas.id_lapak', '=', 'lapaks.id_lapak')->where('sewas.status', '=', true)->get();
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

    public function getBiayaSewa($jumlah_periode){
        $lapak = Lapak::find($this->id_lapak);
        
        return $lapak->biayaSewa($jumlah_periode);
    }

    public function berhentiSewa(){
        $lapak = Lapak::find($this->id_lapak);

        $this->status = false;
        $lapak->status = true;
        $lapak->save();
        $this->save();
    }

    public function getStatus(){
            $now = new DateTime();
            $new_date = new DateTime($this->tanggal_sewa);
            $new_date->modify('+'. $this->periode . ' month');
            $interval = $new_date->diff($now);

            $this->interval = $interval->m;
            $this->aktif = $interval->invert;
    }
}
