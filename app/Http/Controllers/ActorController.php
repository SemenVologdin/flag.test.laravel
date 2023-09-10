<?php

namespace App\Http\Controllers;

use App\Http\Requests\ActorRequest;
use App\Http\Resources\ActorResource;
use App\Models\Actor;
use Illuminate\Http\JsonResponse;

class ActorController extends Controller
{
    private const PER_PAGE = 25;

    public function index(): JsonResponse
    {
        $actors = Actor::query()->paginate(self::PER_PAGE);
        $collection = ActorResource::collection($actors);
        return response()->json([
            'data' => $collection,
            'currentPage' => $actors->currentPage(),
            'lastPage' => $actors->lastPage(),
        ]);
    }

    public function store(ActorRequest $request): JsonResponse
    {
        $actor = Actor::query()->create($request->validated());
        return response()->json($actor);
    }

    public function show(Actor $actor): JsonResponse
    {
        return response()->json($actor);
    }

    public function update(ActorRequest $request, Actor $actor): JsonResponse
    {
        $actor->update($request->validated());
        return response()->json($actor);
    }

    public function destroy(Actor $actor): JsonResponse
    {
        $actor->delete();
        return response()->json(true);
    }
}
