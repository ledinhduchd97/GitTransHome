<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class PartnerNote extends Model
{
    protected $fillable = [
        'content', 
        'partner_id',
    ];
    public function partner()
    {
    	return $this->belongsTo("App\Partner","partner_id");
    }
}
