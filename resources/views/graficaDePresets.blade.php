<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-3xl text-white leading-tight">
            {{ __('Presets más populares') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <!-- Recuadro con descripción -->
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg mb-6">
                <div class="p-6 text-xl text-gray-600">
                    {{ __("Muestra qué presets de sonido son los más populares entre los usuarios. 
                    Esta información es importante para evaluar qué opciones están siendo más aprovechadas y 
                    si hay algún preset que debería ser destacado o mejorado basándose en su popularidad.") }}
                </div>
            </div>
            
            <!-- Recuadro con gráfica y porcentajes -->
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg" style="width: 100%; display: flex; justify-content: space-between; align-items: flex-start;">
                <!-- Gráfica de presets -->
                <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg" style="flex: 1; padding: 20px;">
                    <canvas id="myChart"></canvas>
                    <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
                    <script>
                        const ctx = document.getElementById('myChart').getContext('2d');
                        
                        // Convierte las variables PHP a formato JavaScript
                        const labels = @json($labels);
                        const data = @json($data);
                        
                        // Define un array de colores para cada segmento
                        const barColors = [
                            'rgba(52, 152, 219, 0.6)', 
                            'rgba(255, 87, 34, 0.6)',
                            'rgba(255, 215, 0, 0.6)',
                            'rgba(142, 68, 173, 0.6)',
                            'rgba(26, 188, 156, 0.6)',
                            'rgba(241, 196, 15, 0.6)',
                            'rgba(92, 184, 92, 0.6)',
                            'rgba(243, 156, 18, 0.6)',
                            'rgba(46, 204, 113, 0.6)',
                            'rgba(155, 89, 182, 0.6)',
                            'rgba(41, 128, 185, 0.6)',
                            'rgba(249, 231, 159, 0.6)',
                            'rgba(26, 188, 156, 0.6)',
                            'rgba(204, 204, 255, 0.6)',
                            'rgba(241, 90, 34, 0.6)',
                            'rgba(52, 73, 94, 0.6)',
                        ];
                        
                        new Chart(ctx, {
                            type: 'polarArea',
                            data: {
                                labels: labels,
                                datasets: [{
                                    label: 'Gráfica de presets',
                                    data: data,
                                    backgroundColor: barColors, 
                                }]
                            },
                            options: {
                                scales: {
                                    r: {
                                        beginAtZero: true
                                    }
                                }
                            }
                        });
                    </script>
                </div>

                <!-- Recuadro con porcentajes de presets -->
                <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg" style="width: 300px; padding: 20px; text-align: left;">
                    <h3 class="text-2xl font-semibold text-gray-800 mb-4">Porcentaje de uso de presets</h3>
                    @if ($labels && $percentages)
                        <ul class="text-gray-600 text-xl">
                            @foreach ($labels as $index => $label)
                                <li class="mb-2">
                                    <span class="font-bold">{{ $label }}:</span> {{ $percentages[$label] ?? '0' }}%
                                </li>
                            @endforeach
                        </ul>
                    @else
                        <p class="text-gray-600">No hay datos disponibles.</p>
                    @endif
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
