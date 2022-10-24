<?php

namespace App\Http\Controllers\CRM;

use App\Models\User;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Database\QueryException;
use Illuminate\Support\Facades\Validator;

class SignController extends Controller
{
    public function signIn(Request $request)
    {
        $validator = Validator::make( $request->all(),[
            "email" => "bail|required|email",
            "password" => "bail|required|min:6"
        ],[
            "email.required" => "Email est requis",
            "email.email" => "Email n'est pas valide",
            "password.required" => "Mot de passe est requis",
            "password.min" => "Mot de passe doit comporter au moins :min caractères.",
        ]);

        if($validator->fails()) return response()->json(["error"=>true,"message"=>$validator->errors()->first()]);

        if(Auth::attempt(["email"=>$request->email,"password"=>$request->password])){
            return response()->json(["error"=>false,"message"=>"Connecté avec succès"]);
        } else {
            return response()->json(["error"=>true,"message"=>"Email ou mot de passe incorrect"]);
        }
    }

    public function signUp(Request $request)
    {
        $validator = Validator::make( $request->all(),[
            "firstname" => "bail|required|min:3",
            "lastname" => "bail|required|min:3",
            "email" => "bail|email|required",
            "password" => "bail|required|min:6",
            "level" => "bail|required"
        ],[
            "firstname.required" => "Prénom est requis",
            "firstname.min" => "Prénom doit comporter au moins :min caractères.",
            "lastname.required" => "Nom de famille est requis",
            "lastname.min" => "Nom de famille doit comporter au moins :min caractères.",
            "email.required" => "Email est requis",
            "email.email" => "Email n'est pas valide",
            "level.required" => "Vous devez choisir un type de profile",
            "password.required" => "Mot de passe est requis",
            "password.min" => "Le mot de passe doit comporter au moins :min caractères.",
        ]);

        if($validator->fails()) return response()->json(["error"=>true,"message"=>$validator->errors()->first()]);

        if(User::where("email", $request->email)->first()){
            return response()->json(["error"=>true,"message"=>"Email déjà existant"]);
        }
        
        try {
            $user = new User();
            $user->first_name = $request->firstname;
            $user->levels_id = $request->level;
            $user->last_name = $request->lastname;
            $user->email = $request->email;
            $user->password = Hash::make($request->password);
            $user->save();
        } catch (QueryException $qe) {
            return response()->json(["error"=>true,"message"=>$qe]);
        }

        return response()->json(["error"=>false,"message"=>"Compte créer avec succès"]);

    }

    public function signOut(Request $request)
    {
        Auth::logout();
        return redirect('/sign');
    }

    public function forgot(Request $request)
    {
        
    }

    public function signVerify(Request $request)
    {
        
    }
}
