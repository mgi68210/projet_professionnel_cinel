<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\CoursController;
use App\Http\Controllers\ReserverController;
use App\Http\Controllers\NoterController;
use App\Http\Controllers\QuestionnaireController;



// Pages statiques


Route::view('/accueil', 'accueil')->name('accueil');
Route::view('/concept', 'concept')->name('concept');
Route::view('/cours', 'cours')->name('cours');
Route::view('/cours_cinema', 'cours_cinema')->name('cours_cinema');
Route::view('/cours_ecriture', 'cours_ecriture')->name('cours_ecriture');
Route::view('/cours_montage', 'cours_montage')->name('cours_montage');
Route::view('/cours_production', 'cours_production')->name('cours_production');
Route::view('/cours_realisation', 'cours_realisation')->name('cours_realisation');




// Authentification

Route::get('/login', [AuthController::class, 'login'])->name('login');
Route::post('/login', [AuthController::class, 'doLogin'])->name('login.do');
Route::post('/logout', [AuthController::class, 'logout'])->name('logout');

Route::get('/register', [AuthController::class, 'register'])->name('register');
Route::post('/register', [AuthController::class, 'doRegister'])->name('register.submit');

Route::get('/admin', fn() => 'Admin Dashboard')->name('admin.index');
Route::get('/home', fn() => 'Accueil utilisateur')->name('home');


// Cours avec connexion


Route::get('/cours-liste', [CoursController::class, 'index'])->name('cours.liste');
Route::get('/planning', [CoursController::class, 'planning'])->name('cours.planning');
Route::get('/cours/{id}/confirmer', [CoursController::class, 'confirmer'])->name('cours.confirmer');
Route::post('/cours/{id}/reserver', [CoursController::class, 'reserver'])->name('cours.reserver');
Route::get('/mes-reservations', [CoursController::class, 'mesReservations'])->middleware('auth')->name('cours.mes_reservations');
Route::delete('/cours/{id}/annuler', [ReserverController::class, 'annuler'])->name('cours.annuler');


// Noter


Route::get('/noter', [NoterController::class, 'vueform'])->middleware('auth')->name('noter.form');
Route::post('/noter', [NoterController::class, 'submit'])->middleware('auth')->name('noter.submit');


// Questionnaire

Route::get('/quiz', [QuestionnaireController::class, 'index'])->name('quiz.index');
Route::get('/quiz/{id_cours}', [QuestionnaireController::class, 'show'])->name('quiz.show');
Route::post('/quiz/{id_cours}/submit', [QuestionnaireController::class, 'submit'])->name('quiz.submit');



// Page accueil par défaut


Route::get('/', fn() => redirect()->route('accueil'));
