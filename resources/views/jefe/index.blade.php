@extends('plantilla')
@section('barra')
    @if ($jefe)
        {{ $jefe->Nombre }}
    @endif

@endsection


@section('content')
<div class="col-lg-12 col-md-12 col-xs-12">
    <div class="d-flex justify-content-center mt-5">
            <div class="text-center" style="max-width: 600px; width: 100%;">
                <table id="tabla-vaca" class="table datatable table-bordered">
    <thead>
        <tr>
            <th>Nombre</th>
            <th>Fecha Inicio</th>
            <th>Fecha Fin</th>
            <th>Acciones</th>
        </tr>
    </thead>
</table>
            </div>
    </div>
</div>
@endsection
@section('script')
<script>
    $(document).ready(function () {
        var tabla = $('#tabla-vaca').DataTable({
            processing: true,
            serverSide: true,
            ajax: '{{ route("jefe.listarvaca") }}',
            columns: [
                { data: 'nombre', name: 'nombre' },
                { data: 'fecha_inicio', name: 'fecha_inicio' },
                { data: 'fecha_fin', name: 'fecha_fin' },
                { data: 'Acciones', orderable: false, searchable: false }
            ]
        });

        // ACEPTAR
        $('#tabla-vaca').on('click', '.aceptar', function (e) {
            e.preventDefault();
            console.log("hols");
            let id = $(this).data('id');
            Swal.fire({
                title: '¿Aceptar solicitud?',
                text: '¿Estás seguro de aceptar estas vacaciones?',
                icon: 'question',
                showCancelButton: true,
                confirmButtonText: 'Sí, aceptar',
                cancelButtonText: 'Cancelar'
            }).then((result) => {
                if (result.isConfirmed) {
                    $.ajax({
                        url: `/Vacalog/vacaciones/aceptar/${id}`,
                        type: 'POST',
                        data: {
                            _token: '{{ csrf_token() }}'
                        },
                        
                        success: function (data) {
                            //console.log(data);
                            Swal.fire('Aceptado', 'La solicitud fue aceptada.', 'success');
                            tabla.ajax.reload();
                        },
                        error: function () {
                            Swal.fire('Error', 'No se pudo aceptar la solicitud.', 'error');
                        }
                    });
                }
            });
        });

        // DENEGAR
        $('#tabla-vaca').on('click', '.denegar', function (e) {
            e.preventDefault();
            let id = $(this).data('id');

            Swal.fire({
                title: '¿Denegar solicitud?',
                text: '¿Estás seguro de denegar estas vacaciones?',
                icon: 'warning',
                showCancelButton: true,
                confirmButtonText: 'Sí, denegar',
                cancelButtonText: 'Cancelar'
            }).then((result) => {
                if (result.isConfirmed) {
                    $.ajax({
                        url: `/Vacalog/vacaciones/denegar/${id}`,
                        type: 'POST',
                        data: {
                            _token: '{{ csrf_token() }}'
                        },
                        success: function () {
                            Swal.fire('Denegado', 'La solicitud fue rechazada.', 'success');
                            tabla.ajax.reload();
                        },
                        error: function () {
                            Swal.fire('Error', 'No se pudo denegar la solicitud.', 'error');
                        }
                    });
                }
            });
        });
    });
</script>


@endsection