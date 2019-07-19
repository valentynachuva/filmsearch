<?php


namespace App\Repository;



use App\films;

class FilmRepository implements FilmRepositoryInterface

{
    /**
     * 
     * @var Films
     */
    private $model;
    public function __construct()
    {
        $this->model = app(\App\films::class);
    }
            
    public function findFilmByTitle(string $title): ?films
    {
        $film= $this->model->whereLike('title',$title)->first();
        return $film;
    }

    public function addFilm(array $data): int
    {
        // TODO: Implement addFilm() method.
    }

}
