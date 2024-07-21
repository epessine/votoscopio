<?php

use App\Livewire\CityPage;
use App\Livewire\Home;
use Illuminate\Support\Facades\Route;

Route::get('/', Home::class)->name('home');

Route::get('/{year}/{state}/{citySlug}', CityPage::class)->name('view-data');
