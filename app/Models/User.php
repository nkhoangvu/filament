<?php

namespace App\Models;

// use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Notifications\Notifiable;
use Laravel\Sanctum\HasApiTokens;
use Laratrust\Traits\LaratrustUserTrait;
use Spatie\Activitylog\Traits\LogsActivity;
use Spatie\Activitylog\LogOptions;


class User extends Authenticatable
//class User extends Model
{

    use LaratrustUserTrait, HasApiTokens, Notifiable, LogsActivity, SoftDeletes;

    public function getDescriptionForEvent(string $eventName) : string {
        return "You have {$eventName} user";
    }

    public function getActivitylogOptions(): LogOptions
    {
        return LogOptions::defaults()
        ->useLogName('user')
        ->logOnly(['name', 'email', 'password', 'department', 'is_deleted'])
        ->dontLogIfAttributesChangedOnly(['updated_at','remember_token'])
        ->logOnlyDirty();
    }

    protected $dates = ['deleted_at'];
    protected $fillable = [
        'name',
        'email',
        'username',
        'group_id',
        'password',
    ];
    protected $encryptable = [
        
    ];

    protected $hidden = [
        'password',
        'remember_token',
    ];

    /**
     * The attributes that should be cast.
     *
     * @var array<string, string>
     */
    protected $casts = [
        'email_verified_at' => 'datetime',
    ];

    public function baiviet()
    {
        return $this->hasMany(BaiViet::class);
    }
    
    public function nhom(): BelongsTo
    {
        return $this->belongsTo(Group::class, 'group_id', 'id');
    }

    public function nguoi()
    {
        return $this->hasOne(Nguoi::class, 'user_id', 'id');
    }

}
