<?php

namespace App;

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

    public static function simpanDataPenyewaan(Pedagang $pedagang,Lapak $lapak, $periode){
        $pedagang->save();
        $lapak->status = false;
        $lapak->save();

        $sewa_baru = new Sewa();
        $sewa_baru->harga_awal = $lapak->harga_sewa;
        $sewa_baru->periode = $periode;
        $sewa_baru->id_pedagang = $pedagang->id_pedagang;
        $sewa_baru->id_lapak = $lapak->id_lapak;

        $sewa_baru->save();
        
        return $sewa_baru;
    }
}
