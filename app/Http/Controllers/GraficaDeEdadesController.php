<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Usuario; 
use Carbon\Carbon;

class GraficaDeEdadesController extends Controller
{
    public function index()
{
    $usuarios = Usuario::all();
        
        // Calcular edades
        $edades = $usuarios->map(function($usuario) {
            return Carbon::parse($usuario->birthdate)->age;
        });

        // Contar la cantidad de usuarios por edad
        $edadesCount = $edades->countBy()->sortKeys();

        $labels = $edadesCount->keys()->toArray();
        $data = $edadesCount->values()->toArray();

        return view('graficaDeEdades', [
            'labels' => $labels,
            'data' => $data
        ]);
}
}





  
