<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Image extends Model
{
    protected $fillable = [
        'house_id', 'link', 'level',
    ];
    public function house()
    {
        return $this->belongsTo("App\House","house_id");
    }

    public function scopeIsHome($query){
        return $query->where('level', 1);
    }
    public function scopeIsThumb($query){
        return $query->where('level', 3);
    }
    public function scopeIsImageSlide($query){
        return $query->where('level', 2);
    }
}
