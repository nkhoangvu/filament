<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
//use Laratrust\Models\LaratrustRole;

//class RoleUser extends LaratrustRole
class RoleUser extends Model
{
    protected $table = 'role_user';

    public $guarded = [];
    public $timestamps = false;
    use HasFactory;

    protected $fillable = [
        'role_id',
        'user_id',
    ];
}
