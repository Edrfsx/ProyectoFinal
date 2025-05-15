<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class InfoVacaciones extends Model
{
    
    protected $table = 'Info_vacaciones';

    protected $fillable = [
        'trabajador_id',
        'Dias_disponibles',
        'Dias_usados',
    ];

    public $timestamps = false;

        public function vacaciones()
    {
        return $this->hasMany(\App\Models\Vacaciones::class, 'info_vacaciones_id');
    }

    use HasFactory;
}
