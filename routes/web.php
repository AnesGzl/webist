<?php
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\ConvoncuController;
use App\Http\Controllers\ListeRdvController;
use App\Http\Controllers\ExemptionController;
use App\Http\Controllers\PatientController;
use App\Http\Controllers\FicheController;
// Routes de connexion
Route::get('/', [AuthController::class, 'index'])->name('login');
Route::post('/login', [AuthController::class, 'login'])->name('login.submit');

// Route de déconnexion (POST uniquement)
Route::post('/logout', action: [AuthController::class, 'logout'])->name('logout')->middleware('auth');

// Routes authentifiées
Route::get('/infermerie/compt', fn() => view('infermerie.compt'))
    ->name('compt')->middleware('auth');

Route::get('/infermerie/liste_convoncu', [ConvoncuController::class, 'show'])
    ->name('liste_convoncu')->middleware('auth');



Route::get('/infermerie/CreateRendezvous', [ListeRdvController::class, 'create'])
    ->name('liste_rdv.create')->middleware('auth');





Route::get('/infermerie/listeRendezvous', [ListeRdvController::class, 'index'])
    ->name('liste_rdv.index')->middleware('auth');

Route::post('/infermerie/listeRdv', [ListeRdvController::class, 'store'])
    ->name('liste_rdv.store')->middleware('auth');

Route::delete('/infermerie/listeRendezvous', [ListeRdvController::class, 'destroy'])
    ->name('liste_rdv.destroy')->middleware('auth');

Route::get('/infermerie/liste_exemption', [ExemptionController::class, 'index'])
    ->name('exemptions.index')->middleware('auth');

Route::post('/infermerie/liste_exemption', [ExemptionController::class, 'store'])
    ->name('exemptions.store')->middleware('auth');

Route::get('/infermerie/create_exemption', [ExemptionController::class, 'create'])
    ->name('exemptions.create')->middleware('auth');

Route::get('/infermerie/liste_patient', [PatientController::class, 'index'])
    ->name('patients.index')->middleware('auth');

Route::post('/patients/{id}/valider', [PatientController::class, 'valider'])
    ->name('patients.valider')->middleware('auth');

Route::get('/fiche/{id}', [FicheController::class, 'show'])
    ->name('fiche.show')->middleware('auth');

Route::put('/fiche/{id}', [FicheController::class, 'update'])
    ->name('fiche.update')->middleware('auth');





                Route::get("test1",function(){

    return dd(Hash::make("123456789"));
});





