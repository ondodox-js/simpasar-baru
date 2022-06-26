<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Artikel extends Model
{
    protected $primaryKey = 'id_artikel';
    protected $fillable = ['judul', 'link', 'deskripsi'];
}
