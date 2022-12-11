<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AuthenticationController as auth;
use App\Http\Controllers\DocumentController;
use App\Http\Controllers\InvestorInformationController;
use App\Http\Controllers\MasterAccountController;
use App\Http\Controllers\SubHeadController;
use App\Http\Controllers\ChildOneController;
use App\Http\Controllers\ChildTwoController;
use App\Http\Controllers\NavigationHeadViewController;
use App\Http\Controllers\InvestorPaymentController;
use App\Http\Controllers\ProjectController;


/* Middleware */
use App\Http\Middleware\isAdmin;
use App\Http\Middleware\isOwner;


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
Route::get('/register', [auth::class,'signUpForm'])->name('register');
Route::post('/register', [auth::class,'signUpStore'])->name('register.store');
Route::get('/', [auth::class,'signInForm'])->name('signIn');
Route::get('/login', [auth::class,'signInForm'])->name('login');
Route::post('/login', [auth::class,'signInCheck'])->name('login.check');
Route::get('/logout', [auth::class,'signOut'])->name('logOut');


Route::group(['middleware'=>isAdmin::class],function(){
    Route::prefix('admin')->group(function(){
        Route::get('dashboard', function () {
            return view('dashboard');
        })->name('admin.dashboard');

    });
});

Route::group(['middleware'=>isOwner::class],function() {
    Route::prefix('owner')->group(function() {
        Route::get('dashboard', function () {
            return view('dashboard');
        })->name('owner.dashboard');

    });
});

Route::resource('document',DocumentController::class);
Route::resource('investor',InvestorInformationController::class);
Route::resource('masterAccount',MasterAccountController::class);
Route::resource('subHead',SubHeadController::class);
Route::resource('childOne',ChildOneController::class);
Route::resource('childTwo',ChildTwoController::class);
Route::resource('navigationHeadView',NavigationHeadViewController::class);
Route::resource('investorPayment',InvestorPaymentController::class);
Route::resource('project',ProjectController::class);
