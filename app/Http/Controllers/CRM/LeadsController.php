<?php

namespace App\Http\Controllers\CRM;

use App\Models\Contacts;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Http\Resources\ContactsLeadsResources;
use Illuminate\Support\Facades\Auth;

class LeadsController extends Controller
{
    public function getContactLeads(Request $request)
    {
        $leads = Contacts::where("users_id",Auth::id())->orderby("id","desc")->get();
        $leads = ContactsLeadsResources::collection($leads);
        return response()->json(["leads"=>$leads]);
    }
}
