<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class trade extends Model
{
       protected $fillable = [
        'book_title',
        'author',
        'description', 
        'publishing_company', 
        'book_image', 
        'user_id',
    ];

    
    public function User()
    {
    	return $this->belongsTo('App\User');
    }

    public function Comment(){

        return $this->hasMany('App\Comment');

    }

    public function getBookImageAttribute($book_image){

        return asset($book_image);
    }
}
