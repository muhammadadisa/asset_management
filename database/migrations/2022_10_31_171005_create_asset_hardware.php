<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateAssetHardware extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('asset_hardware', function (Blueprint $table) {
            $table->id();
            $table->string('kode');
            $table->string('nama');
            $table->date('tgl_input');
            $table->string('warna');
            $table->string('noseri');
            $table->string('vendor');
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
        Schema::dropIfExists('asset_hardware');
    }
}
