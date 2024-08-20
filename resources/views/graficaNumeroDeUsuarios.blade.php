<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-3xl text-white leading-tight">
            {{ __('Cantidad de usuarios activos') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 text-xl text-gray-600">
                    {{ __("Este gráfico muestra el número total de usuarios registrados en 
                    la aplicación a lo largo del tiempo. Permite observar tendencias de crecimiento, 
                    identificar picos de actividad y evaluar el impacto de campañas de marketing o actualizaciones de la aplicación.") }}
                </div>
            </div>
        </div>
    </div>

    <div class="flex justify-center items-start gap-6 ">
        <!-- Recuadro con el número total de usuarios -->
        <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg p-6" style="width: 200px;">
            <h3 class="text-xl font-semibold text-gray-700 mb-4">Número de Usuarios</h3>
            <p class="text-3xl font-bold text-blue-700">{{ $totalUsuarios }}</p> <!-- Muestra el número total de usuarios -->
        </div>

        <!-- Gráfica -->
        <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg" style=" width: 1000px; padding: 30px; ">
            <canvas id="myChart"></canvas>
            <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
            <script>
                const ctx = document.getElementById('myChart').getContext('2d');

                // Convierte las variables PHP a formato JavaScript
                const labels = @json($labels);
                const data = @json($data);

                // Define un array de colores para cada barra
                const barColors = [
                            'rgba(243, 156, 18, 0.6)',  /* Amarillo dorado */
                            'rgba(46, 204, 113, 0.6)',  /* Verde esmeralda */
                            'rgba(52, 152, 219, 0.6)',  /* Azul brillante */
                            'rgba(231, 76, 60, 0.6)',   /* Rojo claro */
                            'rgba(155, 89, 182, 0.6)',  /* Púrpura claro */
                            'rgba(41, 128, 185, 0.6)',  /* Azul medianoche */
                            'rgba(249, 231, 159, 0.6)', /* Amarillo pálido */
                            'rgba(26, 188, 156, 0.6)',  /* Verde turquesa */
                            'rgba(241, 196, 15, 0.6)',  /* Amarillo intenso */
                            'rgba(241, 90, 34, 0.6)',   /* Naranja vibrante */
                            'rgba(52, 73, 94, 0.6)',    /* Gris oscuro */
                            'rgba(142, 68, 173, 0.6)',  /* Púrpura oscuro */
                            'rgba(204, 204, 255, 0.6)', /* Azul claro */
                            'rgba(255, 87, 34, 0.6)',   /* Rojo anaranjado */
                            'rgba(92, 184, 92, 0.6)'    /* Verde pasto */
                ];

                new Chart(ctx, {
                    type: 'line',
                    data: {
                        labels: labels,
                        datasets: [{
                            label: 'Gráfica número de usuarios',
                            data: data,
                            backgroundColor: barColors, 
                            pointRadius: 10
                        }]
                    },
                    options: {
                        scales: {
                            y: {
                                title: {
                                    display: true,
                                    text: 'Número de usuarios'
                                },
                                beginAtZero: true,
                                ticks: {
                                    callback: function(value, index, values) {
                                        return Number.isInteger(value) ? value : '';
                                    }
                                }
                            },
                            x: {
                                title: {
                                    display: true,
                                    text: 'Año y mes de registro'
                                },
                                beginAtZero: true
                            }
                        }
                    }
                });
            </script>
        </div>
    </div>
</x-app-layout>
