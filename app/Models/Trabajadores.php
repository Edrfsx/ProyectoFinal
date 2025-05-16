<?php

namespace App\Models;

// use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Laravel\Sanctum\HasApiTokens;
use Illuminate\Database\Eloquent\Model;

class Trabajadores extends Model{
    protected $table = 'Trabajadores'; // Nombre de la tabla en la BD

    protected $fillable = [
        'Nombre',
        'Apellidos',
        'Sexo',
        'Email',
        'Ocupacion',
        'Salario',
        'Fecha_alta',
    ];

    public $timestamps = false;
}
