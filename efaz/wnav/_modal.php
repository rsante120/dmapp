<?php

?>
<div class="modal fade lg" id="modGeneral" tabindex="-1" aria-labelledby="scrollingLongModalLabel2" aria-hidden="true" data-bs-backdrop="static">
  <div class="modal-dialog modal-dialog-scrollable modal-lg" id="modGeneralDim">
    <div class="modal-content" id="modGeneralContent"></div>
  </div>
</div>
<script>
  var dvmdl = document.getElementById('modGeneralContent');
  function salir_modGeneral(){
    var modal = bootstrap.Modal.getInstance(document.getElementById('modGeneral'));
    if (modal) {
      modal.hide();
    }
  }
  function ver_modGeneral_sm() {
    mostrar_modal_con_tamano('modal-sm');
  }
  function ver_modGeneral_md() {
    mostrar_modal_con_tamano(); // sin clase, se considera tamaño medio por defecto
  }
  function ver_modGeneral() {
    mostrar_modal_con_tamano('modal-lg');
  }
  function ver_modGeneral_xl() {
    mostrar_modal_con_tamano('modal-xl');
  }
  function ver_modGeneral_full() {
    mostrar_modal_con_tamano('modal-fullscreen');
  }
  function mostrar_modal_con_tamano(tamanoClase) {
    var dialog = document.getElementById('modGeneralDim');
    dialog.classList.remove('modal-sm', 'modal-md', 'modal-lg', 'modal-xl', 'modal-fullscreen');
    if (tamanoClase) {
      dialog.classList.add(tamanoClase);
    }
    var modal = new bootstrap.Modal(document.getElementById('modGeneral'));
    modal.show();
  }
</script>