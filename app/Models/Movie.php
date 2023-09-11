<?php

namespace App\Models;

use App\DTO\MovieDTO;
use Illuminate\Contracts\Pagination\LengthAwarePaginator;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;

class Movie extends Model
{
    use HasFactory;

    protected $table = "movies";

    protected $fillable = [
        'title', 'genre_id'
    ];

    public function genre(): BelongsTo
    {
        return $this->belongsTo(Genre::class);
    }

    public function actors(): BelongsToMany
    {
        return $this->belongsToMany(Actor::class, 'movie_actors', 'movie_id', 'actor_id');
    }

    public static function getListData(MovieDTO $movieDTO): LengthAwarePaginator
    {
        $query = Movie::query()
            ->when($movieDTO->getTitle(), function ($movie) use ($movieDTO) {
                $movie->where('title', 'like', '%' . $movieDTO->getTitle() . '%');
            })
            ->when($movieDTO->getTitleOrder(), function($movie)use ($movieDTO){
                $movie->orderBy('title', $movieDTO->getTitleOrder());
            })
            ->when($movieDTO->getGenreId(), function ($movie) use ($movieDTO) {
                $movie->where('genre_id', request()->genre_id);
            })
            ->when($movieDTO->getPage(), function ($movie) use ($movieDTO) {
                if ($movieDTO->getPage() > 0) {
                    $movie->offset($movieDTO->getPage() * MovieDTO::PER_PAGE);
                }
            });

        if ($movieDTO->getActorId()) {
            $query->whereHas('actors', function ($movie)use ($movieDTO) {
                if ($movieDTO) {
                    $movie->where('actors.id', '=', $movieDTO->getActorId());
                }
            });
        }

        return $query
            ->latest()
            ->paginate(MovieDTO::PER_PAGE);
    }
}
