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
        'info_vacaciones_id' => $info->Id,
        'Fecha_inicio' => $request->input('Fecha_inicio'),
        'Fecha_fin' => $request->input('Fecha_fin'),
        'Estado' => 'En proceso',
    ]);

    $this->recalcularVacaciones($user->trabajador_id);

    if ($request->ajax()) {
        return response()->json(['success' => true, 'data' => $data]);
    } else {
        return redirect()->route('portal.index');
    }
}




public function recalcularVacaciones($trabajadorId)
{
    
    $info = \App\Models\InfoVacaciones::where('trabajador_id', $trabajadorId)->first();
    if (!$info) {
        return;
    }
    

    $vacaciones = \App\Models\Vacaciones::where('trabajador_id', $trabajadorId)
        ->whereIn('Estado', ['Aceptado','En proceso'])
        ->get();

    $totalDiasUsados = 0;
    foreach ($vacaciones as $vacacion) {
        $inicio = Carbon::parse($vacacion->Fecha_inicio);
        $fin = Carbon::parse($vacacion->Fecha_fin);
        $dias = $inicio->diffInDays($fin) + 1;
        $totalDiasUsados += $dias;
    }

    $diasTotalesAnuales = 44;

    $info->Dias_usados = $totalDiasUsados;
    $info->Dias_disponibles = $diasTotalesAnuales - $totalDiasUsados;
    
    $updated = \App\Models\InfoVacaciones::where('trabajador_id', $trabajadorId)
    ->update(['Dias_disponibles'=>$info->Dias_disponibles,
'Dias_usados'=>$info->Dias_usados]);
    if ($updated) {
        return response()->json(['success' => true]);
    } else {
        return response()->json(['success' => false, 'message' => 'No se pudo actualizar'], 500);
    }

}
}