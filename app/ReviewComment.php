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

    protected static function boot() {
        parent::boot();

        static::deleting(function($user) { // before delete() method call this
             $user->comment()->delete();
             // do the rest of the cleanup...
        });
    }
}
