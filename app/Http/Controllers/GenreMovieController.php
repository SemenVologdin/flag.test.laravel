<?php

namespace App\Http\Controllers;

use App\Models\Genre;

class GenreMovieController extends Controller
{
    public function index(Genre $genre)
    {
        return response()->json([
            'data' => $genre->movies()->get() ?: []
        ]);
    }
}
