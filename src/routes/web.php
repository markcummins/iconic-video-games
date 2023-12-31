<?php

use App\Http\Controllers\GamesController;
use App\Http\Controllers\GamesImportController;

use Illuminate\Foundation\Application;
use Illuminate\Support\Facades\Route;
use Inertia\Inertia;

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

Route::get('/', array(GamesController::class, 'home'));

Route::get('/single', array(GamesController::class, 'single_page'));

Route::get('/import', array(GamesImportController::class, 'index'));
