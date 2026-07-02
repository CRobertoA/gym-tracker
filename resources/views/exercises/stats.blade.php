<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
            Estadisticas de {{ $exercise->name }}
        </h2>
    </x-slot>
    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white dark:bg-gray-800 overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 text-gray-900 dark:text-gray-300">
                    <div class="grid grid-cols-2 md:grid-cols-4 gap-6">
                        <div>
                            <h3 class="text-gray-400">
                                Mejor peso
                            </h3>
                            <p class="text-gray-100 text-xl">
                                {{ $bestWeight ?? 0 }} Kg
                            </p>
                        </div>
                        <div>
                            <h3 class="text-gray-400">
                                Total sets
                            </h3>
                            <p class="text-gray-100 text-xl">
                                {{ $totalSets ?? 0 }}
                            </p>
                        </div>
                        <div>
                            <h3 class="text-gray-400">
                                Repeticiones promedio
                            </h3>
                            <p class="text-gray-100 text-xl">
                                {{ $averageReps ?? 0 }}
                            </p>
                        </div>
                        <div>
                            <h3 class="text-gray-400">
                                Ultimo set
                            </h3>
                            <p class="text-gray-100 text-lg">
                                @if($lastSet)
                                    {{ $lastSet->weight }} Kg x {{ $lastSet->reps }} reps
                                @else
                                    -
                                @endif
                            </p>
                        </div>
                    </div>
                    <div class="mt-8">
                        <canvas id="progressChart"></canvas>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
    <script>
        const chartData = @json($chartData);
        console.log(chartData);

        const labels = chartData.map(
            item => item.date
        );

        const weights = chartData.map(
            item => item.weight
        );
        console.log(labels);


        new Chart(
            document.getElementById('progressChart'),
            {
                //type: 'bar',
                type: 'line',
                data:{
                    labels,
                    datasets: [{
                        label: 'Peso (Kg)',
                        data: weights,
                        tension: 0.3
                    }]
                }
            }
        );
    </script>
</x-app-layout>