@extends('plantilla')
@section('barra')
@if ($trabajador)
    {{ $trabajador->Nombre }}
@endif

@endsection

@section('content')
hola
<form>
    <a href="{{ route('logout') }}" class="btn btn-primary">boton</a>
</form>
@endsection