<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateSewasTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('sewas', function (Blueprint $table) {
            $table->id('id_sewa');
            $table->double('harga_awal');
            $table->double('kenaikan_harga')->default(0);
            $table->integer('periode');
            $table->boolean('status')->default(true);
            $table->foreignId('id_pedagang')->constrained('pedagangs', 'id_pedagang');
            $table->foreignId('id_lapak')->constrained('lapaks', 'id_lapak');
            $table->timestamp('tanggal_sewa');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('sewas');
    }
}
