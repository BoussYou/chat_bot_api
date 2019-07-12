<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class branches extends Model
{
    function messages(){
        return $this->belongsTo('App\Messages', 'branch_id', 'id');

    }
}
