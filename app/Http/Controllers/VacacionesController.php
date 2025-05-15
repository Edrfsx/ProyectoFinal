<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\Vacaciones;
use DataTables;
use Carbon\Carbon;  

class VacacionesController extends Controller
{
    public function listtable()
    {
        $user = Auth::user();

        $data = Vacaciones::where('trabajador_id', $user->trabajador_id)->get();

        return DataTables::of($data)
            ->setRowId('id')
            ->make(true);
    }

public function store(Request $request)
{
    $user = Auth::user();

    

    // Buscar el InfoVacaciones correspondiente
    $info = \App\Models\InfoVacaciones::where('trabajador_id', $user->trabajador_id)->first();

    // Crear el registro de vacaciones incluyendo la foreign key
    $data = \App\Models\Vacaciones::create([
        'trabajador_id' => $user->trabajador_id,
        'info_vacaciones_id' => $info->Id ,
        'Fecha_inicio' => $request->input('fecha_inicio'),
        'Fecha_fin' => $request->input('fecha_fin'),
        'Estado' => 'En proceso',
        
    ]);

    // Recalcular los días usados
    $this->recalcularVacaciones($user->trabajador_id);

    
    if ($request->ajax()) {
        return response()->json(['success' => true, 'data' => $data]);
    } else {
        return redirect()->route('portal.index');
    }
}



public function recalcularVacaciones($trabajadorId)
{
    
    // Obtener el InfoVacaciones del trabajador
    $info = \App\Models\InfoVacaciones::where('trabajador_id', $trabajadorId)->first();
    if (!$info) {
        return;
    }
    

    // Obtener vacaciones aceptadas del trabajador
    $vacaciones = \App\Models\Vacaciones::where('trabajador_id', $trabajadorId)
        ->whereIn('Estado', ['Aceptado','En proceso'])
        ->get();

    // Calcular total de días usados
    $totalDiasUsados = 0;
    foreach ($vacaciones as $vacacion) {
        $inicio = Carbon::parse($vacacion->Fecha_inicio);
        $fin = Carbon::parse($vacacion->Fecha_fin);
        $dias = $inicio->diffInDays($fin) + 1;
        $totalDiasUsados += $dias;
    }

    // Valor base de días disponibles (puedes cambiarlo o guardarlo en otra columna)
    $diasTotalesAnuales = 44;

    // Actualizar valores
    $info->Dias_usados = $totalDiasUsados;
    $info->Dias_disponibles = $diasTotalesAnuales - $totalDiasUsados;
    $info->save();

}
}