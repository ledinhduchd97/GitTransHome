<?php

namespace App;

use Illuminate\Notifications\Notifiable;
use Illuminate\Foundation\Auth\User as Authenticatable;

class User extends Authenticatable
{
    use Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'username', 
        'fullname',
        'email',
        'phone',
        'address',
        'position',
        'birthday',
        'comment',
        'status',
        'status_active',
        'gender',
        'password'
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password', 'remember_token',
    ];
    public function house()
    {
        return $this->hasMany("App\House","user_id");
    }
    public function house_update()
    {
        return $this->hasMany("App\House","user_update");
    }
    public function partner_update()
    {
        return $this->hasMany("App\Partner","user_update");
    }
    public function scopePosition($query, $position)
    {
       if ($position == 2) {
           return $query->where('position',2);
       }elseif($position == 1) {
            return $query->where('position',1);
       }
    }
    public function scopeStatus($query, $status)
    {
        if($status == 0){
            return $query->where('status',0);
        }elseif($status == 1) {
            return $query->where('status',1);
       }elseif($status == 2) {
            return $query->where('status',2);
       }
    }

    public function getBirthdayAttribute($value) {
        return date("m-d-Y", strtotime($value));
    }
}
