<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Tasktodo extends Model
{
    use SoftDeletes;

    /**
     * The attributes that should be mutated to dates.
     *
     * @var array
     */
    protected $fillable = [
        'title',
        // 'customer_name',
        'customer_id',
        'to_do_type',
        'start_task', 
        'deadline',
        'note',
        'ranking',
        'status',
        'assigned',
        'age',
        // 'update'
    ];
    protected $dates = ['deleted_at', 'updated_at', 'created_at'];

    public function getCreatedAtAttribute($value) {
        return date("m-d-Y H:i", strtotime($value));
    }

    public function getStartTaskAttribute($value) {
        return date("Y-m-d\TH:i", strtotime($value));
    }

    public function getDeadlineAttribute($value) {
        return date("Y-m-d\TH:i", strtotime($value));
    }

    public function getDurationAttribute($value) {
        return date("m-d-Y H:i", strtotime($value));
    }

    public function scopeWithTitleOrName($query, $keyword,$flag = true) {
        if($flag)
        {
            return Tasktodo::onlyTrashed()->where(function($query) use ($keyword) {
                $query->orWhere('title', 'like', '%'.$keyword.'%');
                $query->orWhere('to_do_type', 'like', '%'.$keyword.'%');
            });
        }
        return Tasktodo::where(function($query) use ($keyword) {
            $query->orWhere('title', 'like', '%'.$keyword.'%');
            $query->orWhere('to_do_type', 'like', '%'.$keyword.'%');
        });
    }

    public function scopeWithStartAndDeadline($query, $from, $to) {
        return Tasktodo::onlyTrashed()->where(function($query) use ($from, $to) {
            $query->whereBetween('start_task', array($from, $to));
            $query->orWhereBetween('deadline', array($from, $to));
        });
    }

    public function scopeWithStatus($query, $status) {
        return $query->where('status', $status);
    }

    public function getStatusAttribute($value) {
        switch($value) {
            case 1: return 'Done';
            case 0: return 'Waiting';
        }
    }
    public function getValueStatus($value)
    {
        switch($value) {
            case 'Done': return 1;
            case 'Waiting': return 0;
        }
    }

    public function getRankingAttribute($value) {
        switch($value) {
            case 0: return "Low";
            case 1: return "High";
            case 2: return "Normal";
        }
    }
    public function getValueRanking($value)
    {
        switch($value) {
            case "Low": return 0;
            case "High": return 1;
            case "Normal": return 2; 
        }
    }
    public function customer()
    {
        return $this->belongsTo('App\Customer','customer_id');
    }
}
