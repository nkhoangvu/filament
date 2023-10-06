<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class KieuMoTang extends Model
{
    protected $table = 'ngkhoa_kieumotang';
    protected $primaryKey = 'MaKieuMoTang';
    public $timestamps = false;
    
    protected $fillable = [
        'MaKieuMoTang',
        'KieuMoTang',
        'DienGiai',
    ];

    public function kieumotang1()
    {
        return $this->hasMany(MoTang::class, 'MaKieuMoTang');
    }

}
