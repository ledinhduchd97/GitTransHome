<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class House extends Model
{
    protected $fillable = [
        'name',
        'code',
        'user_id',
        'address', 
        'number_bedroom',
        'number_bathroom',
        'area_gross_floor',
        'site_area',
        'price',
        'description',
        'phone',
        'area',
        'city',
        'zipcode',
        'builded_year',
        'note',
        'video',
        'brokerage',
        'license',
        'mls',
        'agent',
        'unit',
        'status',
        'active_status',
        'user_update'
    ];
    public function images()
    {
        return $this->hasMany("App\Image");
    }
    public function user()
    {
        return $this->belongsTo("App\User","user_id");
    }
    public function user_updated()
    {
        return $this->belongsTo("App\User","user_update");
    }

    // scope
    public function scopeSearchArea($query, $site_area)
    {
       if ($site_area == 500) {
           return $query->where('site_area', '<', 500);
       } elseif($site_area == 1000) {
            return $query->where('site_area', '>', 499)->where('site_area', '<', 1000);
       } elseif($site_area == 5000) {
            return $query->where('site_area', '>', 999)->where('site_area', '<', 5001);
       } elseif($site_area == 5001) {
            return $query->where('site_area', '>', 5000);
       }
    }
    public function scopeSearchAreaGross($query, $area_gross_floor)
    {
        if($area_gross_floor == 500){
            return $query->where('area_gross_floor','<',500);
        }elseif($area_gross_floor == 1000) {
            return $query->where('area_gross_floor', '>=', 500)->where('area_gross_floor', '<', 1000);
        }elseif($area_gross_floor == 5000) {
            return $query->where('area_gross_floor', '>=', 1000)->where('area_gross_floor', '=<', 5000);
        }elseif($area_gross_floor == 5001) {
            return $query->where('area_gross_floor', '>', 5000);
       }
    }
    public function scopeSearchPrice($query, $price)
    {
       if($price == 500){
            return $query->where('price','<',500000);
        }elseif($price == 1000) {
            return $query->where('price', '>', 499999)->where('price', '<', 1000000);
        }elseif($price == 5000) {
            return $query->where('price', '>', 999999)->where('price', '<', 5000001);
        }elseif($price == 5001) {
            return $query->where('price', '>', 5000000);
       } 
    }
    public function scopeSearchStatus($query, $status)
    {
        if($status == 1)
        {
            return $query->where('status',1);
        }
        else
        {
            return $query->where('status',0);
        }
    }

    public function getUpdatedAtAttribute($value) {
        return date("m-d-Y", strtotime($value));
    }

    public function getCreatedAtAttribute($value) {
        return date("m-d-Y", strtotime($value));
    }

    public function getUnitAttribute($value) {
        switch($value) {
            case 0: return "€"; break;
            case 1: return "$"; break;
            case 2: return "£"; break;

        }
    }
    public function get_value_unit($value)
    {
        switch ($value) {
            case "€": return 0; break;
            case "$": return 1; break;
            case "£": return 2; break;
        }
    }


}
