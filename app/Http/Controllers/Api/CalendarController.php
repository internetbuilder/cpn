<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\Calendar;
use Illuminate\Database\QueryException;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class CalendarController extends Controller
{
    public function getEvents()
    {
        $events = Calendar::get();
        return json_encode(["error"=>false,"message"=>"ok","events"=>$events]);
    }

    public function addEvent(Request $request)
    {
        $calenderCheck = Calendar::where(["users_id"=>Auth::id(),"clients_id"=>$request->clientId])->first();

        if($calenderCheck){
            return json_encode(["error"=>true,"message"=>"Vous avez fixé un rendez-vous avec ce client"]);
        }

        try {
            $events = new Calendar();
            $events->users_id = Auth::id();
            $events->clients_id = $request->clientId;
            $events->title = $request->title;
            $events->date = $request->date;
            $events->time = $request->time;
            $events->color = $request->color;
            $events->save();
        } catch (QueryException $th) {
            return json_encode(["error"=>true,"message"=>$th->getMessage()]);
        }
        return json_encode(["error"=>false,"message"=>"événement ajouté avec succès","event"=>$events]);
    }

    public function editEvent()
    {
        // code here
    }

    public function deleteEvent($id)
    {
        
        try {
            $events = Calendar::where("id",$id)->first();
        } catch (QueryException $qe) {
            return json_encode(["error"=>true,"message"=>$qe->getMessage()]);
        }
        
        if(!$events){
            return json_encode(["error"=>true,"message"=>"Pas d'événement trouvé"]);
        }

        if($events->users_id != Auth::id())
        {
            return json_encode(["error"=>true,"message"=>"Vous n'avez pas le droit de supprimer cet évènement"]);
        }

        if(!$events->delete()){
            return json_encode(["error"=>true,"message"=>"Erreur suppression événement"]);
        }
        
        return json_encode(["error"=>false,"message"=>"événement supprimé"]);
    }
}
