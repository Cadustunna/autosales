<?php

use App\Livewire\AboutUs;
use App\Livewire\ContactUs;
use App\Livewire\Home;
use App\Livewire\Inquiries;
use App\Livewire\Services;
use App\Livewire\Terms;
use App\Livewire\View;
use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Storage;

//Route::view('/', 'welcome')->name('welcome');

Route::get('/', Home::class)->name('welcome');
Route::get('/about', AboutUs::class)->name('about-us');
Route::get('/inquiries', Inquiries::class)->name('inquiries');
Route::get('/services', Services::class)->name('services');
Route::get('/Terms&Privacy', Terms::class)->name('Terms&privacy');
Route::get('/show/{id}', View::class)->name('car.details');

Route::view('dashboard', 'dashboard')
    ->middleware(['auth', 'verified'])
    ->name('dashboard');

Route::view('profile', 'profile')
    ->middleware(['auth'])
    ->name('profile');

Route::middleware('auth')->group(function() {
    // Route::get('/about', AboutUs::class)->name('about-us');

});

require __DIR__.'/auth.php';
