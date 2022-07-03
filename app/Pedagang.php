<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Pedagang extends Model
{
    protected $primaryKey = 'id_pedagang';
    protected $fillable = ['nik','nama_lengkap', 'no_hp', 'email', 'alamat'];

    public $timestamps = false;

    public static function pedagangObject($pemesanan){
        $pedagang = new Pedagang();
        $pedagang->nik = $pemesanan['nik'];
        $pedagang->nama_lengkap = $pemesanan['namaLengkap'];
        $pedagang->no_hp = $pemesanan['noHp'];
        $pedagang->email = $pemesanan['email'];
        $pedagang->alamat = $pemesanan['alamat'];

        return $pedagang;
    }

    public static function pedagangAktif(){
        $data = Sewa::join('pedagangs', 'sewas.id_pedagang', '=', 'pedagangs.id_pedagang')
                ->where('sewas.status', '=', true)
                ->orderBy('pedagangs.nama_lengkap')
                ->get('pedagangs.*');
        
                return $data;
    }
}
