<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Notifications\Notifiable;
use Laravel\Sanctum\HasApiTokens;
use Laratrust\Traits\LaratrustUserTrait;

class DauRe extends Model
{
    use LaratrustUserTrait;
    use HasApiTokens, Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $table = 'ngkhoa_daure';
    public $timestamps = false;

    protected $primaryKey = 'MaDauRe';

    protected $fillable = [
        'Ho',
        'TenDem',
        'Ten',
        'TenHuy',
        'TenTu',
        'TenKhac',
        'ThuyHieu',
        'PhapDanh',
        'GioiTinh',
        'NgaySinhDL',
        'NgaySinhAL',
        'NgayMatDL',
        'NgayMatAL',
        'HuongTho',
        'TinhTrang',
        'TenCha',
        'TenMe',
        'ConThu',
        'DoiThu',
        'ChiThu',
        'MaMoTang',
        'ChucVi',
        'PhongTang',
        'ChanDung',
        'MaDiaChi',
        'NoiSinh',
        'QueQuan',
        'HuongTho',
		'user_id',
    ];

    public function nguoi()
    {
        return $this->hasOneThrough(Nguoi::class, PhoiNgau::class, 'MaDauRe', 'MaNguoi', 'MaDauRe', 'MaNguoi');
    }

    public function phoingau()
    {
        return $this->belongsTo(PhoiNgau::class, 'MaDauRe', 'MaDauRe');
    }

    public function loaiphoingau()
    {
        return $this->hasOneThrough(LoaiPhoiNgay::class, PhoiNgau::class, 'MaDauRe', 'MaPhoiNgau', 'MaDauRe', 'MaPhoiNgau');
    }
}
