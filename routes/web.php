<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AdminController;
use App\Http\Controllers\UtilisateurController;
use App\Http\Controllers\CoursController;
use App\Http\Controllers\ReserverController;
use App\Http\Controllers\NoterController;
use App\Http\Controllers\QuestionController;
use App\Http\Controllers\ReponseController;

// Page d'accueil par défaut
Route::get('/', fn() => redirect()->route('accueil'));

// Pages statiques
Route::view('/accueil', 'accueil')->name('accueil');
Route::view('/concept', 'concept')->name('concept');
Route::view('/cours', 'cours')->name('cours'); // Statique
Route::view('/cours_cinema', 'cours_cinema')->name('cours_cinema');
Route::view('/cours_ecriture', 'cours_ecriture')->name('cours_ecriture');
Route::view('/cours_montage', 'cours_montage')->name('cours_montage');
Route::view('/cours_production', 'cours_production')->name('cours_production');
Route::view('/cours_realisation', 'cours_realisation')->name('cours_realisation');


// Authentification Utilisateur

Route::middleware('auth')->group(function () {
    Route::get('/home', [UtilisateurController::class, 'index'])->name('home');
});

Route::get('/login', [UtilisateurController::class, 'showLogin'])->name('login');
Route::post('/login', [UtilisateurController::class, 'login'])->name('login.submit');
Route::get('/register', [UtilisateurController::class, 'showRegister'])->name('register');
Route::post('/register', [UtilisateurController::class, 'register'])->name('register.submit');
Route::post('/logout', [UtilisateurController::class, 'logout'])->name('logout');


// Authentification Admin

Route::get('/admin/login', [AdminController::class, 'showLogin'])->name('admin.login');
Route::post('/admin/login', [AdminController::class, 'login'])->name('admin.login.submit');
Route::post('/admin/logout', [AdminController::class, 'logout'])->name('admin.logout');

Route::middleware('auth:admin')->group(function () {
    Route::get('/admin', [AdminController::class, 'index'])->name('admin.index');

// Gestion des cours par l'admin
Route::get('/admin/cours/create', [AdminController::class, 'create'])->name('admin.cours.create');
Route::post('/admin/cours', [AdminController::class, 'store'])->name('admin.cours.store');
Route::get('/admin/cours/{id}/edit', [AdminController::class, 'edit'])->name('admin.cours.edit');
Route::put('/admin/cours/{id}', [AdminController::class, 'update'])->name('admin.cours.update');
Route::delete('/admin/cours/{id}', [AdminController::class, 'destroy'])->name('admin.cours.destroy');
});

// Vue gestion des cours pour utilisateur

// Routes protégées par authentification
Route::middleware('auth')->group(function () {

Route::get('/planning', [CoursController::class, 'planning'])->name('cours.planning');
Route::get('/api/cours', fn() => \App\Models\Cours::all())->name('api.cours');
Route::get('/mes-cours', [CoursController::class, 'index'])->name('cours.index');
Route::get('/cours/{id}/confirmer', [CoursController::class, 'confirmer'])->whereUuid('id_cours')->name('cours.confirmer');
Route::post('/cours/{id}/reserver', [CoursController::class, 'reserver'])->whereUuid('id_cours')->name('cours.reserver');
Route::get('/mes-reservations', [CoursController::class, 'mesReservations'])->name('cours.mes_reservations');
Route::delete('/cours/{id}/annuler', [CoursController::class, 'annuler'])->whereUuid('id')->name('cours.annuler');
});

// Noter

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