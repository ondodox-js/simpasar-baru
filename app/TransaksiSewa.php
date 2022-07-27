<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class TransaksiSewa extends Model
{
    protected $table = 'transaksi_sewa';
    protected $primaryKey = 'id_transaksi';

    protected $fillable = ['id_sewa', 'jumlah_bayar', 'jumlah_periode'];

    const CREATED_AT = 'tanggal_transaksi';
    const UPDATED_AT = null;

    public static function joinSewaLapak(){
        return TransaksiSewa::join('sewas', 'transaksi_sewa.id_sewa', '=', 'sewas.id_sewa')->join('lapaks', 'sewas.id_lapak', '=', 'lapaks.id_lapak')->get();
    }

    public function findData(){
        return $this->where('id_transaksi', '=', $this->id_transaksi)->join('sewas', 'transaksi_sewa.id_sewa', '=', 'sewas.id_sewa')->join('lapaks', 'sewas.id_lapak', '=', 'lapaks.id_lapak')->first();
    }

    public function simpanTransaksi(Sewa $sewa){
        $sewa->periode += $this->jumlah_periode;
        $sewa->save();

        $this->save();
    }

    public function updateTransaksi($request){
        $sewa = Sewa::find($this->id_sewa);

        $sewa->periode = ($sewa->periode - $this->jumlah_periode) + $request->jumlahPeriode;
        $sewa->save();

        $this->jumlah_periode = $request->jumlahPeriode;
        $this->jumlah_bayar = $sewa->getBiayaSewa($request->jumlahPeriode);

        if($request->keterangan){
            $this->keterangan = $request->keterangan;
        }

        $this->save();
    }

    public function deleteTransaksi(){
        $sewa = Sewa::find($this->id_sewa);

        $sewa->periode = $sewa->periode - $this->jumlah_periode;
        $sewa->save();

        $this->delete();
    }
}
