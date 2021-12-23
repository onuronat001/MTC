<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\PersonController;
use App\Http\Controllers\AddressController;

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

Route::get('/', function () { return view('welcome'); });

/* Person Routes */
Route::get('/person', [PersonController::class, 'list']);

Route::get('/person/new', [PersonController::class, 'new']);
Route::post('/person', [PersonController::class, 'create']);

Route::get('/person/edit/{id}', [PersonController::class, 'edit']);
Route::post('/person/{id}', [PersonController::class, 'update']);

Route::get('/person/remove/{id}', [PersonController::class, 'remove']);


/* Address Routes */
Route::get('/address/{person_id}', [AddressController::class, 'list']);

Route::get('/address/new/{person_id}', [AddressController::class, 'new']);
Route::post('/address', [AddressController::class, 'create']);

Route::get('/address/edit/{id}', [AddressController::class, 'edit']);
Route::post('/address/{id}', [AddressController::class, 'update']);

Route::get('/address/remove/{id}', [AddressController::class, 'remove']);