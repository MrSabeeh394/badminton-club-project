<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Team extends Model
{
    use HasFactory;

    protected $fillable = ['name'];

    public function players()
    {
        return $this->belongsToMany(Player::class, 'player_teams');
    }

    public function events()
    {
        return $this->belongsToMany(Event::class, 'team_events');
    }
}

