<?php

namespace App\Http\Controllers;

use App\Http\Requests\GenreRequest;
use App\Http\Resources\GenreResource;
use App\Models\Genre;
use Illuminate\Http\JsonResponse;

class GenreController extends Controller
{
    private const PER_PAGE = 25;

    public function index(): JsonResponse
    {
        $genres = Genre::query()->paginate(self::PER_PAGE);
        $collection = GenreResource::collection($genres);

        return response()->json([
            'data' => $collection,
            'currentPage' => $genres->currentPage(),
            'lastPage' => $genres->lastPage(),
        ]);
    }

    public function store(GenreRequest $request): JsonResponse
    {
        $actor = Genre::query()->create($request->validated());
        return response()->json($actor);
    }

    public function show(Genre $actor): JsonResponse
    {
        return response()->json($actor);
    }

    public function update(GenreRequest $request, Genre $genre): JsonResponse
    {
        $genre->update($request->validated());
        return response()->json($genre);
    }

    public function destroy(Genre $genre): JsonResponse
    {
        $genre->delete();
        return response()->json(true);
    }
}
