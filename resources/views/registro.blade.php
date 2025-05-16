@extends('plantilla')
@section('barra')
@endsection
@section('content')
<div class="col-lg-12 col-md-12 col-xs-12">
    <form method="POST" action="{{ route('registrar') }}">
        @csrf
        <label>Usuario</label>
        <input type="text" id="usuario" name="usuario" required>
        <br>
        <label>Contraseña</label>
        <input type="text" id="password" name="password" required>
        <br>
        <label>Id del Trabajador</label>
        <input type="number" id="trabajador_id" name="trabajador_id" required>
        <br>
        <label>Id de Jefe</label>
        <input type="number" id="jefe_id" name="jefe_id" required>
        <button type="submit">Enviar</button>
    </form>
</div>
@endsection