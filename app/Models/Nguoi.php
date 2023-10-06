<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Notifications\Notifiable;
use Laravel\Sanctum\HasApiTokens;
use Laratrust\Traits\LaratrustUserTrait;
use Spatie\Activitylog\Traits\LogsActivity;
use Spatie\Activitylog\LogOptions;
use App\Traits\EncryptableTrait;

class Nguoi extends Model
{
    use EncryptableTrait;
    use LaratrustUserTrait, LogsActivity;
    use HasApiTokens, Notifiable, SoftDeletes;

    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $table = 'ngkhoa_nguoi';
    
    protected $primaryKey = 'MaNguoi';
    
    protected $dates = ['deleted_at'];
    protected $fillable = [
        'TenDem',
        'Ten',
        'TenHuy',
        'TenTu',
        'TenKhac',
        'TenHieu',
        'ThuyHieu',
        'PhapDanh',
        'GioiTinh',
        'NgaySinhDL',
        'NgaySinhAL',
        'NgayMatDL',
        'NgayMatAL',
        'HuongTho',
        'TinhTrang',
        'MaCha',
        'MaMe',
        'ConThu',
        'MaDoi',
        'MaNhanh',
        'MaDiaChi',
        'TieuSu',
        'ChanDung',
        'MaDiaChi',
        'NoiSinh',
        'QueQuan',
        'user_id',
    ];

    protected $encryptable = [
        
    ];

    public function children()
    {
        return $this->hasMany(Nguoi::class, 'MaCha', 'MaNguoi');
    }
   
    public function allChildren()
    {
        return $this->hasMany(Nguoi::class, 'MaCha', 'MaNguoi')->with('children');
    }

    public function getDescriptionForEvent(string $eventName) : string {
        return "A person have been {$eventName}";
    }
    
	public function cha()
    {
        return $this->belongsTo(Nguoi::class, 'MaCha', 'MaNguoi');
    }

    public function me()
    {
        return $this->belongsTo(DauRe::class, 'MaMe', 'MaDauRe');
    }

    public function lienket()
    {
        return $this->hasMany(LienKet::class, 'MaNguoi');
    }
	
	public function chucvi()
    {
        return $this->hasMany(ChucVi::class, 'MaNguoi');
    }
	
	public function phongtang()
    {
        return $this->hasMany(PhongTang::class, 'MaNguoi');
    }

    public function ngoai()
    {
        return $this->hasMany(Ngoai::class, 'MaMe');
    }

    public function daure()
    {
        return $this->hasManyThrough(DauRe::class, PhoiNgau::class, 'MaNguoi', 'MaDauRe', 'MaNguoi', 'MaDauRe');        
    }

    public function phoingau()
    {
        return $this->belongsTo(PhoiNgau::class, 'MaNguoi', 'MaNguoi');
    }

    public function loaiphoingau()
    {
        return $this->hasMany(PhoiNgau::class, 'MaNguoi');        
    }

    public function motang()
    {
        return $this->hasOne(MoTang::class, 'MaMoTang', 'MaMoTang');
    }

    public function kieumotang()
    {

        return $this->hasOneThrough(KieuMoTang::class, MoTang::class, 'MaMoTang', 'MaKieuMoTang', 'MaMoTang', 'MaKieuMoTang');
    }

    public function getActivitylogOptions(): LogOptions
    {
        return LogOptions::defaults()
            ->useLogName('nguoi')
            ->dontLogIfAttributesChangedOnly(['updated_at'])
            ->logOnlyDirty();
    }
}
