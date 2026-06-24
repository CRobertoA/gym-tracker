<?php

namespace App\Http\Controllers;

use App\Models\WorkoutSession;
use Illuminate\Http\Request;

class WorkoutSessionController extends Controller
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
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     */
    public function show(WorkoutSession $session)
    {
        //
        $session->load(
            'workout.exercises',
            'sets.exercise'
        );

        return view('sessions.show', compact('session'));
    }

    //metodo para finalizar la sesion de entrenamiento
    public function finish(WorkoutSession $session)
    {
        $session->update([
            'completed_at' => now()
        ]);

        return redirect()->route('workouts.index')->with('success', 'Entrenamiento completado con exito.');
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(WorkoutSession $workoutSession)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, WorkoutSession $workoutSession)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(WorkoutSession $workoutSession)
    {
        //
    }
}
