<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
            Editar entrenamiento
        </h2>
    </x-slot>
    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white dark:bg-gray-800 overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 text-gray-900 dark:text-gray-300">
                    @if($errors->any())
                        <div class="bg-red-100 border border-red-400 text-red-700 p-4 mb-4 rounded">
                            <ul>
                                @foreach($errors->all() as $error)
                                    <li>{{ $error }}</li>
                                @endforeach
                            </ul>
                        </div>
                    @endif
                    <form action="{{ route('workouts.update', $workout, $exercises) }}" method="POST">
                        @csrf
                        @method('PUT')
                        <div class="mb-4">
                            <label class="block mb-2">
                                Nombre
                            </label>
                            <input type="text" name="name" value="{{ old('name', $workout->name) }}" class="w-full bg-gray-900 text-gray-300 
                                border rounded-md p-2" placeholder="Nombre del entrenamiento.">
                        </div>
                        <div class="mb-4">
                            <label class="block mb-2">
                                Descripción
                            </label>
                            <textarea name="description" class="w-full bg-gray-900 text-gray-300 border rounded-md p-2"
                                placeholder="Breve descripción." rows="4">{{ old('description', $workout->description) }}</textarea>
                        </div>
                        <label class="block mb-2">
                            Ejercicios
                        </label>
                        @foreach($exercises as $exercise)
                            <div class="mb-2">
                                <label class="text-white">
                                    <input type="checkbox" name="exercises[]" value="{{ $exercise->id }}"
                                    @checked($workout->exercises->contains($exercise->id))>
                                    {{ $exercise->name }}
                                </label>
                            </div>
                        @endforeach
                        <div class="flex gap-3">
                            <button type="submit" class="bg-blue-600 text-white px-5 py-2 rounded-lg">
                                Actualizar
                            </button>
                            <a href="{{ route('workouts.index') }}" class="bg-gray-500 text-white px-5 py-2 rounded-lg">
                                Cancelar
                            </a>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>