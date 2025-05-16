@extends('plantilla')

@section('barra')
@endsection

@section('content')
<div class="col-lg-12 col-md-12 col-xs-12">
    <form method="POST" action="{{ route('registrar') }}">
        @csrf

        <label>Nombre</label>
        <input type="text" id="Nombre" name="Nombre" required>
        <br>

        <label>Apellidos</label>
        <input type="text" id="Apellidos" name="Apellidos" required>
        <br>

        <label>Sexo</label>
        <select id="Sexo" name="Sexo" required>
            <option value="Hombre">Hombre</option>
            <option value="Mujer">Mujer</option>
            <option value="Otros">Otros</option>
        </select>
        <br>

        <label>Email</label>
        <input type="email" id="Email" name="Email" required>
        <br>

        <label>Ocupación</label>
        <input type="text" id="Ocupacion" name="Ocupacion" required>
        <br>

        <label>Salario</label>
        <input type="number" id="Salario" name="Salario" step="0.01" required>
        <br>

        <label>Fecha de Alta</label>
        <input type="date" id="Fecha_alta" name="Fecha_alta" required>
        <br>

        <button type="submit">Enviar</button>
    </form>
</div>
@endsection
