<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Lapak extends Model
{
    protected $primaryKey = 'id_lapak';
    protected $fillable = ['posisi', 'luas', 'harga_sewa'];
    

    public static function lapakTersedia(){
        return Lapak::where('status', true)->orderBy('posisi')->get();
    }
}
