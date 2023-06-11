<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateAssetKomponen extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('asset_komponen', function (Blueprint $table) {
            $table->id();
            $table->string('kode');
            $table->date('tgl_input');
            $table->string('nama');
            $table->string('tipe');
            $table->string('lokasi');
            $table->string('kondisi');
            $table->string('harga');
            $table->string('foto');
            $table->string('keterangan');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('asset_komponen');
    }
}
