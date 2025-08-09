<?php

use App\Livewire\Auth\LoginPage;
use App\Livewire\Auth\RegisterPage;
use App\Livewire\MoneyEntryForm;
use App\Livewire\Profile;
use App\Livewire\TransactionList;
use App\Livewire\Welcome;
use Illuminate\Support\Facades\Route;

Route::get('/login', LoginPage::class)
    ->name('login');
Route::get('/register', RegisterPage::class)
    ->name('register');

Route::middleware(['auth'])->group(function () {
    Route::get('/', Welcome::class)->name('dashboard');

    Route::get('/entry-form/{uuid?}', MoneyEntryForm::class)
        ->name('entry-form');
    Route::get('/transactions', TransactionList::class)
        ->name('transactions');

    Route::get('/profile', Profile::class)
        ->name('profile');
});
