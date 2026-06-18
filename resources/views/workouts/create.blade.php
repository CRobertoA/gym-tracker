<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
            Crear entrenamiento
        </h2>
    </x-slot>
    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white dark:bg-gray-800 overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 text-gray-900 dark:text-gray-300">
                    <h1 class="text-2xl font-bold mb-6">
                        Nuevo entrenamiento
                    </h1>
                    @if($errors->any())
                        <div class="bg-red-100 border border-red-400 text-red-700 p-4 mb-4 rounded">
                            <ul>
                                @foreach($errors->all() as $error)
                                    <li>{{ $error }}</li>
                                @endforeach
                            </ul>
                        </div>
                    @endif
                    <form action="{{ route('workouts.store') }}" method="POST">
                        @csrf
                        <div class="mb-4">
                            <label class="block mb-2">
                                Nombre
                            </label>
                            <input type="text" name="name" value="{{ old('name') }}" class="w-full bg-gray-900 text-gray-300 
                                border rounded-md p-2" placeholder="Nombre del entrenamiento.">
                            <!--<x-text-input type="text" name="name" class="w-full" />-->
                        </div>
                        <div class="mb-4">
                            <label class="block mb-2">
                                Descripción
                            </label>
                            <textarea name="description" class="w-full bg-gray-900 text-gray-300 border rounded-md p-2"
                                placeholder="Breve descripción." rows="4">{{ old('description') }}</textarea>
                        </div>
                        <label class="block mb-2">
                            Ejercicios
                        </label>
                        @foreach($exercises as $exercise)
                            <div class="mb-2">
                                <label class="text-white">
                                    <input type="checkbox" name="exercises[]" value="{{ $exercise->id }}">
                                    {{ $exercise->name }}
                                </label>
                            </div>
                        @endforeach
                        <div class="flex gap-3 py-6">
                            <button type="submit" class="bg-blue-600 text-white px-5 py-2 rounded-lg">
                                Guardar
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