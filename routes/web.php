<?php

use App\Http\Controllers\ProfileController;
use App\Http\Controllers\MemberController;
use App\Http\Controllers\SortController;
use App\Http\Controllers\ProductController;
use App\Http\Controllers\JangbuiController;
use App\Http\Controllers\JangbuoController;
use App\Http\Controllers\FindproductController;
use App\Http\Controllers\GiganController;
use App\Http\Controllers\BestController;
use App\Http\Controllers\CrosstabController;
use App\Http\Controllers\ChartController;
use App\Http\Controllers\LoginController;
use App\Http\Controllers\PictureController;
use App\Http\Controllers\AjaxController;
use Illuminate\Support\Facades\Route;
use App\Models\Member;

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
    return view('index');
});

Route::get('member', [MemberController::class,'index']);
Route::resource('member', MemberController::class);
Route::resource('sort', SortController::class);
Route::get('product/jaego', [ProductController::class, 'jaego']);
Route::resource('product', ProductController::class);
Route::delete('/product/{id}/destroy', [ProductController::class, 'destroy']);
Route::resource('jangbui', JangbuiController::class);
Route::resource('jangbuo', JangbuoController::class);
Route::resource('findproduct', FindproductController::class);
Route::resource('gigan', GiganController::class);
Route::resource('best', BestController::class);
Route::resource('crosstab', CrosstabController::class);
Route::resource('chart', ChartController::class);
Route::post('login/check', [LoginController::class,'check']);
Route::get('login/logout', [LoginController::class,'logout']);
Route::resource('picture', PictureController::class);
Route::resource('ajax', AjaxController::class);

Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

require __DIR__.'/auth.php';
