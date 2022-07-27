<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Retribusi extends Model
{
    protected $primaryKey = 'id_retribusi';
    // protected $table = 'retribusis';
    protected $fillable = ['layanan', 'biaya_awal'];
    public $timestamps = false;

    

    public static function biayaSeluruh(){
        return Retribusi::all()->sum('biaya');
    }
}
