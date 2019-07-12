<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class answers extends Model
{
    protected $casts = [
        'answers' => 'array',
    ];
    protected $fillable = ['message_id', 'value'];

    protected $table = 'answers';

    function messages(){
        return $this->hasOne('App\Messages', 'id', 'message_id');

    }
    function answers_fields(){
        return $this->hasOne('App\Answers_fields', 'id', 'answers_field_id');

    }



}
