<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Notifications\Notifiable;
use Laravel\Sanctum\HasApiTokens;
use Laratrust\Traits\LaratrustUserTrait;

class Ngoai extends Model
{
    use LaratrustUserTrait;
    use HasApiTokens, Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $table = 'ngkhoa_ngoai';
    public $timestamps = false;

    protected $primaryKey = 'MaNgoai';

    protected $fillable = [
        'Ho',
        'TenDem',
        'Ten',
        'MaCha',
        'MaMe',
        'GioiTinh',
        'NgaySinhDL',
        'NgaySinhAL',
        'ConThu',
        'Chucvi',
        'LienKet',
        'GhiChu',
		'user_id',
    ];

    public function me()
    {
        return $this->belongsTo(Nguoi::class, 'MaMe', 'MaNguoi');
    }

    public function cha()
    {
        return $this->belongsTo(DauRe::class, 'MaCha', 'MaDauRe');
    }
    
}