<?php
namespace App;

use Illuminate\Database\Eloquent\Model;

class Wishlist extends Model
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

    public function comments(){

        return $this->hasMany('App\Comment');

    }

}