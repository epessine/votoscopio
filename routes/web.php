<?php

use App\Livewire\City;
use App\Livewire\Home;
use Illuminate\Support\Facades\Route;

Route::get('/', Home::class)->name('home');

Route::get('/{year}/{state}/{city}', City::class)->name('view-data');
