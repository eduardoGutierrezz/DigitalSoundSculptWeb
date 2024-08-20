<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Usuario;

class GraficaDePresetsController extends Controller
{
    public function index()
    {
        // Obtiene todos los usuarios
        $usuarios = Usuario::all();
        $presets = $usuarios->pluck('presets');

        // Cuenta el número de veces que cada preset aparece
        $counts = $presets->flatMap(function ($preset) {
            return explode(',', $preset); // Asumiendo que los presets están separados por comas
        })->countBy();

        if ($counts->isEmpty()) {
            return view('graficaDePresets', [
                'labels' => [],
                'data' => [],
                'percentages' => [],
                'totalPresets' => 10
            ]);
        }

        // Total de presets para calcular porcentajes
        $totalPresets = $counts->sum();

        $labels = $counts->keys()->toArray();
        $data = $counts->values()->toArray();
        $percentages = $counts->map(function ($count) use ($totalPresets) {
            return $totalPresets > 0 ? round(($count / $totalPresets) * 100, 2) : 0;
        })->toArray();

        

            return view('graficaDePresets', [
                'labels' => $labels,
                'data' => $data,
                'percentages' => $percentages // Asegúrate de que esta línea esté incluida
            ]);
            
        
    }
}
