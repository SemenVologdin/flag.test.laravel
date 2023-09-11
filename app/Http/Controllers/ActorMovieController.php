<?php

namespace App\Http\Controllers;

use App\Models\Actor;
use Illuminate\Http\JsonResponse;

class ActorMovieController extends Controller
{
    public function index(Actor $actor): JsonResponse
    {
        return response()->json([
            'data' => $actor->movies()?->get() ?: []
        ]);
    }
}
