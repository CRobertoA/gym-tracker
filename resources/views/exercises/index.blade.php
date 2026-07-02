<!DOCTYPE html>
<html lang="en">
    <x-app-layout>
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>Exercises</title>
        @vite(['resources/css/app.css', 'resources/js/app.js'])
    </head>
    <body class="bg-gray-100 min-h-screen">
        <x-slot name="header">
            <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
                {{ __('Ejercicios') }}
            </h2>
        </x-slot>
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8 py-12">
            <div class="bg-white dark:bg-gray-800 overflow-hidden shadow-sm sm:rounded-lg">
                <div class="flex justify-between p-6 text-gray-900 dark:text-gray-100">
                    <h1 class="text-2xl font-bold">Ejercicios</h1>

                    <a  href="{{ route('exercises.create') }}"
                        class="bg-blue-600 text-white px-4 py-2 rounded-lg hover:bg-blue-700">Nuevo ejercicio
                    </a>
                </div>
                @if(session('success'))
                    <div class="bg-green-200 border border-green-400 text-green-700 p-4 rounded mb-4">
                        {{ session('success') }}
                    </div>
                @endif
                <div class="mx-4 bg-white dark:bg-gray-800 rounded-lg shadow">
                    @if($exercises->count())
                        <table class="w-full text-gray-300">
                            <thead class="bg-gray-800 text-gray-100 uppercase">
                                <tr class="border-b">
                                    <th class="text-left p-4">
                                        Nombre
                                    </th>
                                    <th class="text-left p-4">
                                        Descripción
                                    </th>
                                    <th class="text-left p-4">
                                        Acciones
                                    </th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach($exercises as $exercise)
                                <tr class="border-b hover:bg-gray-900">
                                    <td class="p-4">
                                        {{$exercise->name}}
                                    </td>
                                    <td class="p-4">
                                        {{$exercise->description}}
                                    </td>
                                    <td class="p-4 ">
                                        <a href="{{ route('exercises.edit', $exercise) }}"
                                            class="text-blue-500 hover:text-blue-700 mr-4">
                                            Editar
                                        </a>  
                                        <a href="{{ route('exercises.stats', $exercise) }}"
                                            class="text-green-500 hover:text-green-700 mr-4">
                                            Stats
                                        </a>  
                                        <form action="{{ route('exercises.destroy', $exercise) }}"
                                                method="POST" class="inline">
                                            @csrf
                                            @method('DELETE')

                                            <button type="submit" class="text-red-500 hover:text-red-700" onclick="return confirm('¿Eliminar ejercicio?')">
                                                Eliminar
                                            </button>
                                        </form>
                                    </td>
                                </tr>
                                @endforeach
                            </tbody>
                        </table>
                    @else
                        <div class="p-6 text-center text-gray-400">
                            Ningun ejercicio registrado todavia
                        </div>
                    @endif
                </div>
            </div>
        </div>
    </body>
    </x-app-layout>
</html>