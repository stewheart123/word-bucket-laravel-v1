<?php

use Illuminate\Support\Facades\Route;

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

Route::get('/', function () {
    return  view('home');
});

Route::get('/play', function () {
    return view('game');
});
Route::get('lexicon-index', [App\Http\Controllers\LexiconController::class, 'lexiconIndex']);
Route::get('/game/{game_data}',[App\Http\Controllers\GameController::class,'LoadGame']);
Route::get('/adversaries', [App\Http\Controllers\UserDetailController::class,'ShowAllPublicUsers']);
Route::post('/create-adversary', [App\Http\Controllers\UserDetailController::class, 'store']);
Route::get('/games-index', [App\Http\Controllers\CreateGameController::class,'index']);
Route::post('/destroyGame', [App\Http\Controllers\CreateGameController::class, 'destroy']);
Route::get('/games-index-demo', [App\Http\Controllers\CreateGameController::class,'loggedOutGames']);
Route::get('/create', [App\Http\Controllers\CreateGameController::class,'createGame']);

Route::post('/create-game', [App\Http\Controllers\CreateGameController::class, 'store']);

Route::get('/lexicon/{game_data}',[App\Http\Controllers\LexiconController::class,'LoadLexiconGame']);
Route::post('/store-completed-word-set', [App\Http\Controllers\UserDetailController::class, 'updateCompletedLexicon']);

Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');


