<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Transaksi_asset extends Model
{
    use HasFactory;
    protected $table ='transaksi_asset';
    public $timestamps= false;
    protected $fillable =[
        'asset_id',
        'transaksi_id',
        'total',
    ];
    
}
