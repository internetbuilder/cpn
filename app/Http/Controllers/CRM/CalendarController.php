<?php

namespace App\Http\Controllers\CRM;

use App\Http\Controllers\Controller;
use App\Models\Calendar;
use Illuminate\Http\Request;

class CalendarController extends Controller
{
    public function getEvents()
    {
        $events = Calendar::get();
        return response()->json(["events"=>$events]);
    }
}
