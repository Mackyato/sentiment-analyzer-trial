<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\SentimentController;

// Route to the sentiment analysis form
Route::get('/', [SentimentController::class, 'index'])->name('home');

// Route to handle the sentiment analysis request
Route::post('/analyze', [SentimentController::class, 'analyze'])->name('analyze.post');

// Route to display history of analyzed texts
Route::get('/history', [SentimentController::class, 'history'])->name('history');

// Route to delete a specific record from history
Route::delete('/history/{id}', [SentimentController::class, 'destroy'])->name('history.destroy');


