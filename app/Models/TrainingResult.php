<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class TrainingResult extends Model
{
    use HasFactory;

    protected $fillable = [
        'remark',
        'time_in_seconds',
        'training_date',
        'distance',
        'intensity',
        'stroke_type',
    ];
}
