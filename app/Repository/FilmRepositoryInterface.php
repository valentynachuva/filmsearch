<?php


namespace App\Repository;
use \App\Films;

interface FilmRepositoryInterface
{
    /**
     * Ищет фильм по заголовку в БД
     *
     * @param string $title
     * @return Films|null
     */
    public function findFilmByTitle(string $title): ?Films;
    /**
     * Добавляет фильм в БД
     *
     * @param array $data
     * @return int
     */
    public function addFilm(array $data): int;
}