<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class JenisMemo extends Model
{
    use HasFactory;
    protected $table = 'jenismemo';
    protected $fillable = [
        'nama_jenismemo'
    ];
}
