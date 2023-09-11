<?php

use App\Http\Controllers\ActorController;
use App\Http\Controllers\ActorMovieController;
use App\Http\Controllers\GenreController;
use App\Http\Controllers\GenreMovieController;
use App\Http\Controllers\MovieController;
use Illuminate\Support\Facades\Route;

Route::apiResource("movies", MovieController::class);
Route::apiResource("genres", GenreController::class);
Route::apiResource("actors", ActorController::class);

Route::get("/actors/{actor}/movies", [ActorMovieController::class, 'index']);
Route::get("/genre/{genre}/movies", [GenreMovieController::class, 'index']);
