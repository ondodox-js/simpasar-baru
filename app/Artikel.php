<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Artikel extends Model
{
    protected $primaryKey = 'id_artikel';
    protected $fillable = ['judul', 'link', 'deskripsi'];
    const CREATED_AT = 'waktu_terbit';
    const UPDATED_AT = 'waktu_perubahan';
}
