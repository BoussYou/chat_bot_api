<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class answers_fields extends Model
{
    function answers(){
        return $this->belongsTo('App\Answers', 'answers_field_id', 'id');

    }
    function message(){
        return $this->hasOne('App\Messages', 'id', 'message_id');

    }
}
