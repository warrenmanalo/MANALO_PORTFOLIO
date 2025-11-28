<?php

use App\Models\Hero;
use App\Models\About;
use App\Models\Contact;
use App\Models\Project;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\ContentController;
use App\Http\Controllers\ProjectController;


Route::get('/', function () {
    $heroes = Hero::first();
    $about = About::first();
    $projects = Project::all();
    $contact = Contact::first();
    return view('welcome', compact('heroes', 'about', 'projects', 'contact',));
})->name('welcome');


Route::get('register', [AuthController::class, 'showRegister'])->name('register.form');
Route::post('register', [AuthController::class, 'register'])->name('register');

Route::get('/login', [AuthController::class, 'showLogin'])->name('login.form');
Route::post('login', [AuthController::class, 'login'])->name('login');

Route::post('/logout', [AuthController::class, 'logout'])->name('logout');

Route::get('/dashboard', function () {
    return redirect()->route('welcome');
});

Route::middleware(['auth'])
    ->prefix('admin')
    ->name('admin.')
    ->group(function () {

        // Dashboard
        Route::get('/dashboard', [ContentController::class, 'index'])
        ->middleware('auth')
        ->name('dashboard');

        


        Route::get('/content', [ContentController::class, 'index'])->name('content.index');

        Route::put('/content/hero', [ContentController::class, 'updateHero'])->name('content.hero.update');
        Route::put('/content/about', [ContentController::class, 'updateAbout'])->name('content.about.update');
        Route::put('/content/contact', [ContentController::class, 'updateContact'])->name('content.contact.update');

        Route::resource('projects', ProjectController::class);
    });