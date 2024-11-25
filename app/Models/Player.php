<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Player extends Model
{
    use HasFactory;

    protected $fillable = [
        'first_name',
        'surname',
        'preferred_name',
        'year_of_birth',
        'email',
        'contact_number',
        'picture',
        'registered_with_badminton_england',
        'registration_number',
    ];
    protected $casts = [
        'created_at' => 'datetime',
        'updated_at' => 'datetime',
        'date_of_birth' => 'datetime',
    ];

    public function teams()
    {
        return $this->belongsToMany(Team::class, 'player_teams');
    }
}
