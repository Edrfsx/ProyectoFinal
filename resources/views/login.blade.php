@extends('plantilla')
@section('barra')
@endsection

@section('content')

<div class="col-lg-12 col-md-12 col-xs-12 container-fluid">
    <div class="row">
        <div class="col-lg-6 col-md-6 col-xs-6 p-0 position-relative">
    <img src="{{ asset('images/fondo.jpg') }}" class="img-fluid" style="height: 90vh; object-fit: cover;">

    <div class="position-absolute top-0 end-0 h-100" style="
        width: 20%;
        background: linear-gradient(to left, rgba(255, 255, 255, 1), transparent);
    ">
    </div>
</div>
        <div class="col-lg-3 col-md-3 col-xs-3 offset-lg-1 offset-md-1 offset-xs-1">
            <div class="row ">
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
@if(session('error'))
<script>
    Swal.fire({
        icon: 'error',
        title: 'Error de autenticación',
        text: '{{ session('error') }}',
        confirmButtonText: 'Entendido'
    });
</script>
@endif
@endsection
