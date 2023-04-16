<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class TrainingSession extends Model
{
    use HasFactory;
    protected $table = 'training_sessions';

    protected $fillable = [
        'name',
        'description',
        'intensity',
        'distance',
        'day',
        'stroke_type',
        'start_time',
        'end_time',
        'squad_id',
    ];

    public function squad(): BelongsTo
    {
        return $this->belongsTo(Squad::class);
    }
}
