<?php

namespace App\Http\Controllers;

use App\answers_fields;
use App\landing_bot;
use App\messages;
use App\answers;

use LandingBot;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
class LandingBotController extends Controller
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
    public function create()
    {

//
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
     * @param  \App\landing_bot  $landing_bot
     * @return \Illuminate\Http\Response
     */
    public function show(request $request)
    {
        $id = $request->route('id_bot');
        $id = (int)$id;
        $landing = \App\landing_bot::where('id', $id)->get();
        $msg = messages::where('landing_bot_id', $id)->orderBy('order')->get();
        // $msg2 = messages::where('id', $id)->get();

        foreach ($landing as $key => $val) {
            $land = (object)$val;
            $arraymsg = [];

            foreach ($msg as $key => $value) {
                $message = (object)$value;
                $type = [];

                $answers = \App\answers::where('message_id', $message->id)->get();

                $answer_fields = \App\answers_fields::where('message_id', $message->id)->groupBy('message_id','name')->get();
                $default_value = answers_fields::where('message_id', $message->id)->get();
                $defaultvalue = [];

                foreach ($default_value as $value) {
                    //$defaultvalue = [];


                    $defaultvalue[] = ["text" => $value['default_value'],"goto_branch_id" => $value['goto_branch_id']];

                }
                foreach ($answer_fields as $key => $answer_field) {
                    $answers_field = (object)$answer_field;

                    $type[]  = ['id' => $answers_field->id,
                        'type' => $answers_field->type,
                        'message_id' => $answers_field->message_id,
                        'name' => $answers_field->name,
                        'values' => $defaultvalue];

                    // var_dump($type);
                    //    $fields = end($type) ;


                }

                if($message->type === "ask") {
                    $arraymsg[] = ['id'=>$message->id,
                        'landing_bot_id'=>$message->landing_bot_id,
                        'content'=>$message->content,
                        'branch_id'=>$message->branch_id,
                        'content'=>$message->content,
                        'answer_pattern' => $message->answer_pattern,
                        'hidden'=>$message->hidden,


                        'content_type'=>$message->content_type,
			'type'=>$message->type,
                        "fields"=>$type


                    ];

                }
                else {

                    $arraymsg[] = ['id'=>$message->id,
                        'landing_bot_id'=>$message->landing_bot_id,
                        'content'=>$message->content,
                        'content_type'=>$message->content_type,
                        'hidden'=>$message->hidden,
                        'branch_id'=>$message->branch_id,
			'type'=>$message->type];
                }

            }

            $arraylandbot = 
                [   'id'=>$land->id,
                    'name'=>$land->name,
                    'catch_phrase'=>$land->catch_phrase,
                    'logo'=>$land->logo,
                    'background'=>$land->background,
                    'avatar_image'=>$land->avatar_image,
                    'avatar_name'=>$land->avatar_name,
                    'btn_color'=>$land->btn_color,
                    'font'=>$land->font,
                    'messages' =>$arraymsg


                ];

        }
        return response()->json(['data' => $arraylandbot],200);


        //return $json;
        //$answers = answers::where('message_id', $id)->get();
        //  dd($landing);


        /*    if($landing !== null) {
                 return response()->json([
                     'success'=>true,
                     'message'=>'informations concernant le bot numero '. $id,
                     'data'=>$landing ,
                     'success' => 'success'
                 ], 200);
             } */
        response()->json(['error' => 'invalid'], 401);

    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\landing_bot  $landing_bot
     * @return \Illuminate\Http\Response
     */
    public function edit(landing_bot $landing_bot)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\landing_bot  $landing_bot
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, landing_bot $landing_bot)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\landing_bot  $landing_bot
     * @return \Illuminate\Http\Response
     */
    public function destroy(landing_bot $landing_bot)
    {
        //
    }
}
