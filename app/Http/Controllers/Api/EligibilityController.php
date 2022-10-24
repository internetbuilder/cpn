<?php

namespace App\Http\Controllers\Api;

use Firebase\JWT\JWT;
use App\Models\Clients;
use App\Models\Counter;
use App\Models\Meetings;
use App\Models\Addresses;
use App\Models\Companies;
use App\Models\Eligibility;
use Illuminate\Http\Request;
use App\Mail\EligibilityMail;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Mail;
use Illuminate\Database\QueryException;

class EligibilityController extends Controller
{

    public function saveTest(Request $request)
    {
       try {
        $client = new Clients();
        $client->users_id = Auth::id();
        $client->state_help = htmlspecialchars(trim($request->stateHelp));
        $client->have_website = htmlspecialchars(trim($request->haveWebsite));
        $client->website_type = htmlspecialchars(trim($request->websiteType));
        $client->website_value = htmlspecialchars(trim($request->websiteValue));
        $client->website_link = htmlspecialchars(trim($request->websiteLink));
        $client->website_dev_date = gmdate("Y",strtotime(htmlspecialchars(trim($request->websiteDevelopmentDate))));
        $client->have_crm = htmlspecialchars(trim($request->haveCrm));
        $client->crm_type = htmlspecialchars(trim($request->crmType));
        $client->crm_dev = htmlspecialchars(trim($request->crmDevelopement));
        $client->crm_dev_date = gmdate("Y",strtotime(htmlspecialchars(trim($request->crmDevelopmentDate))));
        $client->agency_name = htmlspecialchars(trim($request->agencyName));
        $client->digital_transitions = htmlspecialchars(trim(implode(", ",$request->digitalTransitions)));
        $client->budget_investement = htmlspecialchars(trim($request->budgetInvestment));
        $client->first_name = htmlspecialchars(trim($request->firstName));
        $client->last_name = htmlspecialchars(trim($request->lastName));
        $client->email = htmlspecialchars(trim($request->email));
        $client->phone = htmlspecialchars(trim($request->phone));
        $client->position = htmlspecialchars(trim($request->position));
        $client->save();
        
        $companies = new Companies();
        $companies->clients_id = $client->id;
        $companies->name = htmlspecialchars(trim($request->companyName));
        $companies->status = htmlspecialchars(trim($request->companyStatus));
        $companies->salaries = htmlspecialchars(trim($request->salariesNumber));
        $companies->siret = htmlspecialchars(trim($request->siretNumber));
        $companies->phone = htmlspecialchars(trim($request->companyPhone));
        $companies->turnover = htmlspecialchars(trim($request->turnover));
        $companies->last_turnover = htmlspecialchars(trim($request->lastTurnover));
        $companies->save();
        
        $addresses = new Addresses();
        $addresses->users_id = Auth::id();
        $addresses->clients_id = $client->id;
        $addresses->address = htmlspecialchars(trim($request->address));
        $addresses->region =  htmlspecialchars(trim($request->region));
        $addresses->city = htmlspecialchars(trim($request->city));
        $addresses->zipcode = htmlspecialchars(trim($request->zipCode));
        $addresses->department = htmlspecialchars(trim($request->department));
        $addresses->save();

        $eligibility = new Eligibility();
        $eligibility->clients_id = $client->id;
        $eligibility->type = htmlspecialchars(trim($request->benfitType));
        $eligibility->amount = htmlspecialchars(trim($request->grantAmount));
        $eligibility->payback = "";
        $eligibility->save();

       } catch (QueryException $th) {
            return json_encode(["error"=>true,"message"=>$th->getMessage()]);
       }

        return json_encode(["error"=>false,"message"=>"ok","client"=>$client->id]);
    }
    
    public function createZoomMeeting(Request $request)
    {
        $createMeeting = array();
        $createMeeting["topic"] = $request->firstName." ".$request->lastName.", Rendez-vous Avec votre conseiller Numerique Pour votre projet ".implode(", ",$request->digitalTransitions);
        $createMeeting["type"] = 2;
        $createMeeting["start_time"] = gmdate("Y-m-d\TH:i:s",strtotime($request->meetingDate));
        $createMeeting["duration"] = 60;
        $createMeeting["timezone"] = "";
        $createMeeting["password"] = "";
        $createMeeting["agenda"] = implode(", ",$request->digitalTransitions);
        $createMeeting["settings"] = array(
            "host_video"=>true,
            "participant_video"=>true,
            "join_before_host"=>true,
            "mute_upon_entry"=>false,
            "enforce_login"=>false,
            "auto_recording"=>"local",
            "alternative_hosts"=>"",
        );

        $token = array(
            "iss" => env("ZOOM_CLIENT_KEY"),
            "exp" => time() + 3600 //60 seconds as suggested
        );
        $getJWTKey = JWT::encode($token, env("ZOOM_CLIENT_SECRET"));
        $headers = array(
            "authorization: Bearer " . $getJWTKey,
            "content-type: application/json",
            "Accept: application/json",
        );
        $encodeData = json_encode($createMeeting);
        $curl = curl_init();
        curl_setopt_array($curl, array(
            CURLOPT_URL => env("ZOOM_API_LINK"),
            CURLOPT_RETURNTRANSFER => true,
            CURLOPT_ENCODING => "",
            CURLOPT_MAXREDIRS => 10,
            CURLOPT_TIMEOUT => 30,
            CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
            CURLOPT_CUSTOMREQUEST => "POST",
            CURLOPT_POSTFIELDS => $encodeData,
            CURLOPT_HTTPHEADER => $headers,
        ));
        $result = curl_exec($curl);
        $err = curl_error($curl);
        curl_close($curl);
        if (!$result)
        {
            return json_encode(["error"=>true,"message"=>$err]);
        }
        $meeting = json_decode($result);

        try {
            $meetings = new Meetings();
            $meetings->users_id = Auth::id();
            $meetings->clients_id = $request->clientID;
            $meetings->meeting_id = $meeting->id;
            $meetings->meeting_topic = $meeting->topic;
            $meetings->meeting_agenda = $meeting->agenda;
            $meetings->meeting_date = $meeting->start_time;
            $meetings->meeting_link = $meeting->join_url;
            $meetings->meeting_password = $meeting->password;
            $meetings->save();
        } catch (QueryException $th) {
            return json_encode(["error"=>true,"message"=>$th->getMessage()]);
        }

        return json_encode(["error"=>false,"message"=>"ok","meeting"=>$meeting]);
    }

