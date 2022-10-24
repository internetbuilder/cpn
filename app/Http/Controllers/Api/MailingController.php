<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class MailingController extends Controller
{
    public function confirmMeet(Request $request)
    {
        
        //return response(json_encode(['mail'=>"confirmer rendez-vous","userID"=>$request->user]));
        return view('web.confirm');
    }

    public function changeMeet(Request $request)
    {
        return response(json_encode(['mail'=>"changer date rendez-vous","userID"=>$request->user]));
    }
}
