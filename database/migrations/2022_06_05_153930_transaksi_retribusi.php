<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class TransaksiRetribusi extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('transaksi_retribusi', function (Blueprint $table){
            $table->id('id_transaksi');
            $table->foreignId('id_sewa')->constrained('sewas', 'id_sewa');
            $table->double('jumlah_bayar');
            $table->text('keterangan');
            $table->timestamp('tanggal_transaksi');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('transaksi_retribusi');
    }
}
