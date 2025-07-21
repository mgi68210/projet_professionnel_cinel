<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AdminController;
use App\Http\Controllers\UtilisateurController;
use App\Http\Controllers\CoursController;
use App\Http\Controllers\ReserverController;
use App\Http\Controllers\NoterController;
use App\Http\Controllers\QuestionController;
use App\Http\Controllers\ReponseController;




// Pages statiques


Route::view('/accueil', 'accueil')->name('accueil');
Route::view('/concept', 'concept')->name('concept');
Route::view('/cours', 'cours')->name('cours');
Route::view('/cours_cinema', 'cours_cinema')->name('cours_cinema');
Route::view('/cours_ecriture', 'cours_ecriture')->name('cours_ecriture');
Route::view('/cours_montage', 'cours_montage')->name('cours_montage');
Route::view('/cours_production', 'cours_production')->name('cours_production');
Route::view('/cours_realisation', 'cours_realisation')->name('cours_realisation');




// PAGE DE CONNEXION/INSCRIPTION/DECONNEXION
// UTILISATEUR
Route::middleware(['is.utilisateur'])->group(function () {
    Route::get('/home', [UtilisateurController::class, 'index'])->name('home');
});

Route::get('/login', [UtilisateurController::class, 'showLogin'])->name('login');
Route::post('/login', [UtilisateurController::class, 'login'])->name('login.submit');
Route::get('/register', [UtilisateurController::class, 'showRegister'])->name('register');
Route::post('/register', [UtilisateurController::class, 'register'])->name('register.submit');
Route::post('/logout', [UtilisateurController::class, 'logout'])->name('logout');



// ADMIN
Route::middleware(['is.admin'])->group(function () {
    Route::get('/admin', [AdminController::class, 'index'])->name('admin.index');
});

Route::get('/admin/login', [AdminController::class, 'showLogin'])->name('admin.login');
Route::post('/admin/login', [AdminController::class, 'login'])->name('admin.login.submit');
Route::post('/admin/logout', [AdminController::class, 'logout'])->name('admin.logout');




// Cours avec connexion


Route::get('/cours-liste', [CoursController::class, 'index'])->name('cours.liste');
Route::get('/planning', [CoursController::class, 'planning'])->name('cours.planning');
Route::get('/cours/{id}/confirmer', [CoursController::class, 'confirmer'])->name('cours.confirmer');
Route::post('/cours/{id}/reserver', [CoursController::class, 'reserver'])->name('cours.reserver');
Route::get('/mes-reservations', [CoursController::class, 'mesReservations'])->middleware('auth')->name('cours.mes_reservations');
Route::delete('/cours/{id}/annuler', [ReserverController::class, 'annuler'])->name('cours.annuler');


// Noter

// Routes accessibles uniquement si l'utilisateur est connecté
Route::middleware(['auth'])->group(function () {
    Route::get('/noter', [NoterController::class, 'formulaire'])->name('noter.formulaire');
    Route::post('/noter', [NoterController::class, 'envoyer'])->name('noter.envoyer');

    Route::get('/noter/{id_cours}/modifier', [NoterController::class, 'modifier'])->whereUuid('id_cours')->name('noter.modifier');
    Route::post('/noter/{id_cours}/modifier', [NoterController::class, 'MAJ'])->whereUuid('id_cours')->name('noter.MAJ');
    Route::delete('/noter/{id_cours}', [NoterController::class, 'supprimer'])->whereUuid('id_cours')->name('noter.supprimer');
});

// Question

Route::middleware(['auth'])->group(function () {
    Route::get('/quiz', [QuestionController::class, 'index'])->name('quiz.index');
    Route::get('/quiz/{id_cours}', [QuestionController::class, 'show'])->whereUuid('id_cours')->name('quiz.show');
    Route::post('/quiz/{id_cours}/submit', [QuestionController::class, 'submit'])->whereUuid('id_cours')->name('quiz.submit');
    Route::get('/mes-reponses', [ReponseController::class, 'index'])->name('reponses.index');
});


// Page accueil par défaut


Route::get('/', fn() => redirect()->route('accueil'));
