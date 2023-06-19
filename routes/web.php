<?php

use Illuminate\Support\Facades\Route;
use App\Models\FreeCompany;
use App\Models\Event;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

Route::get('/', function () {
    return view('index', [
        'events' => Event::all()->where('endTime', '>=', time()),
        'company' => FreeCompany::find(1)
    ]);
});