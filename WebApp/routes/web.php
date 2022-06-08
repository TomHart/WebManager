<?php

use App\Http\Controllers\Admin\AccountsController;
use App\Http\Controllers\Admin\CharacterController;
use App\Http\Controllers\Admin\DashboardController;
use App\Http\Controllers\Admin\ItemImportController;
use App\Http\Controllers\Admin\NPCController;
use App\Http\Controllers\IndexController;
use App\Http\Controllers\User\LoginController;
use App\Http\Controllers\User\RegisterController;
use Illuminate\Support\Facades\Auth;
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

Route::get('/', [IndexController::class, 'index'])->name('landing');


/*
 * Auth Routes
 */
Route::get('/login', [LoginController::class, 'showLoginForm'])->name('login');
Route::post('/login', [LoginController::class, 'performLogin'])->name('login.submit');

Route::get('/register', [RegisterController::class, 'create'])->name('register');
Route::post('/register', [RegisterController::class, 'store'])->name('register.submit');

Route::get('/logout', static function () {
    Auth::logout();
    return redirect()->back();
})->name('logout');

/*
 * Admin Routes
 */
Route::get('/dashboard', [DashboardController::class, 'index'])->name('dashboard');

Route::resource('accounts', AccountsController::class);
Route::post('/accounts/{account}/toggleAdmin', [AccountsController::class, 'toggleAdmin'])->name('accounts.toggle-admin');

Route::get('/npc/export', [NPCController::class, 'export'])->name('npc.export');
Route::resource('npc', NPCController::class);

Route::get('/characters', [CharacterController::class, 'index'])->name('characters.index');
Route::get('/character/{id}', [CharacterController::class, 'show'])->name('characters.show');


Route::get('/items/import', [ItemImportController::class, 'showImportForm'])->name('items.import_form');
Route::get('/items/import2', [ItemImportController::class, 'importItems'])->name('items.import');

Route::get('/options/import', [ItemImportController::class, 'importOptions'])->name('items.import');

Route::get('/img', [ItemImportController::class, 'getImages']);
