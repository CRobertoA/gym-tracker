<?php

namespace App\Http\Controllers;

use App\Models\Exercise;
use Illuminate\Http\Request;

class ExerciseController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        //
        $exercises = Exercise::all();
        return view('exercises.index', compact('exercises'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
        return view('exercises.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //
        $validated = $request->validate([
            'name' => 'required|max:255',
            'description' => 'nullable'
        ]);
        Exercise::create($validated);

        return redirect()->route('exercises.index')->with('success', 'Ejercicio creado con exito.');
    }

    /**
     * Display the specified resource.
     */
    public function show(Exercise $exercise)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Exercise $exercise)
    {
        //
        return view('exercises.edit', compact('exercise'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Exercise $exercise)
    {
        //
        $validated = $request->validate([
            'name' => 'required|max:255',
            'description' => 'nullable'
        ]);
        $exercise->update($validated);

        return redirect()->route('exercises.index')->with('success', 'Ejercicio actualizado con exito.');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Exercise $exercise)
    {
        //
        $exercise->delete();

        return redirect()->route('exercises.index')->with('success', 'Ejercicio eliminado con exito.');
    }
}
