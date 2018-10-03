<!DOCTYPE html>
<!-- saved from url=(0042)http://getbootstrap.com/examples/carousel/ -->
<html lang="en">

<head>
    <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="">
    <meta name="author" content="">
    <link rel="icon" href="">
    <title>People</title>
    <!-- Bootstrap core CSS -->
    <link href="<?=base_url()?>assets/css/bootstrap.min.css" rel="stylesheet">
    <link href="<?=base_url()?>assets/css/bootstrap-datetimepicker.min.css" rel="stylesheet">
    <link href="<?=base_url()?>assets/./css/ie10-viewport-bug-workaround.css" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-select/1.10.0/css/bootstrap-select.min.css">
    <link rel="stylesheet" type="text/css" href="<?=base_url()?>assets/css/calendar.css" />
    <!-- Just for debugging purposes. Don't actually copy these 2 lines! -->
    <!--[if lt IE 9]><script src="../../assets/js/ie8-responsive-file-warning.js"></script><![endif]-->
    <script src="<?=base_url()?>assets/./js/ie10-viewport-bug-workaround.js"></script>
    <link rel="stylesheet" href="">
    <link href="<?=base_url()?>assets/css/carousel.css" rel="stylesheet">
    <link rel="stylesheet" href="<?=base_url()?>assets/font/fuente.css">
    <link href="<?=base_url()?>assets/css/main.css" rel="stylesheet"> 
   
    <script>
    function solonumeros(e){
            
            key = e.keyCode || e.which;
            
            teclado = String.fromCharCode(key);
            
            numeros = "0123456789";
            especiales = "8-37-38-46";// array 
            teclado_especial =false;
            
            for(var i in especiales){
                
                if(key==especiales[i]){
                        teclado_especial=true;
                }
            }
            if(numeros.indexOf(teclado)== -1 && !teclado_especial){
                    return false;
            }
    }
    </script>



    </head>

