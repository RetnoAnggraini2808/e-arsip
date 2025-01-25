<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class DataIntern extends Model
{
    use HasFactory;
    protected $table = 'dataintern';
    protected $fillable = [
        'kode_suratintern',
        'tanggal_suratintern',
        'perihal',
        'nama_file',
        'jenis_surat',
    ];
}
