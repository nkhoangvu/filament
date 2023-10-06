<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class PhongTang extends Model
{
    use HasFactory;
    protected $table = 'ngkhoa_phongtang';
    protected $primaryKey = 'MaPhongTang';
    public $timestamps = false;
    
    protected $fillable = [
        'TenPhongTang',
        'ThoiDiem',
        'GhiChu',
        'MaNguoi',
		'user_id',
    ];
}