<body>
    <nav id="headerwhite" class="navbar navbar-default peopleheader animated fadeInDown displaynone">
        <div class="container-fluid">
            <!-- Brand and toggle get grouped for better mobile display -->
            <div class="navbar-header">
                <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#bs-example-navbar-collapse-1" aria-expanded="false"> <span class="sr-only">Toggle navigation</span> <span class="icon-bar"></span> <span class="icon-bar"></span> <span class="icon-bar"></span> </button> <a class="navbar-brand" href="#"><img src="<?=base_url()?>assets/ico/LogoQuickwhite.png" id="logoquick" alt=""></a> </div>
            <!-- Collect the nav links, forms, and other content for toggling-->
            <div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
                <ul class="nav navbar-nav navbar-right">
                    <li><a href="<?= base_url('index.php/web_home');?>">Inicio</a></li>
                    <li><a href="#">Servicios</a></li>
                    <li><a href="#">Clientes</a></li>
                    <li><a href="#">Nosotros</a></li>
                    <li><a href="<?=base_url('index.php/web_professional/registro');?>">Trabaja con Nosotros</a></li>
                    <li><a href="#">Contacto</a></li>
                    <li class="dropdown"> <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false">Luisa Varon<span class="caret"></span></a>
                        <ul class="dropdown-menu">
                            <li><a href="#">Action</a></li>
                            <li><a href="#">Another action</a></li>
                            <li><a href="#">Something else here</a></li>
                            <li role="separator" class="divider"></li>
                            <li><a href="#">Separated link</a></li>
                        </ul>
                    </li>
                </ul>
            </div>
            <!-- /.navbar-collapse -->
        </div>
        <!-- /.container-fluid -->
    </nav>
    <div class="container">
        <div class="col-lg-12">
            <h2 class="tittleblue">Bienvenido a Nuestra plataforma</h2>
            <p>Para prestar nuestros servicios, completa la siguiente información, solo tardarás un minuto. Pronto informaremos la aprobación de tu registro.</p>
        </div>
        <form action='<?=base_url('/index.php/web_professional/recibir');?>' class="formstyle"  method="post" enctype="multipart/form-data">
            <div class="row">
                <div class="form-group col-lg-3 col-md-3 col-sm-6 col-xs-12">
                    <label for="exampleInputEmail1">Prestaré el servicio como:*</label>
                    <select type="" class="form-control" id="profesion" name="profesion" placeholder="1234567">
                  <option value="0">Selecciona</option>
                  <?php foreach($categorie as $co):?>
                  <option value="<?php echo $co['value']?>"><?php echo $co['value']?></option>
                  <?php endforeach;?> 
                    </select>
                </div>
            </div>
            <div class="form-group col-lg-12 col-md-12 col-sm-12 col-xs-12">
                <h4>Información General</h4> </div>
            <div class="row">
                <div class="form-group col-lg-3 col-md-3 col-sm-6 col-xs-12">
                    <label for="exampleInputEmail1">Nombres</label>
                    <input type="" class="form-control" id="nombre" name="nombre" required placeholder="Luis Ejemplo"> </div>
                <div class="form-group col-lg-3 col-md-3 col-sm-6 col-xs-12">
                    <label for="exampleInputEmail1">Apellidos</label>
                    <input type="" class="form-control" id="apellido" name="apellido" required placeholder="Perez Perez"> </div>
                <div class="form-group col-lg-3 col-md-3 col-sm-6 col-xs-12">
                    <label for="exampleInputEmail1">Tipo de identificación</label>
                    <select type="" class="form-control" id="tipo" name="tipo" placeholder="1234567">
                        <option value="0">Selecciona</option>
                <?php foreach($type as $co):?>
                  <option value="<?php echo $co['key']?>"><?php echo $co['value']?></option>
                  <?php endforeach;?>
                    </select>
                </div>
                <div class="form-group col-lg-3 col-md-3 col-sm-6 col-xs-12">
                    <label for="exampleInputEmail1">Número identificación</label>
                    <input type="" class="form-control" required id="cedula" name="cedula" onkeypress="return solonumeros(event)" placeholder="1016007812"> </div>
            </div>
            <div class="row">
                <!--div class="form-grou' col-lg-3 col-md-3 col-sm-6 col-xs-12" id="datetimepicker1">
         
          <input type="" class="form-control" placeholder="Calle 16 a N° 136 - 00">
         <img src="ico/icoeditar.png" class="icoedit" alt="">
          </div-->
                <div class="col-lg-3 col-md-3 col-sm-6 col-xs-12">
                    <label for="exampleInputEmail1">Fecha de Expedición</label>
                    <input type="text" name="fecha_expedicion" class="form-control tcal" placeholder="2016-08-06" /> </div>
                <div class="form-group col-lg-3 col-md-3 col-sm-6 col-xs-12">
                    <label for="exampleInputEmail1">Lugar de Nacimiento</label>
                    <input type="text" class="form-control" id="lugar" name="lugar" required placeholder="Bogotá, Cundinamarca"> </div>
                <div class="form-group col-lg-3 col-md-3 col-sm-6 col-xs-12">
                    <label for="exampleInputEmail1">Fecha de Nacimiento*</label>
                    <input type="text" name="date" class="form-control tcal" placeholder="2016-08-06" /> </div>
                <div class="form-group col-lg-3 col-md-3 col-sm-6 col-xs-12">
                    <label for="exampleInputEmail1">Edad</label>
                    <input type="text" class="form-control" required id="edad" onkeypress="return solonumeros(event)" name="edad" placeholder="34"> </div>
            </div>
            <div class="form-group col-lg-12 col-md-12 col-sm-12 col-xs-12">
                <h4>Información de Contacto</h4> </div>
            <div class="row">
                <div class="form-group col-lg-3 col-md-3 col-sm-6 col-xs-12">
                    <label for="exampleInputEmail1">Email*</label>  
                    <input type="text" pattern="^[a-zA-Z0-9.!#$%&'*+/=?^_`{|}~-]+@[a-zA-Z0-9-]+(?:\.[a-zA-Z0-9-]+)*$" class="form-control" id="correo" name="correo" required/></div>
                <div class="form-group col-lg-3 col-md-3 col-sm-6 col-xs-12">
                    <label for="exampleInputEmail1">Teléfono Movil*</label>
                    <input type="" class="form-control" id="" name="celular" required onkeypress="return solonumeros(event)" placeholder="3150025865"> </div>
                <div class="form-group col-lg-3 col-md-3 col-sm-6 col-xs-12">
                    <label for="exampleInputEmail1">Telefóno fijo</label>
                    <input type="text" class="form-control" name="telefono" required onkeypress="return solonumeros(event)"placeholder="3150025"> </div>
                <div class="form-group col-lg-3 col-md-3 col-sm-6 col-xs-12">
                    <label for="exampleInputEmail1">Ciudad/Departamento</label>
                    <input type="text" class="form-control" id="" name="ciudad" required placeholder="Bogotá/Cundinamarca"> </div>
            </div>
            <div class="row">
                <div class="form-group col-lg-3 col-md-3 col-sm-6 col-xs-12">
                    <label for="exampleInputEmail1">Barrio</label>
                    <input type="text" class="form-control" id="" name="barrio" required placeholder="La pradera"> </div>
                <div class="form-group col-lg-3 col-md-3 col-sm-6 col-xs-12">
                    <label for="exampleInputEmail1">Direccion de Residencia*</label>
                    <input type="tetx" class="form-control" id="" name="dirreccion" required placeholder="Calle 12 #23 -67"> </div>
                <div class="form-group col-lg-3 col-md-3 col-sm-6 col-xs-12">
                    <label for="exampleInputEmail1" class="trans">.</label>
                    <br>
                    <button class="btn btn-blue">Ubica tu Dirección</button>
                </div>
            </div>
            <div class="row">
                <div class="form-group col-lg-3 col-md-3 col-sm-6 col-xs-12">
                    <label for="exampleInputEmail1">Adjunta los siguientes documentos</label>
                    <input type="file" class="form-control upload" name="file" id="cpink" placeholder="Hoja de vida" required> </div>
                <div class="form-group col-lg-3 col-md-3 col-sm-6 col-xs-12">
                    <label for="exampleInputEmail1" class="trasn">.</label>
                    <input type="file" class="form-control" id="cbluesky" name="file" placeholder="Cedula de cidadania" required> </div>
            </div>
            <div class="row">
                <div class="col-lg-12">
                    <input type="checkbox" style="margin:5px;" required="required"/>
                    <label for="">Acepto términos y condiciones</label>
                </div>
            </div>
            <div class="row">
                <button type="submit" class="btn btn-orange btn-center">ENVIAR</button>
            </div>
        </form>
    </div>
    
  