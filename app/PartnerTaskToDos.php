<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class PartnerTaskToDos extends Model
{
    protected $fillable = [
        'partner_id',
        'title',
        'age',
        'update',
        'type',
        'deadline',
        'status',
        'invest',
        'contract',
        'ranking',
        'created_at'
    ];

    public function partner(){
        return $this->beLongsto(Partner::class);
    }

    public function getRankingAttribute($value){
        switch($value){
            case 0: return "Low";
            case 1: return "Normal";
        }
    }

    public function getStatusAttribute($value){
        switch($value){
            case 1: return "Done";
            case 0: return "Waiting";
        }
    }
}
