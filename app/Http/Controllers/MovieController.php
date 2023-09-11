<?php

namespace App\Http\Controllers;

use App\Http\Requests\MovieRequest;
use App\Http\Resources\MovieResource;
use App\Models\Movie;
use Illuminate\Http\JsonResponse;

class MovieController extends Controller
{
    private const PER_PAGE = 25;

    public function index(): JsonResponse
    {
        $movies = Movie::query()->paginate(self::PER_PAGE);
        $collection = MovieResource::collection($movies);
        return response()->json([
            'data' => $collection,
            'currentPage' => $movies->currentPage(),
            'lastPage' => $movies->lastPage(),
        ]);
    }

    public function store(MovieRequest $request): JsonResponse
    {
        $movie = Movie::query()->create($request->validated());
        return response()->json($movie);
    }

    public function show(Movie $movie): JsonResponse
    {
        return response()->json($movie);
    }

    public function update(MovieRequest $request, Movie $movie): JsonResponse
    {
        $movie->update($request->validated());
        return response()->json($movie);
    }

    public function destroy(Movie $movie): JsonResponse
    {
        $movie->delete();
        return response()->json(true);
    }
}
