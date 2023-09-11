<?php

namespace App\DTO;

class MovieDTO
{
    private string $title = '';
    private string $titleOrder = '';
    private int $genre_id = 0;
    private int $actorId = 0;
    private int $page = 0;
    public const PER_PAGE = 25;

    /**
     * @return string
     */
    public function getTitle(): string
    {
        return $this->title;
    }

    /**
     * @param string $title
     * @return MovieDTO
     */
    public function setTitle(string $title): MovieDTO
    {
        $this->title = $title;
        return $this;
    }

    /**
     * @return int
     */
    public function getGenreId(): int
    {
        return $this->genre_id;
    }

    /**
     * @param int $genre_id
     * @return MovieDTO
     */
    public function setGenreId(int $genre_id): MovieDTO
    {
        $this->genre_id = $genre_id;
        return $this;
    }

    /**
     * @return int
     */
    public function getActorId(): int
    {
        return $this->actorId;
    }

    /**
     * @param int $actorId
     * @return MovieDTO
     */
    public function setActorId(int $actorId): MovieDTO
    {
        $this->actorId = $actorId;
        return $this;
    }

    /**
     * @return int
     */
    public function getPage(): int
    {
        return $this->page;
    }

    /**
     * @param int $page
     * @return MovieDTO
     */
    public function setPage(int $page): MovieDTO
    {
        $this->page = $page;
        return $this;
    }

    /**
     * @return string
     */
    public function getTitleOrder(): string
    {
        return $this->titleOrder;
    }

    /**
     * @param string $titleSort
     * @return MovieDTO
     */
    public function setTitleOrder(string $titleSort): MovieDTO
    {
        $this->titleOrder = $titleSort;
        return $this;
    }
}
