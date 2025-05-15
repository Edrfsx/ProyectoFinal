
<div class="modal fade" id="modalVacaciones" tabindex="-1" aria-labelledby="modalVacacionesLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <form action="{{ route('vacaciones.solicitar') }}" method="POST">
        @csrf
        <div class="modal-header">
          <h5 class="modal-title" id="modalVacacionesLabel">Solicitar Vacaciones</h5>
          <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Cerrar"></button>
        </div>
        <div class="modal-body">
          <div class="mb-3">
            <label for="fecha_inicio" class="form-label">Fecha de Inicio</label>
            <input type="date" class="form-control" name="fecha_inicio" id="fecha_inicio" required>
          </div>
          <div class="mb-3">
            <label for="fecha_fin" class="form-label">Fecha de Fin</label>
            <input type="date" class="form-control" name="fecha_fin" id="fecha_fin" required>
          </div>
        </div>
        <div class="modal-footer">
          <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cancelar</button>
          <button type="submit" class="btn btn-primary">Enviar Solicitud</button>
        </div>
      </form>
    </div>
  </div>
</div>
