<?php


/*use App\User;
use App\Like;*/


namespace App;

use Illuminate\Database\Eloquent\Model;

class Post extends Model
{
    public function user()
    {
    	return $this->belongsTo('App\User');
    }

    public function likes()
    {
    	return $this->hasMany('App\Like', 'message_id');
    }

    public function product()
    {
    	return $this->belongsTo('App\Product', 'product_id');
    }
}
