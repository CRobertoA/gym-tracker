<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class WorkoutSession extends Model
{
    //
    protected $fillable = [
        'workout_id',
        'started_at',
        'completed_at'
    ];

    public function workout(){
        return $this->belongsTo(Workout::class);
    }

    public function sets(){
        return $this->hasMany(WorkoutSet::class);
    }
}
