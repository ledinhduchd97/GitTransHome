<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Sellmyhome extends Model
{
    protected $fillable = [
        'note',
        'title_1',
        'description_1',
        'image_1',
        'title_image_1',
        'description_image_1',
        'image_2',
        'title_image_2',
        'description_image_2',
        'image_3',
        'title_image_3',
        'description_image_3',
        'title_2',
        'description_2'
    ];
}
