<?php

use App\Http\Middleware\isInvestor;
use Illuminate\Support\Facades\Route;

Route::group(['middleware'=>isInvestor::class],function() {
    Route::prefix('investor')->group(function() {
        Route::get('dashboard', function () {
            return view('dashboard');
        })->name('investor.dashboard');



    Route::resource('investor',InvestorInformationController::class)->only([
        'index','show'
    ]);

    });
});
