<?php

use App\Http\Controllers\ProfileController;
use App\Http\Controllers\ExerciseController;
use App\Http\Controllers\WorkoutController;
use Illuminate\Support\Facades\Route;
use App\Models\Exercise;

Route::get('/', function () {
    return view('welcome');
});

Route::get('/dashboard', function () {
    $exerciseCount = Exercise::count();
    $latestExercise = Exercise::latest()->take(5)->get();
    return view('dashboard', compact('exerciseCount', 'latestExercise'));
})->middleware(['auth', 'verified'])->name('dashboard');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');

    Route::resource('exercises', ExerciseController::class);
    Route::resource('workouts', WorkoutController::class);
});

require __DIR__.'/auth.php';
