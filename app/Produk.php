<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Produk extends Model
{
    protected $primaryKey = 'id_produk';
    public $fillable = ['nama_produk', 'harga_terbaru', 'url_gambar'];
}
