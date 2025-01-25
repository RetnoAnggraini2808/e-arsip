<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class DataSk extends Model
{
    use HasFactory;
    protected $table = 'datask';
    protected $fillable = [
        'kode_sk',
        'tanggal_sk',
        'perihal',
        'nama_file',
        'jenis_sk',
    ];
}
