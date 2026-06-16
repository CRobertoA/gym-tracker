<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
            Crear ejercicio
        </h2>
    </x-slot>
    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white shadow-sm rounded-lg p-6">
                <h1 class="text-2xl font-bold mb-6">
                    Nuevos ejercicios
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
                <form action="{{ route('exercises.store') }}" method="POST">
                    @csrf
                    <div class="mb-4">
                        <label class="block mb-2">
                            Nombre
                        </label>
                        <input type="text" name="name" value="{{ old('name') }}" class="w-full border rounded-lg p-3">
                    </div>
                    <div class="mb-4">
                        <label class="block mb-2">
                            Descripción
                        </label>
                        <textarea name="description" class="w-full border rounded-lg p-3"
                            rows="4">{{ old('description') }}</textarea>
                    </div>
                    <div class="flex gap-3">
                        <button type="submit" class="bg-blue-600 text-white px-5 py-2 rounded-lg">
                            Guardar
                        </button>
                        <a href="{{ route('exercises.index') }}" class="bg-gray-500 text-white px-5 py-2 rounded-lg">
                            Cancelar
                        </a>
                    </div>
                </form>
            </div>
        </div>
    </div>
</x-app-layout>