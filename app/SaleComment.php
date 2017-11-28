<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class SaleComment extends Model
{
    protected $fillable = [
        'comment',
        'sale_id',
		'user_id'	
    ];

    
    public function Review()
    {

    	return $this->belongsTo('App\Review');
    
    	
    }

   
}
