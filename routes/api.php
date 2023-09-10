<?php

use App\Http\Controllers\ActorController;
use App\Http\Controllers\GenreController;
use App\Http\Controllers\MovieController;
use Illuminate\Support\Facades\Route;

Route::apiResource("movies", MovieController::class);
Route::apiResource("genres", GenreController::class);
Route::apiResource("actors", ActorController::class);
