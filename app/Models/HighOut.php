<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasOne;

class HighOut extends Model
{
    use HasFactory;

    public function game(): HasOne
    {
        return $this->hasOne(Game::class);
    }
}
