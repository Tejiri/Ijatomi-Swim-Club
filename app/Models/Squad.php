<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Squad extends Model
{
    use HasFactory;

    protected $fillable = [
        'minimum_age',
        'maximum_age',
        'name',
        'description'
    ];

    // function users()
    // {
    //     return $this->belongsToMany(User::class, 'squad_user',  'squad_id', 'user_id');
    // }

    function users()
    {
        return $this->hasMany(User::class, 'squad_id');
    }

    function trainingSessions()
    {
        return $this->hasMany(TrainingSession::class, 'squad_id');
    }
}
