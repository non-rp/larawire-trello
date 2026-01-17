<?php

use App\Livewire\Boards\Create;
use App\Livewire\Boards\Index;
use App\Livewire\Boards\Show;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('welcome');
})->name('home');

Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');

Route::group(['prefix' => 'boards'], function () {
    Route::get('/', Index::class)->name('boards.index');
    Route::get('/create', Create::class)->name('boards.create');
    Route::get('/{board}', Show::class)->name('boards.show');
})->middleware(['auth', 'verified']);



require __DIR__.'/settings.php';
