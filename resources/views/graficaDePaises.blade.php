<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-3xl text-white leading-tight">
            {{ __('Distribución geográfica') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 text-xl text-gray-600">
                    {{ __("Este gráfico ilustra la distribución geográfica de los usuarios de la aplicación. 
                    Ayuda a entender la penetración en diferentes regiones, siendo útil para planificar estrategias de localización o marketing regionales.") }}

                    
                </div>
            </div>
        </div>
    </div>
    <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg" style="width: 1200px; height: 500px; padding: 20px; margin: 0 auto;">
        <canvas class="bg-white overflow-hidden shadow-sm sm:rounded-lg" style=" width: 1100px; height: 450px;margin: 0 auto;" id="myChart"></canvas>
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
                            type: 'bar',
                            data: {
                                labels: labels,
                                datasets: [{
                                    label: 'Gráfica de países',
                                    data: data,
                                    backgroundColor: barColors, //colores
                                    borderColor: 'rgba(245, 139, 43, 1)',
                                    //border: 1
                                }]
                            },
                            options: {
                                scales: {
                                    y: {
                                        title: {
                                                    display: true,
                                                    text: 'Número de paises'
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
                                                    text: 'Países'
                                                },
                                        beginAtZero: true
                                    }
                                }
                            }
                        });

                    </script>
    </div>
</x-app-layout>
