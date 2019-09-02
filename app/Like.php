<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

/*use App\User;
use App\Post;
use App\Like;*/

class Like extends Model
{
    public function user()
    {
        return $this->belongsTo('App\User');
    }

    public function post()
    {
        return $this->belongsTo('App\Post', 'user_id');
    }
}
