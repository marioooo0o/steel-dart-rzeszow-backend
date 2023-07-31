<?php

namespace App\Http\Resources;

use App\Models\League;
use App\Models\Player;
use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;

class GameResource extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @return array<string, mixed>
     */
    public function toArray(Request $request): array
    {
        return [
            'id' => $this->id,
            'player_one' => new PlayerResource($this->whenLoaded('player_one')),
            'player_two' => new PlayerResource($this->whenLoaded('player_two')),
            'player_one_score' => $this->player_one_score,
            'player_two_score' => $this->player_two_score,
            'player_one_avg' => $this->player_one_avg,
            'player_two_avg' => $this->player_two_avg,
            'player_one_max_amount' => $this->player_one_max_amount,
            'player_two_max_amount' => $this->player_two_max_amount,
            'league' => new LeagueResource($this->whenLoaded('league')),
            'winner' => $this->winner
        ];
    }
}
