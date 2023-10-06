<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Laratrust\Traits\LaratrustUserTrait;
use Spatie\Activitylog\Traits\LogsActivity;
use Spatie\Activitylog\LogOptions;

class Group extends Model
{
    use LaratrustUserTrait;
    use LogsActivity;
    
    protected $table = 'groups';
    
    public $timestamps = false;

    protected $fillable = [
        'name',
        'description',
    ];
    
    public function getDescriptionForEvent(string $eventName) : string {
        return "A group have been {$eventName}";
    }

    public function getActivitylogOptions(): LogOptions
    {
        return LogOptions::defaults()
            ->useLogName('system')
            ->logOnly(['name', 'description', 'is_deleted'])
            ->dontLogIfAttributesChangedOnly(['updated_at'])
            ->logOnlyDirty();
        
    }

    public function nguoidung(): hasMany
    {
        return $this->hasMany(User::class);
    }
}
