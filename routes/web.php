<?php

use App\Http\Controllers\CompaniesContoller;
use App\Http\Controllers\JobsController;
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

Route::get('/', [JobsController::class, 'index']);
Route::get('/jobs', [JobsController::class, 'jobs']);
Route::get('/jobs/new', [JobsController::class, 'post']);
Route::post('/jobs/new', [JobsController::class, 'create']);
Route::get('/job/{id}', [JobsController::class, 'show']);

Route::get('/companies', [CompaniesContoller::class, 'index']);
