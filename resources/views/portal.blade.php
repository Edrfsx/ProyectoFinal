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
                    <p>Días Naturales Disponibles: {{ $infoVacaciones->Dias_disponibles }}</p>
                    <p>Días Naturales Usados: {{ $infoVacaciones->Dias_usados }}</p>
                @endif
                <button type="button" class="btn btn-success mb-3 pull-right" style="margin-left: 35dvw" data-bs-toggle="modal" data-bs-target="#modalVacaciones">
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

        $.ajax({
    url: '/Vacalog/vacaciones/solicitar',
    type: 'POST',
    data: {
        Fecha_inicio: Fecha_inicio,
        Fecha_fin: Fecha_fin,
        _token: '{{ csrf_token() }}'
    },
    success: function (data) {
        Swal.fire('Solicitud enviada', 'Tu solicitud fue registrada.', 'success');
        tabla.ajax.reload();
    },
    error: function (xhr) {
        if (xhr.status === 422) {
            const message = xhr.responseJSON.message || 'Error en la solicitud.';
            Swal.fire('Error', message, 'error');
        } else {
            Swal.fire('Error', 'Ocurrió un problema al enviar la solicitud.', 'error');
        }
    }
});

    </script>
@endsection