<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Notifications\Notifiable;
use Laravel\Sanctum\HasApiTokens;
use Laratrust\Traits\LaratrustUserTrait;

class LoaiPhoiNgau extends Model
{
    use LaratrustUserTrait;
    use HasApiTokens, Notifiable;

    protected $table = 'ngkhoa_loaiphoingau';
    protected $primaryKey = 'MaLoaiPhoiNgau';
    public $timestamps = false;
    
    protected $fillable = [
        'TenLoaiPhoiNgau'
    ];
    
    public function nguoi()
    {
        return $this->hasOne(Nguoi::class, 'MaNguoi');
    }

    public function daure()
    {
        return $this->hasOne(DauRe::class, 'MaDauRe');
    }
    
    public function loaiphoingau()
    {
        return $this->hasOne(LoaiPhoiNgau::class, 'MaDauRe');
    }
}
