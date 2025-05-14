@extends('plantilla')
@section('barra')
    Prueba
@endsection

@section('content')

<div class="col-lg-12 container-fluid">
    <div class="row">
        <div class="col-lg-6">
            <img src="{{ asset('images/fondo.jpg') }}" class="img-fluid" style="height: 90vh; object-fit: cover;">
        </div>
        <div class="col-lg-3 offset-lg-1">
            <div class="row ">
                {{-- Eliminamos el form --}}
                <form method="POST" action="{{ route('iniciar-sesion') }}">
                    @csrf
                    <div style="margin-top: 20vh;">
                        <h1>Inicio de sesión</h1>
                    </div>
                    <hr style="width: 60%; margin-left: 1em;">
                    <div class="row">
                        <label>Nombre de usuario:</label>
                        <input type="text" style="margin-left: 1em;" id="usuario" name="usuario">
                    </div>
                    <div class="row" style="margin-top: 1em;">
                        <label>Contraseña:</label>
                        <input type="password" style="margin-left: 1em;" id="password" name="password">
                    </div>
                    <div style="margin-top: 2em;">
                        <button class="btn btn-primary" id="login" type="submit">Iniciar sesión</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>
@endsection

@section('script')
<!--
<script>
document.getElementById('login').addEventListener('click', async function () {
    const usuario = document.getElementById('usuario').value;
    const contrasena = document.getElementById('contrasena').value;

    if (!usuario || !contrasena) {
        return Swal.fire({
            icon: 'warning',
            title: 'Campos vacíos',
            text: 'Por favor, completa ambos campos.'
        });
    }

    try {
        const response = await fetch('{{ url("Vacalog/sesion") }}', {
            method: 'POST',
            headers: {
                'Content-Type': 'application/json',
                'X-CSRF-TOKEN': '{{ csrf_token() }}'
            },
            body: JSON.stringify({ usuario, contrasena })
        });

        if (response.ok) {
            const data = await response.json();
            window.location.href = '{{ url("Vacalog/Portal-Empleado") }}';
        } else {
            throw new Error('Credenciales inválidas');
        }
    } catch (error) {
        Swal.fire({
            icon: 'error',
            title: 'Credenciales incorrectas',
            text: 'Por favor, verifica tu usuario y contraseña.'
        });
    }
});
</script>-->
@endsection
