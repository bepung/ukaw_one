<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateMahasiswaTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('mahasiswa', function (Blueprint $table) {
            // $table->bigIncrements('id');
            $table->string('nim',20)->unique();
            $table->string('nama',150);
            $table->string('agama',20)->nullable();
            $table->string('alamat')->nullable();
            $table->string('rt',5)->nullable();
            $table->string('rw',5)->nullable();
            $table->string('kelurahan',50)->nullable();
            $table->string('kecamatan',50)->nullable();
            $table->string('kota',50)->nullable();
            $table->string('propinsi',50)->nullable();
            $table->string('nik',50)->nullable();
            $table->string('pendapatan_ortu',50)->nullable();
            $table->string('pendidikan_ortu',50)->nullable();
            $table->string('pekerjaan_ortu',50)->nullable();
            $table->string('hp',20)->nullable();
            $table->string('jurusan',50)->nullable();
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
        Schema::dropIfExists('mahasiswa');
    }
}
