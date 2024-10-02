<x-app-layout>
    <x-slot name="header">
        <div>
            <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
            Estadisticas de miembros
            </h2>
            <div class="back-link">
                <a href="{{ route('dashboard') }}" class="btn btn-primary btn-sm">&larr; Back</a>
            </div>
        </div>
    </x-slot>

    <div class="py-12 statistics-module">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white dark:bg-gray-800 overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 text-gray-900 dark:text-gray-100">

                <div style="width: 80%; margin: auto;" data-chart="{{ json_encode($data) }}" class="chart-container">
                <h3>Genero de los miembros</h3>
                        <canvas id="barChart"></canvas>
                    </div>

                    <div style="width: 80%; margin: auto;" data-chart="{{ json_encode($data) }}" class="chart-container2">
                    <h3>Edades de los miembros</h3>
                        <canvas id="doughnutChart"></canvas>
                    </div>
                 </div>
            </div>
        </div>
    </div>

</x-app-layout>