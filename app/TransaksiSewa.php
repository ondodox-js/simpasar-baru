<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class TransaksiSewa extends Model
{
    protected $table = 'transaksi_sewa';
    protected $primaryKey = 'id_transaksi';

    protected $fillable = ['id_sewa', 'jumlah_bayar'];

    const CREATED_AT = 'tanggal_transaksi';
    const UPDATED_AT = null;

    public static function joinSewaLapak(){
        return TransaksiSewa::join('sewas', 'transaksi_sewa.id_sewa', '=', 'sewas.id_sewa')->join('lapaks', 'sewas.id_lapak', '=', 'lapaks.id_lapak')->get();
    }

    public function simpanTransaksi(Sewa $sewa){
        $sewa->periode += $this->periode_bayar;
        $sewa->save();

        unset($this->periode_bayar);
        $this->save();
    }
}
