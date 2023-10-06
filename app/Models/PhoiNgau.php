<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Notifications\Notifiable;
use Laravel\Sanctum\HasApiTokens;
use Laratrust\Traits\LaratrustUserTrait;

class PhoiNgau extends Model
{
    use LaratrustUserTrait;
    use HasApiTokens, Notifiable;

    protected $table = 'ngkhoa_phoingau';
    protected $primaryKey = 'MaPhoiNgau';
    public $timestamps = false;
    
    protected $fillable = [
        'MaNguoi',
        'MaDauRe',
        'BatDau',
        'KetThuc',
		'user_id',
    ];
    
    public function nguoi()
    {
        return $this->belongsTo(Nguoi::class, 'MaNguoi');
    }

    public function daure()
    {
        return $this->belongsTo(DauRe::class, 'MaDauRe');
    }
    
    public function loaiphoingau()
    {
        return $this->belongsTo(LoaiPhoiNgau::class, 'MaLoaiPhoiNgau');
    }
}
