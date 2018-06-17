<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use App\User;
use App\Topic;

class Comment extends Model
{

    public function user() {
        return $this->belongsTo('User');
    }

    public function topic() {
        return $this->belongsTo('Topic');
    }

}
