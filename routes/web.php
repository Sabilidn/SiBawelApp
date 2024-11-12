<?php

use App\Http\Controllers\Auth\LoginController;
use App\Http\Controllers\ProfileController;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('dashboard.index');
   // return view('front.semua-pengaduan');
    // return view('welcome');
})->middleware(['auth']);

Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');

// Route::middleware('auth')->group(function () {
//     Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
//     Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
//     Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
// });

// Route::group(['middleware' => Route::get('login', [LoginController::class> 'guest'], function () {
//     , 'showLoginForm'])->name('login');
//     Route::post('login', [LoginController::class, 'login']);
// });
// Route get('login', [logincontroller])

Route::group(['middleware'=>'guest'],  function () {
Route::get('login', [LoginController::class, 'showLoginForm'])->name('login');
Route::post( 'login', [LoginController::class, 'login']);
Route::get('register', [LoginController::class, 'showRegistrationForm'])->name('register');
Route::post( 'register', [LoginController::class, 'register']);
});

Route::prefix('admin')->middleware(['auth', 'isAdmin'])->group(function(): void{
Route::get('/', function(){
    return view('dashboard.index');
 });
});
// require _DIR_.'/auth.php';

Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
