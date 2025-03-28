<?php

function _tips_modal() {
?>
<textarea name="" id=""  cols="200" rows="20">
  Cabecera
    <div class="modal-header">
      <h5 class="modal-title" id="scrollingLongModalLabel2">Modal title</h5>
        <button class="btn p-1" type="button" data-bs-dismiss="modal" aria-label="Close">
          <span class="fas fa-times fs--1"></span>
        </button>
    </div>
    o wnav_titulo_modal($titulo);
  Body
  <div class="modal-body">
    Aca el contenido HTML de
  </div>

  Footer
  <div class="modal-footer">
    <button class="btn btn-primary" type="button">Okay</button>
    <button class="btn btn-outline-primary" type="button" data-bs-dismiss="modal">Cancel</button>
  </div>


  
</textarea>
<?php
}


