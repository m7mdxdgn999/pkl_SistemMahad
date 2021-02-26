<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Student extends Model
{
    protected $fillable = ['nama_mahasiswa','nim','fakultas_jurusan_semester','no_hp_mahasantri',
    'tempat_tanggal_lahir','jalur_masuk','nama_org_tua','no_hp_org_tua',
    'alamat_lengkap','nama_mabna'];
}
