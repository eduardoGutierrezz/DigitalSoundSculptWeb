<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Usuario; 

class GraficaDePaisesController extends Controller
{
    public function index()
{
    $usuarios = Usuario::all();
    $locations = $usuarios->pluck('location');
    $counts = $locations->countBy();

    $labels = $counts->keys()->toArray();
    $data = $counts->values()->toArray();

    // Verifica que los datos sean correctos
    //dd($labels, $data);

    return view('graficaDePaises', [
        'labels' => $labels,
        'data' => $data
    ]);
}
}
