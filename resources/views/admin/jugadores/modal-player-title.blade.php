<div class="modal fade modal-slide-in-right" data-backdrop="static" data-keyboard="false" aria-hidden="true"
     role="dialog" tabindex="-1" id="modal-player-title">
    <div class="modal-dialog modal-dialog-centered modal-lg">
        <div class="modal-content">
            <div class="modal-header btn-primary">
                <h4 class="modal-title" style="color: #fff">Adicionar Títulos del Jugador</h4>
                  <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                      <span aria-hidden="true">&times;</span>
                  </button>
            </div>
            <div class="modal-body">
                <div class="box-body">
                    <div class="row">
                        <div class="col-12 col-sm-6 col-lg-12">
                            <div class="row">
                                <input type="hidden" id="check_repetir" name="check_repetir" value="0">
                                <div class="form-group col-sm-6">
                                    <x-form-combobox-duallistbox id="title_id" required="true" :datos="$titles" textlocale="name"
                                                                 label="{{__('balonmano.lbtitulos')}}"/>
                                    <span class="invalid-feedback" id="error_title_id"></span>
                                </div>
                                <div class="form-group col-sm-6">
                                    <x-form-textfield id="amount" :required="true" label="{{__('balonmano.lbcantidad')}}"/>
                                    <span class="invalid-feedback" id="error_amount"></span>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="modal-footer justify-content-between">
                    <div class="col-12">
                        <div class="pull-right float-right">
                            <button type="submit" class="btn btn-app" id="btn_add_titles_pago"><i
                                        class="fas fa-save"></i>Guardar
                            </button>
                            <button type="submit" class="btn btn-app" id="btn_modif_titles_pago"><i
                                        class="fas fa-save"></i>Modificar
                            </button>
                            <a type="button" class="btn btn-app" data-dismiss="modal">
                                <i class="fas fa-times-circle"></i>Cancelar</a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>