    public function saveTimer(Request $request)
    {
        try {
            $counters = new Counter();
            $counters->users_id = Auth::id();
            $counters->elapsed_time = $request->elapsedTime;
            $counters->save();
        } catch (QueryException $qe) {
            return json_encode(["error"=>true,"message"=>$qe->getMessage()]);
        }
        return json_encode(["error"=>false,"message"=>"ok","data"=>$counters]);
    }

    public function addCompany(Request $request)
    {
        Mail::send(new EligibilityMail($request->all()));
        
        /* $createCompany = array();
        $createCompany["name"] = $request->companyName;
        $createCompany["address_contact_name"] =$request->firstName." ".$request->lastName;
        $createCompany["address_street"] = $request->address;
        $createCompany["address_zip_code"] = $request->zipCode;
        $createCompany["address_city"] = $request->city;
        $createCompany["address_country"] = $request->region;
        $createCompany["is_prospect"] = false;
        $createCompany["is_customer"] = true;
        $createCompany["currency"] = "EUR";
        $createCompany["thirdparty_code"] = "";
        $createCompany["intracommunity_number"] = "";
        $createCompany["siret"] = $request->siretNumber;
        $createCompany["comments"] = "";
        $createCompany["custom_fields"] = array("Téléconseiller"=>$request->advisorName);
        $createCompany["categories"] = "";
        $createCompany["internal_id"] = "";
        $createCompany["business_manager"] = "";

        $headers = array(
            "userApiKey: aa77431de31ef7103de3f2c521c51e06",
            "content-type: application/json",
            "Accept: application/json",
        );

        $encodeCompany = json_encode($createCompany);

        $curlCompany = curl_init();
        curl_setopt_array($curlCompany, array(
            CURLOPT_URL => "https://axonaut.com/api/v2/companies",
            CURLOPT_RETURNTRANSFER => true,
            CURLOPT_ENCODING => "",
            CURLOPT_MAXREDIRS => 10,
            CURLOPT_TIMEOUT => 30,
            CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
            CURLOPT_CUSTOMREQUEST => "POST",
            CURLOPT_POSTFIELDS => $encodeCompany,
            CURLOPT_HTTPHEADER => $headers,
        ));
        $resultCompany = curl_exec($curlCompany);
        $errCompany = curl_error($curlCompany);
        curl_close($curlCompany);

        if (!$resultCompany)
        {
            return json_encode(["error"=>true,"message"=>$errCompany]);
        }

        $companyData = json_decode($resultCompany);
        //----------------------------------------------------

        $createClient = array();
        $createClient["company_id"] = $companyData->id;
        $createClient["gender"] = 1;
        $createClient["firstname"] = $request->firstName;
        $createClient["lastname"] = $request->lastName;
        $createClient["email"] = $request->email;
        $createClient["phone_number"] = $request->companyPhone;
        $createClient["cellphone_number"] = $request->phone;
        $createClient["job"] = $request->position;
        $createClient["custom_fields"] =  array(
            "Lien Zoom"=>$request->meetingLink,
            "Téléconseiller"=>$request->advisorName,
            "id zoom"=>$request->meetingId,
            "mot de passe"=>$request->meetingPassword
        );

        $encodeClient = json_encode($createClient);

        $curlClient = curl_init();
        curl_setopt_array($curlClient, array(
            CURLOPT_URL => "https://axonaut.com/api/v2/employees",
            CURLOPT_RETURNTRANSFER => true,
            CURLOPT_ENCODING => "",
            CURLOPT_MAXREDIRS => 10,
            CURLOPT_TIMEOUT => 30,
            CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
            CURLOPT_CUSTOMREQUEST => "POST",
            CURLOPT_POSTFIELDS => $encodeClient,
            CURLOPT_HTTPHEADER => $headers,
        ));
        $resultClient = curl_exec($curlClient);
        $errClient = curl_error($curlClient);
        curl_close($curlCompany);

        if (!$resultClient)
        {
            return json_encode(["error"=>true,"message"=>$errClient]);
        }

        $clientData = json_decode($resultClient);
        return json_encode(["error"=>false,"message"=>"ok","data"=>$request->all()]); */
    }
}

