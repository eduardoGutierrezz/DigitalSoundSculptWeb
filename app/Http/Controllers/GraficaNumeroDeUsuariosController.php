<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Usuario; 
use Illuminate\Support\Facades\DB;

class GraficaNumeroDeUsuariosController extends Controller
{
    public function index()
{
      // Obtén el número de usuarios por mes y año
      $usuariosPorMes = Usuario::select(DB::raw('YEAR(created_at) as year, MONTH(created_at) as month, COUNT(*) as count'))
      ->groupBy(DB::raw('YEAR(created_at)'), DB::raw('MONTH(created_at)'))
      ->orderBy(DB::raw('YEAR(created_at)'))
      ->orderBy(DB::raw('MONTH(created_at)'))
      ->get();

  $labels = $usuariosPorMes->map(function ($item) {
      return $item->year . '-' . str_pad($item->month, 2, '0', STR_PAD_LEFT);
  })->toArray();

  $data = $usuariosPorMes->pluck('count')->toArray();

  // Obtén el número total de usuarios
  $totalUsuarios = Usuario::count();

  return view('graficaNumeroDeUsuarios', [
      'labels' => $labels,
      'data' => $data,
      'totalUsuarios' => $totalUsuarios, // Pasa el número total de usuarios a la vista
  ]);
}
}