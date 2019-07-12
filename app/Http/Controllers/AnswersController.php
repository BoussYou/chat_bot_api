<?php

namespace App\Http\Controllers;

use App\answers;
use App\answers_fields;

use App\messages;
use App\stats;
use DB;
use Illuminate\Http\Request;

class AnswersController extends Controller
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
    public function create(Request $request)
    {


    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */


    public function store(Request $request, answers $answers) {
        //dd($request);

        /*   $answers = answers::create([
               'message_id'=>$request->message_id,
               'value' =>$request->value,
           ]);

           return new answers($answers); */


     //   $landing = \App\answers::with('answers_fields')->find(1);
        if(is_null($request->answers) === true) {
            return response()->json([
                'message' => 'Bad Request'], 404);

        }
        foreach($request->answers  as $key => $answer ) {
            $object = (object)$answer;
            $message = messages::findOrFail($object->message_id);
            $id_msg = (int)$object->message_id;

            $id_fields = answers_fields::where('message_id', $id_msg)->get();

            foreach ($id_fields as $value) {
                $id_field = (object)$value;
            }
            $date = date('Y/m/d h:i:s a', time());
            $answers->insert($answer +
                ['answer_field_id' => $id_field->id]+ ['created_at' => $date] + ['updated_at' => $date]);
        }
        return response()->json([
            'message' => 'Request Success'], 200);
    }
    /**
     * Display the specified resource.
     *
     * @param  \App\answers  $answers
     * @return \Illuminate\Http\Response
     */
    public function show(answers $answers)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\answers  $answers
     * @return \Illuminate\Http\Response
     */
    public function edit(answers $answers)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\answers  $answers
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, answers $answers)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\answers  $answers
     * @return \Illuminate\Http\Response
     */
    public function destroy(answers $answers)
    {
        //
    }
}
