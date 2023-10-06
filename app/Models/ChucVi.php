<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class ChucVi extends Model
{
    protected $table = 'ngkhoa_chucvi';
    protected $primaryKey = 'MaChucVi';
    public $timestamps = false;
    
    protected $fillable = [
        'TenChucVi',
        'ThoiDiem',
        'GhiChu',
        'MaNguoi',
		'user_id',
    ];

    public function nguoi(): BelongsTo
    {
        return $this->belongsTo(Nguoi::class, 'MaNguoi');
    }
}
