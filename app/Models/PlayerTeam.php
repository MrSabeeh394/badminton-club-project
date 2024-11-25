<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class PlayerTeam extends Model
{
    protected $fillable = [
        'player_id',
        'team_id',
    ];
}
