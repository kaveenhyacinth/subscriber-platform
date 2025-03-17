<?php

    use App\Http\Controllers\WebsiteController;
    use Illuminate\Support\Facades\Route;


    Route::prefix('website')->name('website.')->group(function () {
        Route::post('/{website}/subscribe', [WebsiteController::class, 'subscribe'])->name('subscribe');
    });
