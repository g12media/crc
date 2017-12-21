<div class="modal fade" id="StatePayment" aria-hidden="true" aria-labelledby="examplePositionCenter" role="dialog" tabindex="-1">
  <div class="modal-dialog modal-simple modal-center">
    <form id="exampleFormContainer" name="form" method="POST" action="/administrator/properties/updateState" enctype="multipart/form-data">
      <div class="modal-content">
        <div class="modal-header">
          <h4 class="modal-title">Actualizar Estado</h4>
        </div>
        <div class="modal-body">
            <input type="hidden" name="_token" value="{!! csrf_token() !!}" />
            <input type="hidden" name="idPayment" id="id"/>
            <p>Esta seguro que desea atualizar el estado del pago a <strong>Pagado</strong></p>
        </div>
        <div class="modal-footer">
          <button type="button" class="btn btn-default" data-dismiss="modal">No</button>
          <button type="submit" class="btn btn-primary">Si</button>
        </div>
      </div>
    </form>
  </div>
</div>
