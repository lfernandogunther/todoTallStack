<?php

use App\Http\Livewire\Dashboard\Index;
use Illuminate\Support\Facades\Route;

Route::get('/', Index::class)->name('index');
