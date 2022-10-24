<?php

use App\Http\Controllers\CRM\CalendarController;
use App\Http\Controllers\CRM\LeadsController;
use App\Mail\EligibilityMail;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Facades\Route;
use App\Http\Middleware\AuthRedirection;
use App\Http\Controllers\CRM\SignController;
use App\Http\Controllers\CRM\TestController;
use App\Http\Controllers\WEB\MailController;
use App\Http\Controllers\CRM\RoutesController;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/



/* Route::domain("localhost")->group(function(){

    Route::prefix("mail")->group(function(){
        Route::get("confirm", [MailController::class,"confirmMeet"]);
        Route::get("change", [MailController::class,"changeMeet"]);
    });
    
    Route::get("",function(){
        return view("web.index");
    });
    Route::get("/home",function(){
        return view("web.home");
    });
    Route::get("actuality",function(){
        return view("web.actuality");
    });
    Route::get("agenda",function(){
        return view("web.agenda");
    });
    Route::get("calendar",function(){
        return view("web.calendar");
    });
    Route::get("contact",function(){
        return view("web.contact");
    });
}); */

/* Route::domain('crm.localhost')->group(function(){
    Route::get('/{any}', function(){
        return view('crm.app');
    })->where('any','.*');
}); */

/* Route::get('/{any}', function(){
    return view('app');
})->where('any','.*'); */

Route::group(['domain' => 'crm.cpn-aide-aux-entreprises.com'], function(){
    Route::any('{slug}', [RoutesController::class,"checkRoutes"])->middleware("auth.redirection");
    
    Route::prefix("sign")->group(function(){
        Route::post("in",[SignController::class,"signIn"]);
        Route::post("up",[SignController::class,"signUp"]);
        Route::get("out",[SignController::class,"signOut"]);
    });

    Route::prefix("test")->group(function(){

        Route::get("activities/get",[TestController::class,"activitiesGet"]);
        Route::get("transitions/get", [TestController::class,"transitionsGet"]);
        Route::get("events/get", [TestController::class,"eventsGet"]);
        Route::post("events/add",[TestController::class,"eventsAdd"]);

        Route::get("service/turnover/{min}/{max}", [TestController::class,"serviceTurnover"]);
        Route::get("company/siren/{siren}",[TestController::class,"comapnySiren"]);

        Route::post("contact/save",[TestController::class,"saveContact"]);
        Route::post("contact/confirm",[TestController::class,"confirmContact"]);

        Route::post("zoom/generate",[TestController::class,"generateZoom"]);

        Route::prefix("grants")->group(function(){
            Route::get("cpn/{service}/{budget}",[TestController::class,"cpnGrant"]);
            Route::get("region/{region}/{budget}/{naf}",[TestController::class,"regionGrant"]);
        });

        /* Route::get("/email/send", function(){
            Mail::send(new EligibilityMail());
            return new EligibilityMail([
                "clientID"=>1,
                "email"=>"klilmecha@gmail.com",
                "meetingId"=>123,
                "meetingLink"=>122,
                "meetingPassword"=>122,
                "meetingDate"=>"2021-08-24 14:00",
                "grantAmount"=>"1000",
                "meetingDate"=>"2021-08-24 14:00",
            ]);
        }); */
    });

    Route::prefix("leads")->group(function(){
        Route::get("contacts/get",[LeadsController::class,"getContactLeads"]);
    });

    Route::prefix("calendar")->group(function(){
        Route::get("events/get",[CalendarController::class,"getEvents"]);
    });
});