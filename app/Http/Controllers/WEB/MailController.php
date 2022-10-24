<?php

namespace App\Http\Controllers\WEB;

use App\Models\Calendar;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class MailController extends Controller
{
    public function confirmMeet(Request $request)
    {
        
        //return response(json_encode(['mail'=>"confirmer rendez-vous","userID"=>$request->user]));
        $calendar = Calendar::where("clients_id",$request->uid);
        $calendar->update(['confirmed' => 1,"color"=>"#038418"]);
        return view('web.confirm');
    }

    public function changeMeet(Request $request)
    {
        //return response(json_encode(['mail'=>"changer date rendez-vous","userID"=>$request->user]));
        return view("web.calendar");
    }
}
