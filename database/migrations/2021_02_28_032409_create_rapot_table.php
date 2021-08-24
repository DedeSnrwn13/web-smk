<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateRapotTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('rapot', function (Blueprint $table) {
            $table->engine = 'InnoDB';

            $table->id();
            $table->integer('nis');
            $table->foreignId('siswa_id');
            $table->foreignId('kelas_id');
            $table->string('akademik');
            $table->string('integritas');
            $table->string('religius');
            $table->string('nasionalis');
            $table->string('mandiri');
            $table->string('gotong_royong');
            $table->string('catatan');
            $table->string('mitra_pkl')->nullable();
            $table->string('lokasi')->nullable();
            $table->string('lama_pkl')->nullable();
            $table->string('keterangan')->nullable();
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
        Schema::dropIfExists('rapot');
    }
}
