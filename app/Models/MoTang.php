<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class MoTang extends Model
{
   
    protected $table = 'ngkhoa_motang';
    protected $primaryKey = 'MaMoTang';
    public $timestamps = false;
    
    protected $fillable = [
        'MaKieuMoTang',
        'NoiMoTang',
        'ThoiDiem',
		'user_id',
    ];

    public function kieumotang()
    {
        return $this->hasOne(KieuMoTang::class, 'MaKieuMoTang', 'MaKieuMoTang');
    }
}
