<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateAssetSoftware extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('asset_software', function (Blueprint $table) {
            $table->id();
            $table->string('kode');
            $table->date('tgl_input');
            $table->date('tgl_ex');
            $table->string('nama');
            $table->string('kondisi');
            $table->string('harga');
            $table->string('link');
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
        Schema::dropIfExists('asset_software');
    }
}
