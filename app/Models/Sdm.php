<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Sdm extends Model
{
    use HasFactory;
    protected $table ='sdm';
    public $timestamps= false;
    protected $fillable =[
        'nip',
        'nama',
            'jabatan',
            'foto',
            'seksi',
            'bidang',
            'nik',
            'kontak',
            'alamat',
            'pangkat',
    ];
    
}
