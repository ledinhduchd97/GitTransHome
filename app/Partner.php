<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use App\PartnerTaskToDos;
class Partner extends Model
{
    protected $fillable = [
        'fullname', 'email', 'phone','date_of_birth','address','partner_type','status','status_recycle','user_update'
    ];
    public function getCreatedAtAttribute($value) {
        return date("m-d-Y", strtotime($value));
    }
    public function getUpdatedAtAttribute($value) {
        return date("m-d-Y", strtotime($value));
    }
    public function getDateOfBirthAttribute($value) {
        return date("Y-m-d", strtotime($value));
    }
    public function user_updated()
    {
        return $this->belongsTo("App\User","user_update");
    }
    public function partner_note()
    {
        return $this->hasMany("App\PartnerNote","partner_id");
    }

    public function partner_task_to_dos(){
        return $this->hasMany(PartnerTaskToDos::class);
    }
}
