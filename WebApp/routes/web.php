<?php

use Illuminate\Support\Facades\Route;
use App\Models\Character;

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
    dump(Character::all());
    return view('welcome');
})->name('landing');

Route::get('/info', function () {
    phpinfo();
});

Route::get('/characters', [\App\Http\Controllers\CharacterController::class, 'index'])->name('characters.index');
Route::get('/character/{$id}', [\App\Http\Controllers\CharacterController::class, 'show'])->name('characters.show');
