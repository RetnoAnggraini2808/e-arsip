<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class DataSuratMasuk extends Model
{
    use HasFactory;
    protected $table = 'datasuratmasuk';
    protected $fillable = [
        'kode_suratmasuk',
        'tanggal_suratmasuk',
        'perihal',
        'nama_file',
        'jenis_surat',
    ];
}
