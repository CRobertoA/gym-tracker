<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class WorkoutSet extends Model
{
    //
    protected $fillable = [
        'workout_session_id',
        'exercise_id',
        'weight',
        'reps'
    ];

    public function session(){
        return $this->belongsTo(WorkoutSession::class,
        'workout_session_id',
        'id');
    }

    public function exercise(){
        return $this->belongsTo(Exercise::class);
    }
}
