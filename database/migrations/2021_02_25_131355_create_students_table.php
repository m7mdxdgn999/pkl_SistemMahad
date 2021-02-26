<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateStudentsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('students', function (Blueprint $table) {
            $table->id();
            $table->string('nama_mahasiswa')->nullable();
            $table->string('nim')->nullable();
            $table->string('fakultas_jurusan_semester')->nullable();
            $table->string('no_hp_mahasantri')->nullable();
            $table->string('tempat_tanggal_lahir')->nullable();
            $table->string('jalur_masuk')->nullable();
            $table->string('nama_org_tua')->comment('this field is for the student duadians only')->nullable();
            $table->integer('no_hp_org_tua')->nullable();
            $table->text('alamat_lengkap')->nullable();
            $table->string('nama_mabna')->nullable();
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
        Schema::dropIfExists('students');
    }
}
