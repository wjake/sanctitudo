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
        'events' => Event::where('endTime', '>=', time())->orderBy('startTime')->get(),
        'company' => FreeCompany::find(1)
    ]);
});

Route::get('/members', function () {
    return view('members', [
        'company' => FreeCompany::find(1)
    ]);
});

Route::get('/events', function () {
    return view('events', [
        'events' => Event::orderByDesc('startTime')->paginate(15),
        'company' => FreeCompany::find(1)
    ]);
});
