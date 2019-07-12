<?php

namespace App\Http\Controllers;

use Jenssegers\Agent\Agent;
use App\stats;
use Illuminate\Http\Request;

class StatsController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create(Request $request, stats $stats)
    {
        $agent = new Agent();
        $browser =   $agent->browser();
        $date = date('Y/m/d h:i:s a', time());

         $clientIP =  request()->ip();
       // dd($request->route('id_bot'));
        if(is_null($request->message_id) === true AND is_null($request->route('id_bot'))=== true){
            return response()->json([
                'message' => 'Bad Request'], 404);

        }
        else {
            $stats->insert(
                [
                    'ip' => $clientIP,
                    'browser' => $browser,
                    'landing_bot_id' => $request->route('id_bot'),
                    'message_id' => $request->message_id,
                    'created_at' => $date,
                    'updated_at' => $date,

                ]);
            return response()->json([
                'message' => 'Request Success'], 200);

        }


    }

    function ip( )
    {
        if (isset($_SERVER['HTTP_X_FORWARDED_FOR'])) {
            return ( preg_match( "/^([d]{1,3}).([d]{1,3}).([d]{1,3}).([d]{1,3})$/", $_SERVER['HTTP_X_FORWARDED_FOR'] ) ? $_SERVER['HTTP_X_FORWARDED_FOR'] : $_SERVER['REMOTE_ADDR'] );
        } else {
            return null; //something else
        }
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
     * @param  \App\stats  $stats
     * @return \Illuminate\Http\Response
     */
    public function show(stats $stats)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\stats  $stats
     * @return \Illuminate\Http\Response
     */
    public function edit(stats $stats)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\stats  $stats
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, stats $stats)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\stats  $stats
     * @return \Illuminate\Http\Response
     */
    public function destroy(stats $stats)
    {
        //
    }
}
