<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class DataMemo extends Model
{
    use HasFactory;
    protected $table = 'datamemo';
    protected $fillable = [
        'kode_memo',
        'tanggal_memo',
        'perihal',
        'nama_file',
        'jenis_memo',
    ];
}
