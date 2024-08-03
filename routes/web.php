<?php

use App\Livewire\CityPage;
use App\Livewire\Home;
use Illuminate\Support\Facades\Route;

Route::get('/', HomePage::class)->name('home-page');

Route::get('/{year}/{state}/{citySlug}', CityPage::class)->name('view-data');
