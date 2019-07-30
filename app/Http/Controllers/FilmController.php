<?php

namespace App\Http\Controllers;

namespace App\Http\Controllers;

use App\Service\OmdbServiceInterface;
use Illuminate\Http\Request;

class FilmController extends Controller
{
    private $omdbService;

    public function __construct(OmdbServiceInterface $omdbService)
    {
        $this->omdbService = $omdbService;
    }

    public function search(Request $request)
    {
      $user = Auth::user();
        dd($user);
        $this->validate($request, [
           'title' => 'required'
        ]);
        $title = $request->title;
        $filmEntity = $this->filmRepository->findFilmByTitle($title);
        if (!$filmEntity) {
            $film = $this->omdbService->find($title);
            if (empty($film) || (isset($film['Error']))) {
                return response()->json(
                    [
                        'message' => 'film not found'
                    ]
                );
            }
            $result = $this->filmRepository->addFilm($film);
        } else {
            unset($filmEntity->id);
            unset($filmEntity->created_at);
            unset($filmEntity->updated_at);
            $result = $filmEntity;
        }
        return response()->json($result);
    }
}
