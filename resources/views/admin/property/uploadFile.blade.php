<div class="modal fade" id="examplePositionCenter" aria-hidden="true" aria-labelledby="examplePositionCenter" role="dialog" tabindex="-1">
  <div class="modal-dialog modal-simple modal-center">
    <form id="exampleFormContainer" name="form" method="POST" action="/administrator/properties/upload" enctype="multipart/form-data">
      <div class="modal-content">
        <div class="modal-header">
          <h4 class="modal-title">Subir Documento</h4>
        </div>
        <div class="modal-body">
            <input type="hidden" name="_token" value="{!! csrf_token() !!}" />
            <input type="hidden" name="idPayment" id="idPayment" />
            <input name="documentPayment" type="file" accept=".pdf"/>
        </div>
        <div class="modal-footer">
          <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
          <button type="submit" class="btn btn-primary">Save changes</button>
        </div>
      </div>
    </form>
  </div>
</div>
