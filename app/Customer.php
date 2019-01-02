<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Customer extends Model
{
    use SoftDeletes;

    /**
     * The attributes that should be mutated to dates.
     *
     * @var array
     */
    protected $dates = ['deleted_at', 'updated_at', 'created_at', 'birthday'];

    protected $fillable = [
        'first_name', 'last_name', 'email', 'birthday', 'phone','address', 'type'
    ];

    public function scopeByLatest($query, $sort = "desc") {
        return $query->orderBy('created_at', $sort);
    }

    public function getFullNameAttribute($value) {
        return "{$this->first_name} {$this->last_name}";
    }

    public function getCreatedAtAttribute($value) {
        return date("m-d-Y H:i", strtotime($value));
    }

    public function getBirthdayAttribute($value) {
        return date("m-d-Y", strtotime($value));
    }

    public function scopeWithFullName($query, $name)
    {
        // Split each Name by Spaces
        $names = explode(" ", $name);

        return Customer::where(function($query) use ($names) {
            foreach($names as $name) {
                $query->orWhere('first_name', 'like', '%' . $name . '%');
            }
            $query->orWhere(function($query) use ($names) {
                foreach($names as $name) {
                    $query->orWhere('last_name', 'like', '%' . $name . '%');
                }
            });
        });
    }
    public function customer_note()
    {
        return $this->hasMany("App\CustomerNote","customer_id");
    }

    public function customer_task_to_dos(){
        return $this->hasMany(CustomerTaskToDo::class);
    }

    public function tasktodo()
    {
        return $this->hasMany("App\Tasktodo","customer_id");
    }
    
    public function getStatusAttribute($value) {
        switch($value) {
            case 0: return "Waiting"; break;
            case 1: return "Done"; break;
        }
    }
}
