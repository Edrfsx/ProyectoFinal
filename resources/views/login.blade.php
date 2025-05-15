@extends('plantilla')
@section('barra')
    Prueba
@endsection

@section('content')

<div class="col-lg-12 container-fluid">
    <div class="row">
        <div class="col-lg-6 p-0 position-relative">
    <img src="{{ asset('images/fondo.jpg') }}" class="img-fluid" style="height: 90vh; object-fit: cover;">

    <!-- Sombra blanca en el borde derecho de la imagen -->
    <div class="position-absolute top-0 end-0 h-100" style="
        width: 20%;
        background: linear-gradient(to left, rgba(255, 255, 255, 1), transparent);
    ">
    </div>
</div>
        <div class="col-lg-3 offset-lg-1">
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

@endsection
