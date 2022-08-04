<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Pedagang extends Model
{
    protected $primaryKey = 'id_pedagang';
    protected $fillable = ['nik','nama_lengkap', 'no_hp', 'email', 'alamat'];

    public $timestamps = false;

    public static function pedagangObject($data){
        $pedagang = new Pedagang();
        $pedagang->nik = $data->nik;
        $pedagang->nama_lengkap = $data->namaLengkap;
        $pedagang->no_hp = $data->noHp;
        $pedagang->alamat = $data->alamat;

        return $pedagang;
    }

    public static function pedagangAktif(){
        $data = Sewa::join('pedagangs', 'sewas.id_pedagang', '=', 'pedagangs.id_pedagang')
                ->where('sewas.status', '=', true)
                ->orderBy('pedagangs.nama_lengkap')
                ->get('pedagangs.*');
        
                return $data;
    }

    public static function login($request){
        $user = Pedagang::where('nik', '=', $request['nik'])->first(); 

        if($user){
            if(strcmp($request['kataSandi'], $user->kata_sandi) === 0){
                request()->session()->push('pedagang', $user);
                return true;
            }
        }
        return false;
    }  

    public static function user(){
        $session = request()->session()->get('pedagang')[0];
        $pedagang = Pedagang::find($session->id_pedagang);

        return $pedagang;
    }

    public static function userCek(){
        return request()->session()->has('pedagang');
    }

    public function updateData($parms){
        $this->nik = $parms->nik;
        $this->nama_lengkap = $parms->namaLengkap;
        $this->no_hp = $parms->noHp;
        $this->alamat = $parms->alamat;

        $this->save();
    }

    public function deleteData(){
        
    }

}
