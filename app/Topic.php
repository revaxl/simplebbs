<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use App\User;
use App\Comment;

class Topic extends Model
{
    public function user() {
        $this->belongsTo('User');
    }

    public function comments() {
        return $this->hasMany('Comment');
    }
}
