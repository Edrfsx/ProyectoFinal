<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Foundation\Auth\Access\AuthorizesRequests;
use Illuminate\Foundation\Validation\ValidatesRequests;
use App\Http\Controllers\Controller as BaseController;
use Illuminate\Support\Facades\Auth;
use DataTables;

class JefeController extends Controller{

public function index()
{
    $user = Auth::user();
    $jefe = $user->jefe;


    return view('jefe.index', compact('jefe'));
}

    public function listtable()
    {
        $user = Auth::user();

        $data = \App\Models\Vacaciones::join('Trabajadores', 'Trabajadores.Id', '=','Vacaciones.trabajador_id' )
        ->where('Vacaciones.Estado','En proceso')
        ->select(
            'Vacaciones.Id as id',
            'Trabajadores.Nombre as nombre',
            'Vacaciones.Fecha_inicio as fecha_inicio',
            'Vacaciones.Fecha_fin as fecha_fin'
        )
        ->get();

        return DataTables::of($data)
        ->addColumn('Acciones', function($data){
    return '
        <a href="#" data-id="' . $data->id . '" class="btn btn-sm btn-success aceptar">
            Aceptar
        </a>
        <a href="#" data-id="' . $data->id . '" class="btn btn-sm btn-danger denegar">
            Denegar
        </a>
    ';
})

        ->rawColumns(['Acciones'])
            ->setRowId('id')
            ->make(true);
    }

    public function aceptar($id)
{
    $updated = \App\Models\Vacaciones::where('Id', $id)
        ->update(['Estado' => 'Aceptada']);
    if ($updated) {
        return response()->json(['success' => true]);
    } else {
        return response()->json(['success' => false, 'message' => 'No se pudo actualizar'], 500);
    }
}

public function denegar($id)
{
    $updated = \App\Models\Vacaciones::where('Id', $id)
        ->update(['Estado' => 'Rechazada']);
    if ($updated) {
        return response()->json(['success' => true]);
    } else {
        return response()->json(['success' => false, 'message' => 'No se pudo actualizar'], 500);
    }
}


}