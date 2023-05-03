<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class GalaEvent extends Model
{
    use HasFactory;

    protected $fillable = [
        'name',
        'description',
        'location',
        'date',
        'start_time',
        'end_time',
    ];


    protected $table = 'gala_events';

    function results()
    {
        return $this->hasMany(Result::class, 'gala_id');
    }
}
