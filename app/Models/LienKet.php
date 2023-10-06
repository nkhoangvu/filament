<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class LienKet extends Model
{
    protected $table = 'ngkhoa_lienket';
    protected $primaryKey = 'MaLienKet';
    public $timestamps = false;
    
    protected $fillable = [
        'MaNguoi',
        'TenLienKet',
        'URL',
		'user_id',
    ];

    public function nguoi()
    {
        return $this->hasOne(Nguoi::class, 'MaNguoi', 'MaNguoi');
    }
}
