<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\PartController;
use App\Http\Controllers\IssueController;
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
    return view('dashboard');
})->middleware('auth');



// useless routes
// Just to demo sidebar dropdown links active states.
Route::get('/buttons/text', function () {
    return view('buttons-showcase.text');
})->middleware(['auth'])->name('buttons.text');

Route::get('/buttons/icon', function () {
    return view('buttons-showcase.icon');
})->middleware(['auth'])->name('buttons.icon');

Route::get('/buttons/text-icon', function () {
    return view('buttons-showcase.text-icon');
})->middleware(['auth'])->name('buttons.text-icon');

require __DIR__ . '/auth.php';


Route::middleware('auth')->group(function () {
    Route::get('/dashboard', function () {return view('dashboard');})->name('dashboard');

    Route::get('/issues', [IssueController::class, 'index'])->name('issues.index');
    Route::put('/issues/{id}', [IssueController::class, 'update'])->name('issues.update');
    Route::delete('/issues/{id}', [IssueController::class, 'destroy'])->name('issues.destroy');
    Route::post('/issues', [IssueController::class, 'store'])->name('issues.store');

    Route::get('/parts', [PartController::class, 'index'])->name('parts.index');
    Route::put('/parts/{id}', [PartController::class, 'update'])->name('parts.update');
    Route::delete('/parts/{id}', [PartController::class, 'destroy'])->name('parts.destroy');
    Route::post('/parts', [PartController::class, 'store'])->name('parts.store');
    Route::get('parts/export', [PartController::class, 'export']);

    Route::get('/rapportage', function () {return view('buttons.text-icon');})->name('buttons.text-icon');
});

//Routes voor als persoon Admin is
Route::middleware(['can:admin'])->group(function(){ });
