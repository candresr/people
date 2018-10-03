<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Document</title>
    <link href="<?=base_url()?>assets/css/main.css" rel="stylesheet">
</head>
<body>
    
<!-- Modal -->
<div class="modal fade" id="preg_aptitud" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
        <h4 class="modal-title" id="myModalLabel">Preguntas de aptitud</h4>
      </div>
      <div class="modal-body">
      <form action="">
       <ol class="body_preg_apt">
           <li><h5>¿Cuál fue la institución de donde se graduó?</h5>
               <div class="answers"><input type="text"></div>
           </li>
           <li><h5>¿Fecha en que se gradúo como Poligrafista?</h5>
          <div class="answers"><input type=date step=7 min=2014-09-08> </div>
           </li>
           <li><h5>¿Qué titulaciones tiene afines con la Psicofisiológica Forense?</h5>
           <div class="answers">
              <input type="text"><br>
              <input type="text"><br>
              <input type="text"><br>
           </div>
           </li>
           <li><h5>¿Cuántas pruebas de Polígrafo ha realizado?</h5>
           
               <div class="ipreg"><input type="checkbox" name="h" value="">Entre 10 y 20</div>
               <div class="ipreg"><input type="checkbox" name="h" value="">Entre 30 y 50</div>
               <div class="ipreg"><input type="checkbox" name="h" value="">Entre 50 y 100</div>
               <div class="ipreg"><input type="checkbox" name="h" value="">Entre 100 y 150</div>
               <div class="ipreg"><input type="checkbox" name="h" value="">Entre 150 y 200</div>
               <div class="ipreg"><input type="checkbox" name="h" value="">De 200 en adelante</div> 
           
           <li><h5>¿Cuál de los exámenes relacionados ha realizado?</h5>
           <div class="answers">
               <input type="checkbox" name="" value="">Pre-empleo<br>
               <input type="checkbox" name="" value="">Rutina<br>
               <input type="checkbox" name="" value="">Especifico<br>
               <input type="checkbox" name="" value="">Otros<br>
           </div>
           </li>
           <li><h5>¿Cuantos exámenes de Pre-empleo, Rutina y Específicos ha realizado?</h5>
          <div class="answers">
               <input type="checkbox" name="" value="">Rutina<br>
               <input type="checkbox" name="" value="">Especific<br>
               <input type="checkbox" name="" value="">Otros<br>
           </div>
           
           <li><h5>¿Qué técnicas de Polígrafo usa en los examenes?</h5>
           <div class="answers">
           <textarea class="form-control" rows="5" id="comment"></textarea>
           </div>
          </ol>
</form>

      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-lightblue text-uppercase">GUARDAR</button>
      </div>
    </div>
  </div>
</div>


</body>
</html>