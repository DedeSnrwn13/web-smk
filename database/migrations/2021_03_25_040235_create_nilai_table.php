<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateNilaiTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('nilai', function (Blueprint $table) {
            $table->engine = 'InnoDB';

            $table->id();
            $table->integer('nis');
            $table->foreignId('siswa_id');
            $table->foreignId('kelas_id');
            $table->foreignId('mapel_id');

            $table->integer('nilai_keterampilan')->nullable();
            $table->integer('nilai_pengetahuan')->nullable();

            // $table->integer('ppai')->nullable();
            // $table->integer('kpai')->nullable();

            // $table->integer('ppkn')->nullable();
            // $table->integer('kpkn')->nullable();

            // $table->integer('pindonesia')->nullable();
            // $table->integer('kindonesia')->nullable();

            // $table->integer('pmtk')->nullable();
            // $table->integer('kmtk')->nullable();

            // $table->integer('psejarah')->nullable();
            // $table->integer('ksejarah')->nullable();

            // $table->integer('pinggris')->nullable();
            // $table->integer('kinggris')->nullable();

            // $table->integer('psbk')->nullable();
            // $table->integer('ksbk')->nullable();

            // $table->integer('ppjok')->nullable();
            // $table->integer('kpjok')->nullable();

            // $table->integer('psunda')->nullable();
            // $table->integer('ksunda')->nullable();

            // $table->integer('psimdig')->nullable();
            // $table->integer('ksimdig')->nullable();

            // $table->integer('pfisika')->nullable();
            // $table->integer('kfisika')->nullable();

            // $table->integer('pkimia')->nullable();
            // $table->integer('kkimia')->nullable();

            // $table->integer('pjurusan1')->nullable();
            // $table->integer('kjurusan1')->nullable();

            // $table->integer('pjurusan2')->nullable();
            // $table->integer('kjurusan2')->nullable();

            // $table->integer('pjurusan3')->nullable();
            // $table->integer('kjurusan3')->nullable();

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
            $table->foreign('mapel_id')->references('id')->on('mapel')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('nilai');
    }
}
