<?php

use App\Http\Controllers\ProfileController;
use Illuminate\Support\Facades\Route;
use Laravel\Socialite\Facades\Socialite;

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
    return view('welcome');
});

Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth'])->name('dashboard');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::get('/topup', [\App\Http\Controllers\TopupController::class, 'topupView'])->name('topup');
    Route::post('/topup', [\App\Http\Controllers\TopupController::class, 'createPayment'])->name('topup.create');
    Route::post('/buyAcount', [\App\Http\Controllers\ProductsController::class, 'buyOrder'])->name('buyOrder');
    Route::get('/profile', [\App\Http\Controllers\PagesController::class, 'profileView'])->name('profile');
    Route::get('/level', [\App\Http\Controllers\UtilsController::class, 'levelView'])->name('level');
    Route::post('/claimReward', [\App\Http\Controllers\UtilsController::class, 'claimReward'])->name('level.claim');
});

Route::middleware([\App\Http\Middleware\AdminCheck::class])->group(function () {
    Route::post('/updateTable/{table?}/{id?}', [\App\Http\Controllers\AdminController::class, 'updateTable'])->name('admin.generalUpdate');
    Route::post('/insertTable/{table?}', [\App\Http\Controllers\AdminController::class, 'insertTable'])->name('admin.generalInsert');
    Route::post('/findTable/{table?}/{id?}', [\App\Http\Controllers\AdminController::class, 'findTable'])->name('admin.generalFind');

    Route::get('/admin/dashboard', [\App\Http\Controllers\AdminController::class, 'dashboardView'])->name('admin.index');
    Route::post('/admin/information', [\App\Http\Controllers\AdminController::class, 'fetchInfo'])->name('admin.info');

    Route::get('/admin/accounts', [\App\Http\Controllers\AdminController::class, 'accountView'])->name('admin.accounts');
    Route::get('/admin/accounts/new', [\App\Http\Controllers\AdminController::class, 'addAccount'])->name('admin.accounts.new');
    Route::post('/admin/accounts/new', [\App\Http\Controllers\AdminController::class, 'addAccount'])->name('admin.accounts.new.post');

    Route::get('/admin/products', [\App\Http\Controllers\AdminController::class, 'productsView'])->name('admin.products');
    Route::get('/admin/products/new', [\App\Http\Controllers\AdminController::class, 'addProduct'])->name('admin.products.new');
    Route::post('/admin/products/new/{table}', [\App\Http\Controllers\AdminController::class, 'insertTable'])->name('admin.products.new.post');

    Route::get('/admin/orders', [\App\Http\Controllers\AdminController::class, 'ordersView'])->name('admin.orders');

    Route::get('/admin/levels', [\App\Http\Controllers\AdminController::class, 'levelsView'])->name('admin.levels');
    Route::get('/admin/levels/new', [\App\Http\Controllers\AdminController::class, 'addLevelView'])->name('admin.levels.new');
});

Route::get('/loginWith/discord', function () {
    return Socialite::driver('discord')->redirect();
})->name('login.discord');

Route::get('/loginWith/google', function () {
    return Socialite::driver('google')->redirect();
})->name('login.google');

//Route::get('/loginWith/facebook', function () {
//    return Socialite::driver('facebook')->redirect();
//})->name('login.facebook');

Route::get('/discord/oauth', [\App\Http\Controllers\UtilsController::class, 'handleDiscordLogin']);
Route::get('/google/oauth', [\App\Http\Controllers\UtilsController::class, 'handleGoogleLogin']);
//Route::get('/facebook/oauth', [\App\Http\Controllers\UtilsController::class, 'handleFBLogin']);

require __DIR__.'/auth.php';