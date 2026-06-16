<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
            {{ __('Dashboard') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white dark:bg-gray-800 overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 text-gray-900 dark:text-gray-100">
                    <h3 class="text-gray-400 text-l">
                        Ejercicios totales
                    </h3>
                    <p class="text-3xl font-bold text.white mt-2">
                        {{ $exerciseCount }}
                    </p>
                </div>
                <div class="p-6 text-gray-900 dark:text-gray-100">
                    <h3 class="text-gray-400 text-l">
                        Acciones rapidas
                    </h3>
                    <div class="mt-4">
                        <a href="{{ route('exercises.index') }}" class="bg-blue-600 px-4 py-2 rounded text-white">
                            Administrar ejercicios
                        </a>
                    </div>
                </div>
                <div class="p-6 text-gray-900 dark:text-gray-100">
                    <h3 class="text-gray-400 text-l">
                        Ejercicios recientes
                    </h3>
                    @forelse($latestExercise as $exercise)
                        <div class="border-b border-gray-700 py-3">
                            <h4 class="text-white">
                                {{ $exercise->name }}
                            </h4>
                            <p class="text-gray-400">
                                {{ $exercise->description }}
                            </p>
                        </div>
                    @empty
                        <p class="text-gray-400">
                            No hay ejercicios registrados todavía
                        </p>
                    @endforelse
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
