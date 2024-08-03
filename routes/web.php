<?php

use App\Livewire\CityPage;
use App\Livewire\HomePage;
use Illuminate\Support\Facades\Route;

Route::get('/', HomePage::class)->name('home-page');

Route::view('/about', 'about')->name('about');

Route::view('/contribute', 'contribute')->name('contribute');

Route::get('/{year}/{state}/{citySlug}', CityPage::class)->name('city-page');
