<?php

use App\Http\Controllers\AccountsController;
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



Route::resource('accounts', AccountsController::class);



Route::get('/info', function () {
    phpinfo();
});

Route::get('/characters', [\App\Http\Controllers\CharacterController::class, 'index'])->name('characters.index');
Route::get('/character/{id}', [\App\Http\Controllers\CharacterController::class, 'show'])->name('characters.show');


Route::get('/items/import', [\App\Http\Controllers\ItemImportController::class, 'showImportForm'])->name('items.import_form');
Route::get('/items/import2', [\App\Http\Controllers\ItemImportController::class, 'importItems'])->name('items.import');

Route::get('/options/import', [\App\Http\Controllers\ItemImportController::class, 'importOptions'])->name('items.import');

Route::get('/img', [\App\Http\Controllers\ItemImportController::class, 'getImages']);