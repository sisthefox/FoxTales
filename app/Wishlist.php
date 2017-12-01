<?php
namespace App;

use Illuminate\Database\Eloquent\Model;
use willvincent\Rateable\Rateable;

class Wishlist extends Model
{
    
    protected $fillable = [
        'book_title',
        'author',
        'description', 
        'publishing_company', 
        'rating',
        'book_image', 
        'user_id',
    ];

    
    use Rateable;

    public function User()
    {

    	return $this->belongsTo('App\User');
    
    	
    }

    public function comments(){

        return $this->hasMany('App\Comment');

    }

    public function getBookImageAttribute($book_image){

        return asset($book_image);
    }



}