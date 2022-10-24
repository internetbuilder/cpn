<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Database\QueryException;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;

class AuthController extends Controller
{
    public function signIn(Request $request)
    {
        
        $user = User::where("email", $request->email)->first();

        if(!$user){
            return json_encode(["error"=>true,"message"=>"Email n'existe pas"]);
        }

        if(!$user || !Hash::check($request->password, $user->password)){
            return json_encode(["error"=>true,"message"=>"Mot de passe incorrect"]);
        }

        $token = $user->createToken("client_token_api")->accessToken;

        $data = array();
        $data["email"] = $user->email;
        $data["first_name"] = $user->first_name;
        $data["last_name"] = $user->last_name;
        $data["token"] = $token;

        return json_encode(["error"=>false,"message"=>"Connecté","data"=>$data]);
    }

    public function signUp(Request $request)
    {
        if(User::where("email", $request->email)->first()){
            return json_encode(["error"=>true,"message"=>"Email déjà existant"]);
        }
        
        try {
            $user = new User();
            $user->first_name = $request->firstname;
            $user->last_name = $request->lastname;
            $user->email = $request->email;
            $user->password = Hash::make($request->password);
            $user->save();
        } catch (QueryException $qe) {
            return json_encode(["error"=>true,"message"=>$qe]);
        }

        return json_encode(["error"=>false,"message"=>"Compte créer avec succès"]);
    }

    public function forgot(Request $request)
    {

    }

    public function verifyMail(Request $request)
    {
        
    }
}
