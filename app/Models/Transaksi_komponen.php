<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Transaksi_komponen extends Model
{
    use HasFactory;
    protected $table ='transaksi_komponen';
    public $timestamps= false;
    protected $fillable =[
        'komponen_id',
        'transaksi_id',
        'total',
    ];
    
}
