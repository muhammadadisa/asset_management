<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Log extends Model
{

    protected $table = 'log';

    use HasFactory;
    protected $fillable = [
        'nama',
        'konten',
        'tipe',
        'ip',
    ];
    public static function simpan($tipe,$nama,$konten,$ip){
        $log = Log::create([
            'nama'=>$nama,
            'konten'=>$konten,
            'tipe'=>$tipe,
            'ip'=>$ip,
        ]);
}
}
