<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Vacaciones extends Model
{
    use HasFactory;

    protected $table = 'Vacaciones'; // nombre de la tabla

    protected $fillable = [
        'trabajador_id',
        'info_vacaciones_id',
        'Fecha_inicio',
        'Fecha_fin',
        'Estado',
    ];
 

    public $timestamps = false;

        public function infoVacaciones()
    {
        return $this->belongsTo(\App\Models\InfoVacaciones::class, 'info_vacaciones_id');
    }

    public function trabajador()
    {
        return $this->belongsTo(Trabajadores::class, 'trabajador_id');
    }
}
