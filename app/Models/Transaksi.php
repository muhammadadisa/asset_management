<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Transaksi extends Model
{
    use HasFactory;
    protected $table ='transaksi';
    public $timestamps= false;
    protected $fillable =[
        'sdm_id',
        'tanggal_pinjam',
            'tanggal_pengemmbalian',
            'total',
    ];
    
}
