<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Usuario;

class GraficaDeGenerosController extends Controller
{
    public function index()
    {
        $usuarios = Usuario::all();
        $generoMusical = $usuarios->pluck('generoMusical');
        $counts = $generoMusical->countBy();

        $labels = $counts->keys()->toArray();
        $data = $counts->values()->toArray();

        // Calcula los porcentajes
        $total = $generoMusical->count();
        $percentages = $counts->map(function ($count) use ($total) {
            return $total > 0 ? round(($count / $total) * 100, 2) : 0;
        })->toArray();

        return view('graficaDeGeneros', [
            'labels' => $labels,
            'data' => $data,
            'percentages' => $percentages,
        ]);
    }
}
