<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class SetUp extends Model
{
    protected $fillable = [
        'website_name',
        'description',
        'logo_header',
        'logo_footer',
        'thank_you',
        'sell_my_home',
        'phone',
        'email',
        'lisence',
        'address',
        'facebook',
        'instagram',
        'twitter'
    ];
}
