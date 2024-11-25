<?php
namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Event extends Model
{
    use HasFactory;

    protected $fillable = [
        'title',
        'level',
        'team_type',
        'max_teams',
        'event_type',
        'event_detail',
        'shuttle_type',
        'date',
        'location',
        'complete_results',
    ];

    public function teams()
    {
        return $this->belongsToMany(Team::class, 'team_events');
    }
}

