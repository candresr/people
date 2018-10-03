<?php
  echo anchor('admin/listCase/template_row','casos de gestion').nbs(2);
  echo anchor('','datos').nbs(2);
  echo anchor('','facturacion').nbs(2);
  echo anchor('','correo').nbs(2);
  echo anchor('','formulario de registro').nbs(2);
  echo anchor('','formulario de evaluado').nbs(2);
  echo anchor('','formulario de asociado').nbs(2);
  echo br(3);
  echo (isset($detail))? $detail : '';
  echo (isset($table['search']))? $table['search'] : '';
  echo (isset($table['tables']))? $table['tables'] : '';
  echo (isset($calendar))? $calendar : '';
?>
