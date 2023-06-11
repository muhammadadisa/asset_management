<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Asset extends Model
{
    use HasFactory;
    protected $table ='asset_hardware';
    public $timestamps= false;
    protected $fillable =[
        'kode',
        'nama',
            'kondisi',
            'harga',
            'tgl_input',
            'foto',
            'lokasi',
            'tipe',
            'keterangan',
            'vendor',
            'warna',
            'noseri',
    ];
}
