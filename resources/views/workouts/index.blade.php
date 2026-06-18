<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
            Entrenamientos
        </h2>
    </x-slot>
    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white dark:bg-gray-800 overflow-hidden shadow-sm sm:rounded-lg">
                <div class="flex justify-between p-6 text-gray-900 dark:text-gray-300">
                    <h1 class="text-2xl font-bold">Entrenamientos</h1>

                    <a  href="{{ route('workouts.create') }}"
                        class="bg-blue-600 text-white px-4 py-2 rounded-lg hover:bg-blue-700">Nuevo entrenamiento
                    </a>
                </div>
                @if(session('success'))
                    <div class="bg-green-200 border border-green-400 text-green-700 p-4 rounded mb-4">
                        {{ session('success') }}
                    </div>
                @endif
                @forelse($workouts as $workout) 
                    <div class="mx-4 border-b border-gray-700 py-4">
                        <h4 class="text-white font-semibold">
                            {{ $workout->name }}
                        </h4>
                        <p class="text-gray-400">
                            {{ $workout->description }}
                        </p>
                        <div class="mt-2">
                            @foreach($workout->exercises as $exercise)
                                <span class="inline-block bg-purple-600 text-white text-sm px-2 py-1 rounded mr-2 mb-2">
                                    {{ $exercise->name }}
                                </span>
                            @endforeach
                        </div>
                        <a href="{{ route('workouts.edit', $workout) }}" class="text-blue-500 hover:text-blue-700">
                            Editar
                        </a>
                        <form action="{{ route('workouts.destroy', $workout) }}"
                                method="POST" class="inline">
                            @csrf
                            @method('DELETE')

                            <button type="submit" class="mx-3 text-red-500 hover:text-red-700" onclick="return confirm('¿Eliminar entrenamiento?')">
                                Eliminar
                            </button>
                        </form>
                    </div>
                @empty
                    <div class="mx-4 border-b border-gray-700 py-4">
                        <p class="text-gray-400">
                            Sin entrenamientos todavia.
                        </p>
                    </div>
                @endforelse
            </div>
        </div>
    </div>
</x-app-layout>