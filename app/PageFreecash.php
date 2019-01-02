<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class PageFreecash extends Model
{
    protected $fillable = [
        'form_information_title_h3', 
        'form_information_title_h4',
        'how_we_item_title_1',
        'how_we_item_desc_1',
        'how_we_item_title_2',
        'how_we_item_desc_2',
        'how_we_item_title_3',
        'how_we_item_desc_3',
        'how_we_table_title',
        'how_we_table_desc',
    ];
}
