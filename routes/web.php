<?php

use App\Models\Candidat;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\ModuleController;
use App\Http\Controllers\CandidatController;
use App\Http\Controllers\Auth\AuthenticatedSessionController;

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

// Route::get('/', function () {
//     // $candidat = Candidat::find(1);
//     // dd($candidat);
//     return view('welcome', compact('candidat'));
//  });


//Route candidat


Route::get('/', [CandidatController::class, 'index']);


Route::post('/enregistrer/candidat', [CandidatController::class, 'store'])->name('store.candidat');
Route::get('/montrer/candidat/{id}', [CandidatController::class, 'show'])->name('show.candidat');
Route::get('/supprimer-candidat/{id}', [CandidatController::class, 'destroy'])->name('delete-candidat');
Route::get('/editer-candidat/{id}', [CandidatController::class, 'edit'])->name('edit-candidat');
Route::post('/modifier/candidat/{id}', [CandidatController::class, 'update'])->name('update.candidat');


// Route::get('/pdf/{filename}', [CandidatController::class, 'downloadPDF'])->name('pdf.download');


//Route module



Route::post('/enregistrer/module', [ModuleController::class, 'store'])->name('store.module');
Route::get('/supprimer-module/{id}', [ModuleController::class, 'destroy'])->name('delete-module');
Route::get('/editer-module/{id}', [ModuleController::class, 'edit'])->name('edit-module');
Route::post('/modifier/module/{id}', [ModuleController::class, 'update'])->name('update.module');


Route::middleware(['auth'])->group(function () {
    // Les routes protégées
    Route::get('/liste/module', [ModuleController::class, 'liste'])->name('liste.module');
    Route::get('/ajouter/module', [ModuleController::class, 'index'])->name('index');

    Route::get('/liste/candidat', [CandidatController::class, 'liste'])->name('liste.candidat');
    // ...
});





// Routes d'authentification

// // Page de login
Route::get('/login', [App\Http\Controllers\Auth\LoginController::class, 'showLoginForm'])->name('login');
Route::post('/login', [App\Http\Controllers\Auth\LoginController::class, 'login']);

// // Page d'inscription
Route::get('/register-rh', [App\Http\Controllers\Auth\RegisterRHController::class, 'showRegistrationForm'])->name('register-rh');
Route::post('/register-rh', [App\Http\Controllers\Auth\RegisterRHController::class, 'register-rh']);

Auth::routes();

Route::get('/dashboard', [App\Http\Controllers\HomeController::class, 'index'])->name('dashboard');

Route::post('/logout', [AuthenticatedSessionController::class, 'destroy'])
    ->middleware('auth')
    ->name('logout');


Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');

