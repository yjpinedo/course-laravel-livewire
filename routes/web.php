<?php

use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('welcome');
});

Route::middleware(['auth:sanctum', config('jetstream.auth_session'), 'verified'])->prefix('dashboard')->group(function () {
    Route::get('/', function () {
        return view('dashboard');
    })->name('dashboard');

    Route::group(['prefix' => 'category'], function () {
        Route::get('/', App\Http\Livewire\Dashboard\Category\Index::class)->name('dashboard.category.index');
        Route::get('/create', App\Http\Livewire\Dashboard\Category\Save::class)->name('dashboard.category.create');
        Route::get('/edit/{id}', App\Http\Livewire\Dashboard\Category\Save::class)->name('dashboard.category.edit');
    });

    Route::group(['prefix' => 'contact'], function () {
        Route::get('/', App\Http\Livewire\Contact\General::class)->name('contact.general');
        Route::get('/person', App\Http\Livewire\Contact\Person::class)->name('contact.person');
        Route::get('/company', App\Http\Livewire\Contact\Company::class)->name('contact.company');
        Route::get('/detail', App\Http\Livewire\Contact\Detail::class)->name('contact.detail');
    });
});

/* Route::group(['middleware' => ['auth:sanctum', config('jetstream.auth_session'), 'verified'], 'prefix' => 'dashboard'], function () {
    Route::get('/', function () {
        return view('dashboard');
    })->name('dashboard');
}); */
