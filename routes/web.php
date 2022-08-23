<?php

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
});

/* Route::group(['middleware' => ['auth:sanctum', config('jetstream.auth_session'), 'verified'], 'prefix' => 'dashboard'], function () {
    Route::get('/', function () {
        return view('dashboard');
    })->name('dashboard');
}); */
