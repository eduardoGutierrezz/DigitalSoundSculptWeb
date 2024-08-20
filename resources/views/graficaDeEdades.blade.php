<x-app-layout >
    <x-slot name="header" >
        <h2 class="font-semibold text-3xl text-white leading-tight">
            {{ __('Popularidad en edades') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 text-xl text-gray-600">
                    {{ __("Este gráfico representa la distribución de las edades de los usuarios. 
                    Permite identificar el grupo demográfico principal que utiliza el sintetizador, 
                    siendo útil para adaptar las funcionalidades y el diseño del sintetizador, satisfaciendo las necesidades del grupo objetivo.") }}
                               
                </div>
            </div>
        </div>
    </div>
    <div>
        
    </div>

    <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg" style="width: 1200px; height: 550px; margin: 0 auto; display: flex; justify-content: center; align-items: center; padding: 30px;">
        <canvas id="ageChart" style=" width: 1100px; height: 450px;margin: 0 auto;"></canvas>

<script src="https://cdn.jsdelivr.net/npm/chart.js"></script>

    <script>
        const ctx = document.getElementById('ageChart').getContext('2d');

        const barColors = [
            /*'rgba(3 , 57, 166, 0.6)',
            'rgba(143, 192, 229, 0.6)',
            'rgba(90, 100, 200, 0.6)',
            'rgba(109, 177, 234, 0.6)',
            'rgba(28, 121, 182, 0.6)',
            'rgba(84, 177, 235, 0.6)',
            'rgba(129, 185, 245, 0.6)',
            'rgba(9, 88, 181, 0.6)',
            'rgba(55, 127, 182, 0.6)',
            'rgba(28, 121, 182, 0.6)',*/
                                    'rgba(142, 68, 173, 0.6)',  /* Púrpura oscuro */
                                    'rgba(52, 152, 219, 0.6)',  /* Azul brillante */
                                    'rgba(241, 196, 15, 0.6)',  /* Amarillo intenso */
                                    'rgba(255, 87, 34, 0.6)',   /* Rojo anaranjado */
                                    'rgba(92, 184, 92, 0.6)',    /* Verde pasto */
                                    'rgba(243, 156, 18, 0.6)',  /* Amarillo dorado */
                                    'rgba(46, 204, 113, 0.6)',  /* Verde esmeralda */
                                    'rgba(231, 76, 60, 0.6)',   /* Rojo claro */
                                    'rgba(155, 89, 182, 0.6)',  /* Púrpura claro */
                                    'rgba(41, 128, 185, 0.6)',  /* Azul medianoche */
                                    'rgba(249, 231, 159, 0.6)', /* Amarillo pálido */
                                    'rgba(26, 188, 156, 0.6)',  /* Verde turquesa */
                                    'rgba(204, 204, 255, 0.6)', /* Azul claro */
                                    'rgba(241, 90, 34, 0.6)',   /* Naranja vibrante */
                                    'rgba(52, 73, 94, 0.6)',    /* Gris oscuro */
                                
                            ];
        
        new Chart(ctx, {
            type: 'bar',
            data: {
                labels: @json($labels), // Pasar los labels desde PHP
                datasets: [{
                    label: 'Número de Usuarios por Edad',
                    data: @json($data), // Pasar los datos desde PHP
                    backgroundColor: barColors,
                    borderColor: 'rgba(75, 192, 192, 1)',
                    
                }]
            },
                                    options: {
                                                indexAxis: 'y',
                                                scales: {
                                                            y: {
                                                                title: {
                                                                            display: true,
                                                                            text: 'Edades'
                                                                        },
                                                                beginAtZero: true,
                                                                
                                                            },
                                                            x: {
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
                                                            }
                                                        }
                                            }
           
        });
    </script>
    </div>
</x-app-layout>