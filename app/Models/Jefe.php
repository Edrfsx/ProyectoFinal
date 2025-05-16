<?php

namespace App\Models;

// use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Laravel\Sanctum\HasApiTokens;
use Illuminate\Database\Eloquent\Model;

class Jefe extends Model{
    protected $table = 'Jefes'; // Nombre de la tabla en la BD

    protected $fillable = [
        'Nombre',
        'Apellidos',
        'Sexo',
        'Email',
        'Ocupacion',
        'Salario',
        'Fecha_alta',
    ];
}
