<?php

namespace App\Http\Controllers;

use App\Models\WorkoutSet;
use App\Models\WorkoutSession;
use Illuminate\Http\Request;

class WorkoutSetController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        //
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request, WorkoutSession $session)
    {
        //
        if($session->completed_at){
            return redirect()->back()->with('error','Esta sesión de entrenamiento ya fue finalizada.'
        );
        }

        $validated = $request->validate([
            'exercise_id' => 'required|exists:exercises,id',
            'weight' => 'nullable|numeric|min:0',
            'reps' => 'required|integer|min:1'
        ]);

        WorkoutSet::create([
            'workout_session_id' => $session->id,
            'exercise_id' => $validated['exercise_id'],
            'weight' => $validated['weight'],
            'reps' => $validated['reps']
        ]);

        return redirect()->route('sessions.show', $session);
    }

    /**
     * Display the specified resource.
     */
    public function show(WorkoutSet $workoutSet)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(WorkoutSet $workoutSet)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, WorkoutSet $workoutSet)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(WorkoutSet $workoutSet)
    {
        //
    }
}
