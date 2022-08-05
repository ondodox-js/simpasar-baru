<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AlterTableLapaks extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('lapaks', function(Blueprint $table){
            $table->foreignId('id_retribusi')->constrained('retribusis', 'id_retribusi');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('lapaks', function(Blueprint $table){
            $table->dropColumn('id_retribusi');
        });
    }
}
