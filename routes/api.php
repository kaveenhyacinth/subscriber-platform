<?php

    use App\Http\Controllers\PostController;
    use App\Http\Controllers\WebsiteController;
    use Illuminate\Support\Facades\Route;


    Route::prefix('website')->name('website.')->group(function () {
        Route::post('/{website}/subscribe', [WebsiteController::class, 'subscribe'])->name('subscribe');
    });

    Route::prefix('posts')->name('post.')->group(function () {
        Route::post('/', [PostController::class, 'store'])->name('store');
    });
