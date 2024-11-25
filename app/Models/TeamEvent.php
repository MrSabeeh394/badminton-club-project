<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class TeamEvent extends Model
{
    protected $fillable = [
        'team_id',
        'event_id',
    ];
}
