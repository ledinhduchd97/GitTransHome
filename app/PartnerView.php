<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class PartnerView extends Model
{
    protected $fillable = [
        'title', 
        'short_desc', 
        'detail_desc',
        'image_avatar',
    ];
}
