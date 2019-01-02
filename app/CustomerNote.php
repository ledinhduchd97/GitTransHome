<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class CustomerNote extends Model
{
    protected $fillable = [
        'content', 
        'customer_id',
    ];
    public function customer()
    {
    	return $this->belongsTo("App\Customer","customer_id");
    }
}
