<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class TransaksiSewa extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('transaksi_sewa', function (Blueprint $table) {
            $table->string('kode_pembayaran')->primary();
            $table->foreignId('id_sewa')->constrained('sewas', 'id_sewa');
            $table->double('jumlah_bayar');
            $table->text('token');
            $table->boolean('status')->default(false);
            $table->text('keterangan')->default('menunggu pembayaran');
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
        Schema::dropIfExists('transaksi_sewa');
    }
}
