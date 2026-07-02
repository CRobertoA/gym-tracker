<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-200">
            Historial de entrenamiento
        </h2>
    </x-slot>
    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white dark:bg-gray-800 overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 text-gray-900 dark:text-gray-300">
                    @forelse($sessions as $session)
                        <div class="border-b border-gray-700 py-4">
                            <div class="flex justify-between items-center">
                                <div>
                                    <h3 class="text-gray-300 text-lg font-bold">
                                        {{ $session->workout->name }}
                                    </h3>
                                    <p class="text-gray-400 text-sm">
                                        {{ $session->started_at }}
                                    </p>
                                </div>
                                <div class="text-right">
                                    <p class="text-blue-400">
                                        {{ $session->sets_count }} sets
                                    </p>
                                    @if($session->completed_at)
                                        <p class="text-green-400">
                                            Completado
                                        </p>
                                    @else
                                        <p class="text-yellow-400">
                                            En preceso
                                        </p>
                                    @endif
                                </div>
                            </div>
                            <a href="{{ route('sessions.show', $session) }}" 
                                class="text-blue-500 hover:text-blue-700">
                                Ver detalles
                            </a>
                        </div>
                    @empty
                        <p class="text-gray-400">
                            No se encontro ninguna sesión de entrenamiento.
                        </p>
                    @endforelse
                </div>
            </div>
        </div>
    </div>
</x-app-layout>