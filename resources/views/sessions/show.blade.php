<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
            Sesión de entrenamiento
        </h2>
    </x-slot>
    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white dark:bg-gray-800 overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 text-gray-900 dark:text-gray-300">
                    <h3 class="text-2xl text-gray-200 font-bold">
                        {{ $session->workout->name }}
                    </h3>
                    <p class="text-gray-400">
                        Inicio: {{ $session->started_at }}
                    </p>
                    @if($session->completed_at)
                        <p class="text-gray-400">
                            Completado: {{ $session->completed_at }}
                        </p>
                    @else
                        <p class="text-gray-400">
                            Entrenamiento en proceso
                        </p>
                    @endif
                    <hr class="my-5 border-gray-400">
                    <div class="flex justify-between">
                        <h4 class="text-gray-100 text-xl mb-4">
                            Ejercicios
                        </h4>
                        @if(!$session->completed_at)
                            <form action="{{ route('sessions.finish', $session) }}" method="POST" class="mb-4">
                                @csrf
                                @method('PATCH')

                                <button class="bg-red-600 hover:bg-red-700 text-white px-4 py-2 rounded">
                                    Finalizar entrenamiento
                                </button>
                            </form>
                        @endif
                    </div>
                    @foreach($session->workout->exercises as $exercise)
                        <div class="border border-gray-700 rounded p-4 mb-4">
                            <h5 class="text-lg font-semibold text-gray-300">
                                {{ $exercise->name }}
                            </h5>
                            <p class="text-gray-400">
                                {{ $exercise->description }}
                            </p>
                            @if(!$session->completed_at)
                                <form action="{{ route('sets.store', $session) }}" method="POST" class="mt-4">
                                    @csrf 
                                    <input type="hidden" name="exercise_id" value="{{ $exercise->id }}">
                                    <div class="grid grid-cols-2 gap-4">
                                        <div>
                                            <label class="block text-gray-300 mb-1">
                                                Peso (Kg)
                                            </label>
                                            
                                            <input type="number" name="weight" 
                                                class="w-full rounded border-gray-600 bg-gray-700 text-gray-100" required>
                                        </div>
                                        <div>
                                            <label class="block text-gray-300 mb-1">
                                                Repeticiones
                                            </label>

                                            <input type="number" name="reps" 
                                                class="w-full rounded border-gray-600 bg-gray-700 text-gray-100" required>
                                        </div>
                                    </div>
                                    <button type="submit" class="mt-3 bg-green-600 hover:bg-green-700 text-gray-100 
                                        px-4 py-2 rounded">
                                        Agregar set
                                    </button>
                                </form>
                            @endif
                            @if($session->sets->where('exercise_id', $exercise->id)->count())
                                <div class="mt-4">
                                    <h6 class="text-gray-200 font-semibold mb-2">
                                        Sets completados
                                    </h6>
                                    @foreach($session->sets->where('exercise_id', $exercise->id) as $set)
                                        <div class="text-gray-300 text-sm mb-1">
                                            {{ $set->weight }} Kg x {{ $set->reps }} reps
                                        </div>
                                    @endforeach
                                </div>
                            @endif
                        </div>
                    @endforeach
                </div>
            </div>
        </div>
    </div>
</x-app-layout>