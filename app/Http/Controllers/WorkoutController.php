<?php

namespace App\Http\Controllers;

use App\Models\Workout;
use App\Models\Exercise;
use App\Models\WorkoutSession;
use Illuminate\Http\Request;

class WorkoutController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        //
        //$workouts = Workout::latest()->get();
        $workouts = Workout::with('exercises')->latest()->get();
        return view('workouts.index', compact('workouts'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
        $exercises = Exercise::orderBy('name')->get();
        return view('workouts.create', compact('exercises'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //
        $validated = $request->validate([
            'name' => 'required|max:255',
            'description' => 'nullable',
            'exercises' => 'array'
        ]);

        $workout = Workout::create([
            'name' => $validated['name'],
            'description' => $validated['description'] ?? null
        ]);

        $workout->exercises()->attach(
            $request->exercises ?? []
        );

        return redirect()->route('workouts.index')->with('success', 'Entrenamiento creado con exito.');
    }

    /**
     * Display the specified resource.
     */
    public function show(Workout $workout)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Workout $workout)
    {
        //
        $exercises = Exercise::orderBy('name')->get();

        return view('workouts.edit', compact('workout','exercises'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Workout $workout)
    {
        //
        $validated = $request->validate([
            'name' => 'required|max:255',
            'description' => 'nullable',
            'exercises' => 'array'
        ]);

        $workout->update([
            'name' => $validated['name'],
            'description' => $validated['description'] ?? null
        ]);

        $workout->exercises()->sync(
            $request->exercises ?? []
        );

        return redirect()->route('workouts.index')->with('success', 'Entrenamiento actualizado con exito.');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Workout $workout)
    {
        //
        $workout->delete();
        //opcionalmente se pone $workout->exercises()->detach(); para eliminar tambien las relaciones en la tabla pivote

        return redirect()->route('workouts.index')->with('success', 'Entrenamiento eliminado con exito.');
    }

    public function start(Workout $workout){
        $session = WorkoutSession::create([
            'workout_id' => $workout->id,
            'started_at' => now()
        ]);

        return redirect()->route('sessions.show', $session);
    }
}
