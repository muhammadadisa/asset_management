<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Software extends Model
{
    use HasFactory;
    protected $table ='asset_software';
    public $timestamps= false;
    protected $fillable =[
        'kode',
        'nama',
            'kondisi',
            'harga',
            'tgl_input',
            'link',
            'tgl_ex',
    ];
    
}
