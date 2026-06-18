<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;

class Workout extends Model
{
    //
    protected $fillable = [
        'name',
        'description'
    ];

    public function exercises(): BelongsToMany{
        return $this->belongsToMany(Exercise::class);
    }
}
