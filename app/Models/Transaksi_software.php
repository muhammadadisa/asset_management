<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Transaksi_software extends Model
{
    use HasFactory;
    protected $table ='transaksi_software';
    public $timestamps= false;
    protected $fillable =[
        'software_id',
        'transaksi_id',
        'total',
    ];
    
}
