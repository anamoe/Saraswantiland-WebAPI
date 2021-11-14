<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateRiwayatPemesanansTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('riwayat_pemesanans', function (Blueprint $table) {
            $table->id();
            $table->string('nama_pemesan');
            $table->string('no_telp');
            $table->bigInteger('booking_ruangan_id')->unsigned();
            $table->foreign('booking_ruangan_id')
            ->references('id')
            ->on('daftar_ruangans')
            ->onDelete('cascade')
            ->onUpdate('cascade');

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
        Schema::dropIfExists('riwayat_pemesanans');
    }
}
