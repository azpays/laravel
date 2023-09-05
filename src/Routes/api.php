<?php

use AzPays\Laravel\Http\Controllers\PaymentController;
use AzPays\Laravel\Http\Controllers\SubscriptionController;
use AzPays\Laravel\Http\Controllers\WalletController;
use Illuminate\Support\Facades\Route;

Route::prefix(config('azpays.routes.prefix'))->group(function () {
    Route::prefix('payments')->name('payments.')->controller(PaymentController::class)->group(function () {
        Route::post('/create', 'create')->name('create');
        Route::post('/{token}/checkout', 'checkout')->name('checkout');
        Route::post('/{token}/check', 'check')->name('check');
    });

    // Wallets
    Route::prefix('wallets')->name('wallets.')->controller(WalletController::class)->group(function () {
        Route::post('/claim', 'claim')->name('claim');
    });

    // Subscriptions
    Route::prefix('subscriptions')->name('subscriptions.')->controller(SubscriptionController::class)->group(function () {
        Route::get('/', 'index')->name('index');
    });
});
