<?php

namespace App\Http\Controllers;

use App\Http\Requests\GameStoreRequest;
use App\Http\Requests\GameUpdateRequest;
use App\Http\Resources\GameCollection;
use App\Http\Resources\GameResource;
use App\Models\Game;
use App\Services\GameService;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;

class GameController extends BaseController
{
    public function __construct(private GameService $gameService)
    {
    }
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        return $this->sendResponse(new GameCollection(Game::with(['player_one', 'player_two', 'league'])), "Games retrieved successfully");
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(GameStoreRequest $request)
    {
        $game = $this->gameService->store($request->validated());

        return $this->sendResponse(new GameResource($game->loadMissing(['player_one', 'player_two', 'league'])), "Game successfully created", Response::HTTP_CREATED);
    }

    /**
     * Display the specified resource.
     */
    public function show(Game $game)
    {
        return $this->sendResponse(new GameResource($game->loadMissing(['player_one', 'player_two', 'league'])), "Game retrieved successfully");
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(GameUpdateRequest $request, Game $game)
    {
        $game = $this->gameService->update($game, $request->validated());

        return $this->sendResponse(new GameResource($game->loadMissing(['player_one', 'player_two', 'league'])), "Game updated successfully");
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Game $game)
    {
        if ($game->delete()) {
            return $this->sendResponse([], "Game deleted successfully", Response::HTTP_NO_CONTENT);
        } else {
            return $this->sendError($game->id, "Something went wrong", Response::HTTP_BAD_REQUEST);
        }
    }
}
