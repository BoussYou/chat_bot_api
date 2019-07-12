<?php

namespace App\Http\Controllers;

use App\messages;
use App\answers;

use Illuminate\Http\Request;
use App\Http\Controllers\Input;

class MessagesController extends Controller
{

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create(Request $request, answers $answers)
    {
        $date = date('Y/m/d h:i:s a', time());
        $id = $request->route('id_bot');
        $id = (int)$id;
        $answer = new answers;
        $answer->landing_bot_id = $id;
        $answer->value = Input::post('value');
        $answer->message_id = Input::post('');
        $answer->updated_at = $date;
        $answer->created_at = $date;

        $answer->save();
      //  $landing[] = $landing;

       // $msg = \App\messages::with('landing_bot')->find(1);
//dd($msg);
        // $user->password = Hash::make(Input::get('password'));

       // $something->users()->save($user);

    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\messages  $messages
     * @return \Illuminate\Http\Response
     */
    public function show(messages $messages)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\messages  $messages
     * @return \Illuminate\Http\Response
     */
    public function edit(messages $messages)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\messages  $messages
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, messages $messages)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\messages  $messages
     * @return \Illuminate\Http\Response
     */
    public function destroy(messages $messages)
    {
        //
    }
}
