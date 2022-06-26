<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Pedagang extends Model
{
    protected $primaryKey = 'id_pedagang';
    protected $fillable = ['nik','nama_lengkap', 'no_hp', 'alamat'];
}
