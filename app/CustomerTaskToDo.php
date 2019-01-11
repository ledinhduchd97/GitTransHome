<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class CustomerTaskToDo extends Model
{
    protected $fillable = [
        'customer_id',
        'title',
        'type',
        'deadline',
        'ranking',
        'note',
        'status',
        'created_at'
    ];

    public function customer(){
        return $this->beLongsto(Customer::class);
    }

    public function getRankingAttribute($value){
        switch($value){
            case 0: return "Low";
            case 1: return "Normal";
        }
    }

    public function getStatusAttribute($value){
        switch($value){
            case 0: return "Done";
            case 1: return "Waiting";
        }
    }
    public function getDeadlineAttribute($value)
    {
        return date("m-d-Y", strtotime($value));
    }
    public function getCreatedAtAttribute($value)
    {
        return date("m-d-Y", strtotime($value));
    }
    public function deadline_day($value)
    {
        return date("Y-m-d", strtotime($value));
    }
    public function created_at_day($value)
    {
        return date("Y-m-d", strtotime($value));
    }
}
