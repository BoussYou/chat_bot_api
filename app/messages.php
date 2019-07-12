<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class messages extends Model
{


    function landing_bot()
    {
        return $this->belongsTo('App\landing_bot', 'landing_bot_id', 'id');

    }

    function Answers()
    {
        return $this->hasOne('App\answers', 'message_id', 'id');

    }
    function Answers_fields()
    {
        return $this->belongsTo('App\answers_fields', 'message_id', 'id');

    }
    function messages(){
        return $this->belongsTo('App\Stats', 'message_id', 'id');

    }
    function branches(){
        return $this->hasOne('App\Branches', 'id', 'branch_id');

    }
}
