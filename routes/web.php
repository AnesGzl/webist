<?php

use App\Http\Controllers\ListeRdvController;

use App\Http\Controllers\AuthController;
use App\Http\Controllers\CarController;
use App\Http\Controllers\DashbaordController;
use App\Http\Controllers\IndexController;
use App\Http\Controllers\PostsController;
use App\Http\Controllers\ReportController;
use App\Http\Controllers\StudentsController;
use App\Http\Middleware\IsAdmin;
use App\Models\Officer;
use App\Models\Section;
use App\Models\Student;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Route;
Route::get('/infermerie/fiche', function () {
return view('infermerie/fiche');
});
Route::get('/infermerie/compt', function () {
    return view('infermerie/compt');
    });
    Route::get('/infermerie/liste_convoncu', function () {
        return view('infermerie/liste_convoncu');
        });
        Route::get('/infermerie/liste_exemption', function () {
            return view('infermerie/liste_exemption');
            });
            Route::get('/infermerie/liste_patient', function () {
                return view('infermerie/liste_patient');
                });
                Route::get('/infermerie/listeRendezvous',[ListeRdvController::class,'create']);
                Route::post('/infermerie/ajouter_rdv', [ListeRdvController::class, 'store'])->name('liste_rdv.store');
Route::get("test1",function(){

    return dd(Hash::make("123456789"));
});
Route::controller(DashbaordController::class)
    ->prefix('{id}')
    ->group(
        function () {

            Route::get("principale", "principale")->name("principale");
            Route::get("cons", "cons")->name("cons");
            Route::get("parametre", "parametre")->name("parametre");
            // Route::get("logout", "logout")->name("logout");
            Route::get("weekends", "weekends")->name("weekends");
            Route::get("infermerie", "infermerie")->name("infermerie");
        }
    );
    Route::get('test', function () {



        $sections = Section::get();



        foreach ($sections as $section) {
            Student::factory()->count(20)->create([
                'section_id' => $section->id,
            ]);
        }


        return "Done!";
    });



Route::controller(AuthController::class)->group(
    function () {
        Route::get("showLoginForm", "showLoginForm")->name("showLoginForm");


        Route::post("login", "login")->name("login");
        Route::get("/logout", "logout")->name("logout");
    }

);


Route::get("", function () {
    return  view("index");
});
