<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Sewa extends Model
{
    protected $primaryKey = 'id_sewa';
    protected $fillable = ['id_pedagang', 'id_lapak', 'periode', 'harga'];
    const CREATED_AT = 'tanggal_sewa';
    const UPDATED_AT = 'tanggal_update_sewa';

    public static function dataPenyewa(){
        return Sewa::join('pedagangs', 'pedagangs.id_pedagang', '=', 'sewas.id_pedagang')
        ->join('lapaks', 'lapaks.id_lapak', '=', 'sewas.id_lapak')
        ->get();
    }
}
