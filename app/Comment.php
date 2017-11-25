<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Comment extends Model
{

	protected $fillable = [
        'comment',
        'trade_id',
		'user_id'	
    ];

    
    public function Trade()
    {

    	return $this->belongsTo('App\Trade');
    
    	
    }
   

}
