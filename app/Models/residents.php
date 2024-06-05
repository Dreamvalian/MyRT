<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Residents extends Model
{
    use HasFactory;

    protected $table = "residents";
    protected $fillable = ['nik', 'nomor_kk', 'nama_lengkap', 'alamat', 'jenis_kelamin', 'tempat_lahir', 'tanggal_lahir', 'agama', 'pendidikan', 'jenis_pekerjaan', 'status_perkawinan'];
}
