<div class="modal fade modal-slide-in-right" data-backdrop="static" data-keyboard="false" aria-hidden="true" role="dialog" tabindex="-1" id="modal-delete-image">
    <div class="modal-dialog ">
        <div class="modal-content bg-danger">
            <div class="modal-header">
                <h4 class="modal-title">Eliminar Archivo Imagen</h4>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <form name="form_delete_image" id="form_delete_image" action="" method="POST">
                @csrf
                @method('DELETE')
                <div class="modal-body">
                    <p>¿Está seguro que desea eliminar el archivo imagen?
                        Esta acción no se puede deshacer.</p>
                </div>
                <div class="modal-footer justify-content-between">
                    <button type="button" class="btn btn-default" data-dismiss="modal">Cancelar</button>
                    <button type="button" id="btn_confirm_delete_image" class="btn btn-outline-light">Confirmar</button>
                </div>
            </form>
        </div>
    </div>
</div>
