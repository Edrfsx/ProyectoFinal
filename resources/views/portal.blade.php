@extends('plantilla')
@section('barra')
{{ $trabajador->Nombre }}
@endsection

@section('content')
hola
<form>
    <a href="{{ route('logout') }}" class="btn btn-primary">boton</a>
</form>
@endsection