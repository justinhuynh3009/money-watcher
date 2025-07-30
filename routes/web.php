<?php

use App\Livewire\MoneyEntryForm;
use App\Livewire\Welcome;
use Illuminate\Support\Facades\Route;

Route::get('/', Welcome::class);

Route::get('/entry-form', MoneyEntryForm::class)
    ->name('entry-form');
