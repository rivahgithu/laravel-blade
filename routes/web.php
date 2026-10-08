<?php

use App\Http\Controllers\AuthController;
use App\Http\Controllers\BlogController;
use App\Http\Controllers\ContactController;
use Illuminate\Support\Facades\Route;

Route::get('/', [BlogController::class, 'index'])->name('home');
Route::get('/article/{id}', [BlogController::class, 'show'])->name('article.show');


Route::get('/register', [AuthController::class, 'showSignUp'])->name('register');
Route::post('/register', [AuthController::class, 'signUp'])->name('registration.register');

Route::get('/login', [AuthController::class, 'showFormLogin'])->name('login');
Route::post('/login', [AuthController::class, 'login'])->name('login.submit');

Route::get('/dashboard', function () {return view('dashboard');})->name('dashboard')->middleware('auth');
Route::post('/logout', [AuthController::class, 'logout'])->name('logout');

Route::get('/create', [BlogController::class, 'readCategories'])->name('create')->middleware('auth');
Route::post('/create', [BlogController::class, 'createArticle'])->name('article.store')->middleware('auth');

Route::get('/dashboard', [BlogController::class, 'dashboardArticles'])->name('dashboard');
Route::get('/article/{id}/edit', [BlogController::class, 'dashboardArticlesSingle'])->name('article.edit')->middleware('auth');
Route::put('/article/{id}', [BlogController::class, 'update'])->name('article.update')->middleware('auth');
Route::delete('/article/{id}', [BlogController::class, 'destroy'])->name('article.destroy')->middleware('auth');

Route::get('/contact', [ContactController::class, 'show'])->name('contact.show');
Route::post('/contact', [ContactController::class, 'send'])->name('contact.send');



