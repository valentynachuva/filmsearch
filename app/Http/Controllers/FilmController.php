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
        $this->validate($request, [
            'title' => 'required'
        ]);

        $film = $this->omdbService->find($request->title);
        if (empty($film)) {
            return response()->json(
                [
                    'message' => 'film not found'
                ]
            );
        }

        return response()->json($film);
    }
}
