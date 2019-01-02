<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class AboutUs extends Model
{
    protected $fillable = [
        'title', 
        'short_desc', 
        'detail_desc',
        'image_avatar', 
        'image_signature',
    ];
}
