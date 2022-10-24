<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Http\Resources\ClientsResources;
use App\Models\Clients;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class ClientsController extends Controller
{
    public function getClients()
    {
        $clients = Clients::where("users_id",Auth::id())->get();
        $clientsList = ClientsResources::collection($clients);
        return json_encode(["error"=>false,"message"=>"ok","clients"=>$clientsList]);
    }
}
