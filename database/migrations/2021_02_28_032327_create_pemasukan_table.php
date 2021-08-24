<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreatePemasukanTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('pemasukan', function (Blueprint $table) {
            $table->engine = 'InnoDB';

            $table->id();
            $table->date('tanggal');
            $table->foreignId('kelas_id');
            $table->foreignId('jurusan_id');
            $table->foreignId('siswa_id');
            $table->string('jenis_pembayaran');
            $table->integer('jumlah_pembayaran');
            $table->integer('cicilan');
            $table->integer('sisa');
            $table->softDeletes();
            $table->timestamps();

            $table->foreign('kelas_id')->references('id')->on('kelas')->onDelete('cascade');
            $table->foreign('jurusan_id')->references('id')->on('jurusan')->onDelete('cascade');
            $table->foreign('siswa_id')->references('id')->on('siswa')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('pemasukan');
    }
}
