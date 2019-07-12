<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class stats extends Model
{

    function messages(){
        return $this->hasOne('App\Messages', 'message_id', 'id');

    }
    function landing(){
        return $this->belongsTo('App\Landing_bot', 'landing_bot_id', 'id');

    }
}
