<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-3xl text-white leading-tight">
            {{ __('Géneros musicales') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 text-xl text-gray-600">
                    {{ __("Visualización de la popularidad de los diferentes géneros musicales utilizados en el sintetizador. 
                    El gráfico destaca qué géneros son más frecuentes entre los usuarios, ayudando a entender las preferencias 
                    musicales y a orientar futuras mejoras o adiciones de características en el sintetizador.") }}
                </div>
            </div>
        </div>
    </div>

    <!-- Contenedor Flexbox para el gráfico y el recuadro -->
    <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg" style="display: flex; justify-content: space-between; padding: 30px; margin: 0 auto; width: 1215px;">
        <!-- Gráfico -->
        <div style="flex: 1; display: flex; justify-content: center; align-items: center;">
            <canvas id="myChart" style="width: 100%; height: 100%;"></canvas>
        </div>

        <!-- Recuadro con los porcentajes -->
        <div style="flex: 0 0 300px; padding: 20px;">
            <h3 class="text-2xl font-semibold mb-4">{{ __('Porcentajes de uso por género musical') }}</h3>
            <ul>
                @foreach ($labels as $index => $label)
                    <li class="mb-2">
                        <span class="font-bold text-xl">{{ $label }}:</span> {{ $percentages[$label] ?? '0' }}%
                    </li>
                @endforeach
            </ul>
        </div>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
    <script>
        const ctx = document.getElementById('myChart').getContext('2d');

        // Convierte las variables PHP a formato JavaScript
        const labels = @json($labels);
        const data = @json($data);

        // Define un array de colores para cada segmento
        const barColors = [
            'rgba(0, 255, 255, 0.2)',   /* Cian neón */
            'rgba(255, 20, 147, 0.3)',  /* Rosa neón */
            'rgba(0, 255, 0, 0.5)',      /* Verde neón */
            'rgba(41, 128, 185, 0.5)',  /* Azul medianoche */
            'rgba(255, 0, 0, 0.5)',      /* Rojo neón */
            'rgba(52, 73, 94, 0.6)',    /* Gris oscuro */
            'rgba(241, 196, 15, 0.6)',  /* Amarillo intenso */
            'rgba(52, 152, 219, 0.6)',  /* Azul brillante */
            'rgba(255, 87, 34, 0.6)',   /* Rojo anaranjado */
            'rgba(92, 184, 92, 0.6)',    /* Verde pasto */
            'rgba(243, 156, 18, 0.6)',  /* Amarillo dorado */
            'rgba(46, 204, 113, 0.6)',  /* Verde esmeralda */
            'rgba(231, 76, 60, 0.6)',   /* Rojo claro */
            'rgba(155, 89, 182, 0.6)',  /* Púrpura claro */
            'rgba(249, 231, 159, 0.6)', /* Amarillo pálido */
            'rgba(26, 188, 156, 0.6)',  /* Verde turquesa */
            'rgba(204, 204, 255, 0.6)', /* Azul claro */
            'rgba(241, 90, 34, 0.6)',   /* Naranja vibrante */
            'rgba(52, 73, 94, 0.6)',    /* Gris oscuro */
            'rgba(142, 68, 173, 0.6)'   /* Púrpura oscuro */
        ];

        new Chart(ctx, {
            type: 'pie',
            data: {
                labels: labels,
                datasets: [{
                    label: 'Gráfica de géneros',
                    data: data,
                    backgroundColor: barColors,
                }]
            },
            options: {
                responsive: true,
                plugins: {
                    legend: {
                        position: 'top',
                    },
                    tooltip: {
                        callbacks: {
                            label: function(tooltipItem) {
                                const dataset = tooltipItem.dataset;
                                const total = dataset.data.reduce((acc, value) => acc + value, 0);
                                const currentValue = dataset.data[tooltipItem.dataIndex];
                                const percentage = ((currentValue / total) * 100).toFixed(2);
                                return `${tooltipItem.label}: ${percentage}%`;
                            }
                        }
                    }
                }
            }
        });
    </script>
</x-app-layout>
