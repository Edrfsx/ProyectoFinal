@extends('plantilla')
@section('barra')
    @if ($trabajador)
        {{ $trabajador->Nombre }}
    @endif

@endsection

@section('content')
    <div class="col-lg-12 col-md-12 col-xs-12">
        <div class="d-flex justify-content-center mt-5">
            <div class="text-center" style="max-width: 600px; width: 100%;">
                @if ($infoVacaciones)
                    <p>Días disponibles: {{ $infoVacaciones->Dias_disponibles }}</p>
                    <p>Días usados: {{ $infoVacaciones->Dias_usados }}</p>
                @endif
                <button type="button" class="btn btn-success mb-3 pull-right" data-bs-toggle="modal" data-bs-target="#modalVacaciones">
                    Solicitar Vacaciones
                </button>

                <table id="tabla-vacaciones" class="table datatable table-bordered">
                    <thead>
                        <tr>
                            <th>Fecha Inicio</th>
                            <th>Fecha Fin</th>
                            <th>Estado</th>
                        </tr>
                    </thead>
                </table>
            </div>
        </div>
    </div>


@include("includes.modalvacaciones")
@endsection

@section('script')
    <script>
        $(document).ready(function () {
            $('#tabla-vacaciones').DataTable({
                processing: true,
                serverSide: true,
                ajax: '{{ route("vacaciones.listar") }}',
                columns: [
                    { data: 'Fecha_inicio', name: 'Fecha_inicio' },
                    { data: 'Fecha_fin', name: 'Fecha_fin' },
                    { data: 'Estado', name: 'Estado' }
                ]
            });
        });
    </script>
@endsection