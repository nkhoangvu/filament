<?php

namespace App\Models;

use Heloufir\FilamentWorkflowManager\Core\HasWorkflow;
use Heloufir\FilamentWorkflowManager\Core\InteractsWithWorkflows;
use Illuminate\Database\Eloquent\Model;


class Overtime extends Model implements HasWorkflow
{   
    use InteractsWithWorkflows;

    protected $table = 'overtime';
    protected $primaryKey = 'id';
    protected $keyType = 'string';
    
    public $incrementing = false;  
    protected $fillable = [
        'overtime_date',
        'overtime_start',
        'overtime_end',
        'overtime_hours',
        'checked',
    ];
    
    public function employee()
    {
        return $this->belongsTo(Employee::class);
    }

    public static function findMismatchedDurations1()
    {
        return static::where('status', '決裁済')->whereRaw('TIMEDIFF(overtime_end, overtime_start) <> overtime_hours')->get();
    }

    public static function findMismatchedDurations()
    {
    return static::where('status', '決裁済')->where('checked', '!=', 1)
        ->where(function ($query) {
            $query->whereRaw("overtime_end >= overtime_start")
                ->whereRaw('TIMEDIFF(overtime_end, overtime_start) <> overtime_hours');
        })
        ->orWhere(function ($query) {
            $query->whereRaw("overtime_end < overtime_start")
                ->whereRaw("ADDTIME(TIMEDIFF('24:00:00', overtime_start), overtime_end) <> overtime_hours");
        })
        ->get();
}

}