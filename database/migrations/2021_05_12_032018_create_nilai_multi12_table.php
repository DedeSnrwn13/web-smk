<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateNilaiMulti12Table extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('nilai_multi12', function (Blueprint $table) {
            $table->id();
            $table->integer('nis');
            $table->foreignId('siswa_id');
            $table->foreignId('kelas_id');

            $table->integer('pmtk')->nullable();
            $table->integer('kmtk')->nullable();

            $table->integer('ppai')->nullable();
            $table->integer('kpai')->nullable();

            $table->integer('pindonesia')->nullable();
            $table->integer('kindonesia')->nullable();

            $table->integer('ppkn')->nullable();
            $table->integer('kpkn')->nullable();

            $table->integer('pinggris')->nullable();
            $table->integer('kinggris')->nullable();

            $table->integer('pjepang')->nullable();
            $table->integer('kjepang')->nullable();

            $table->integer('pinteraktif')->nullable();
            $table->integer('kinteraktif')->nullable();

            $table->integer('paudio')->nullable();
            $table->integer('kaudio')->nullable();

            $table->integer('ppkk')->nullable();
            $table->integer('kpkk')->nullable();

            $table->string('akademik')->nullable();
            $table->string('integritas')->nullable();
            $table->string('religius')->nullable();
            $table->string('nasionalis')->nullable();
            $table->string('mandiri')->nullable();
            $table->string('gotong_royong')->nullable();
            $table->string('catatan')->nullable();

            $table->string('mitra_pkl')->nullable();
            $table->string('lokasi')->nullable();
            $table->string('lama_pkl')->nullable();
            $table->string('keterangan')->nullable();

            $table->string('ekskul')->nullable();
            $table->string('keterangan_ekskul')->nullable();
            $table->softDeletes();
            $table->timestamps();

            $table->foreign('siswa_id')->references('id')->on('siswa')->onDelete('cascade');
            $table->foreign('kelas_id')->references('id')->on('kelas')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('nilai_multi12');
    }
}
