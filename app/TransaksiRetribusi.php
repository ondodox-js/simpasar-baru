<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class TransaksiRetribusi extends Model
{
    protected $table = 'transaksi_retribusi';
    protected $primaryKey = 'id_transaksi';

    protected $fillable = ['id_sewa', 'jumlah_bayar'];

    const CREATED_AT = 'tanggal_transaksi';
    const UPDATED_AT = null;
}
