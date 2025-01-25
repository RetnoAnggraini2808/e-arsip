<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class jenis_intern extends Model
{
    
    use HasFactory;
    protected $table = 'jenisintern';
    protected $fillable = [
        'jenis_intern'
    ];
}
