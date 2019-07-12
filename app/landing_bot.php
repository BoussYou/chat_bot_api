<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class landing_bot extends Model
{
    public function up()
    {

    }

    function messages(){
        return $this->hasMany('App\Messages', 'landing_bot_id', 'id');

    }
    function stats(){
        return $this->hasMany('App\Stats', 'landing_bot_id', 'id');

    }

}
