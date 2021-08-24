<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateNilaiMulti10Table extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('nilai_multi10', function (Blueprint $table) {
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

            $table->integer('pkimia')->nullable();
            $table->integer('kkimia')->nullable();

            $table->integer('pfisika')->nullable();
            $table->integer('kfisika')->nullable();

            $table->integer('psunda')->nullable();
            $table->integer('ksunda')->nullable();

            $table->integer('psejarah')->nullable();
            $table->integer('ksejarah')->nullable();

            $table->integer('psbk')->nullable();
            $table->integer('ksbk')->nullable();

            $table->integer('psimdig')->nullable();
            $table->integer('ksimdig')->nullable();

            $table->integer('psiskom')->nullable();
            $table->integer('ksiskom')->nullable();

            $table->integer('pjaringan')->nullable();
            $table->integer('kjaringan')->nullable();

            $table->integer('ppemrograman')->nullable();
            $table->integer('kpemrograman')->nullable();

            $table->integer('pdesain')->nullable();
            $table->integer('kdesain')->nullable();

            $table->string('akademik')->nullable();
            $table->string('integritas')->nullable();
            $table->string('religius')->nullable();
            $table->string('nasionalis')->nullable();
            $table->string('mandiri')->nullable();
            $table->string('gotong_royong')->nullable();
            $table->string('catatan')->nullable();

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
        Schema::dropIfExists('nilai_multi10');
    }
}
