<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateDaftarRuangansTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('daftar_ruangans', function (Blueprint $table) {
            $table->id();
           
            $table->bigInteger('lantai_id')->unsigned();
            $table->foreign('lantai_id')
                ->references('id')
                ->on('daftar_lantais')
                ->onDelete('cascade')
                ->onUpdate('cascade');
            $table->string('nomor_ruangan');
            $table->string('status');
            $table->string('deskripsi');
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
        Schema::dropIfExists('daftar_ruangans');
    }
}
