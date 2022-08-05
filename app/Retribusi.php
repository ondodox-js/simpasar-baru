<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Retribusi extends Model
{
    protected $primaryKey = 'id_retribusi';
    // protected $table = 'retribusis';
    protected $fillable = ['kelas', 'harga_m'];
    public $timestamps = false;

    

    public static function biayaSeluruh(){
        return Retribusi::all()->sum('biaya');
    }

    public static function joinLapak(){
        return Retribusi::join('lapaks', 'retribusis.id_retribusi', '=', 'lapaks.id_retribusi')->get();
    }
}
