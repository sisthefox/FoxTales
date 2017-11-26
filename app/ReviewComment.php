<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class ReviewComment extends Model
{
    	protected $fillable = [
        'comment',
        'review_id',
		'user_id'	
    ];

    
    public function Review()
    {

    	return $this->belongsTo('App\Review');
    
    	
    }
}
