<!DOCTYPE html>
<!-- saved from url=(0042)http://getbootstrap.com/examples/carousel/ -->
<html lang="en"><head><meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
    
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="">
    <meta name="author" content="">
    <link rel="icon" href="">

    <title>People</title>

    <!-- Bootstrap core CSS -->
    <link href="<?=base_url()?>assets/css/bootstrap.min.css" rel="stylesheet">
    <link href="<?=base_url()?>assets/./css/ie10-viewport-bug-workaround.css" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-select/1.10.0/css/bootstrap-select.min.css">
    <!-- Just for debugging purposes. Don't actually copy these 2 lines! -->
    <!--[if lt IE 9]><script src="../../assets/js/ie8-responsive-file-warning.js"></script><![endif]-->
    <script src="<?=base_url()?>assets/./js/ie10-viewport-bug-workaround.js"></script>
    <link href="<?=base_url()?>assets/css/carousel.css" rel="stylesheet">
    <link rel="stylesheet" href="<?=base_url()?>assets/font/fuente.css">
    <link href="<?=base_url()?>assets/css/main.css" rel="stylesheet" >
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
                    <li><a href="<?= base_url('index.php/web_professional/profesional');?>">Inicio</a></li>
                    <li><a href="#">Servicios</a></li>
                    <li><a href="#">Clientes</a></li>
                    <li><a href="#">Nosotros</a></li>
                    <li><a href="">Trabaja con Nosotros</a></li>
                    <li><a href="#">Contacto</a></li>
                    <li class="dropdown"> <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false"><?php echo $this->session->userdata('first_name');?><span class="caret"></span></a>
                        <ul class="dropdown-menu">
                            <li><a href="<?= base_url('index.php/web_professional/mensaje');?>">mensaje</a></li>
                            <li><a href="<?= base_url('index.php/web_professional/edit_perfil');?>">Editar Perfil</a></li>
                            <li><a href="#">Something else here</a></li>
                            <li role="separator" class="divider"></li>
                            <li><a href="<?=base_url('index.php/web_home/logout');?>">cerrar sesion</a></li>
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
          <h2 class="tittleblue">Perfil de Usuario</h2>
          <div class="col-lg-12"><img src="<?=base_url()?>assets/ico/icoperfil.png"  class="center-block" alt="imagen_de_perfil" width="150px">
          </div>
      </div>
<div class="container">
        <div class="col-lg-12">
            <h2 class="tittleblue">Bienvenido a Nuestra plataforma</h2>
            <p>Para prestar nuestros servicios, completa la siguiente información, solo tardarás un minuto. Pronto informaremos la aprobación de tu registro.</p>
        </div>
        <form action='' class="formstyle"  method="post" enctype="multipart/form-data">
         <?php foreach($profe as $co):?>
            <div class="row">
                <div class="form-group col-lg-3 col-md-3 col-sm-6 col-xs-12">
                    <label for="exampleInputEmail1">Prestaré el servicio como:*</label>
                    <input type="text" class="form-control" id="profesion" name="profesion" value="<?php echo $co['charge_applies']?>" readonly=”readonly” >  </div>
                </div>
            </div>
            <div class="form-group col-lg-12 col-md-12 col-sm-12 col-xs-12">
                <h4>Información General</h4> </div>
            <div class="row">
                <div class="form-group col-lg-3 col-md-3 col-sm-6 col-xs-12">
                    <label for="exampleInputEmail1">Nombres</label>
                    <input type="" class="form-control" id="nombre" name="nombre" value="<?php echo $this->session->userdata('first_name')?>" required placeholder="Luis Ejemplo"> </div>
                <div class="form-group col-lg-3 col-md-3 col-sm-6 col-xs-12">
                    <label for="exampleInputEmail1">Apellidos</label>
                    <input type="" class="form-control" id="apellido" name="apellido" value="<?php echo $this->session->userdata('last_name')?>" required placeholder="Perez Perez"> </div>
                <div class="form-group col-lg-3 col-md-3 col-sm-6 col-xs-12">
                    <label for="exampleInputEmail1">Tipo de identificación</label>
                   <input type="" class="form-control" required id="cedula" name="identidad" value="<?php echo $co['value']?>" placeholder="cedula de ciudadania"  readonly=”readonly” > 
                </div>
                <div class="form-group col-lg-3 col-md-3 col-sm-6 col-xs-12">
                    <label for="exampleInputEmail1">Número identificación</label>
                    <input type="" class="form-control" required id="cedula" name="cedula" " placeholder="1016007812" value="<?php echo $co['identification_number']?>" readonly=”readonly” > </div>
            </div>
            <div class="row">
                <!--div class="form-grou' col-lg-3 col-md-3 col-sm-6 col-xs-12" id="datetimepicker1">
         
         
          <input type="" class="form-control" placeholder="Calle 16 a N° 136 - 00">
         <img src="ico/icoeditar.png" class="icoedit" alt="">
          </div-->
                <div class="col-lg-3 col-md-3 col-sm-6 col-xs-12">
                    <label for="exampleInputEmail1">Fecha de Expedición</label>
                    <input type="text" name="fecha_expedicion" class="form-control tcal" placeholder="2016-08-06" value="<?php echo $co['expedition_date']?>" readonly=”readonly”/> </div>
                <div class="form-group col-lg-3 col-md-3 col-sm-6 col-xs-12">
                    <label for="exampleInputEmail1">Lugar de Nacimiento</label>
                    <input type="text" class="form-control" id="lugar" name="lugar" value="<?php echo $co['birth_place']?>"  readonly=”readonly”> </div>
                <div class="form-group col-lg-3 col-md-3 col-sm-6 col-xs-12">
                    <label for="exampleInputEmail1">Fecha de Nacimiento*</label>
                    <input type="text" name="date" class="form-control tcal" placeholder="2016-08-06"  value="<?php echo $co['birth_date']?>" readonly=”readonly”/> </div>
                <div class="form-group col-lg-3 col-md-3 col-sm-6 col-xs-12">
                    <label for="exampleInputEmail1">Edad</label>
                    <input type="text" class="form-control" required id="edad"  readonly=”readonly” value="<?php echo $co['age']?>" name="edad" placeholder="34"> </div>
            </div>
            <div class="form-group col-lg-12 col-md-12 col-sm-12 col-xs-12">
                <h4>Información de Contacto</h4> </div>
            <div class="row">
                <div class="form-group col-lg-3 col-md-3 col-sm-6 col-xs-12">
                    <label for="exampleInputEmail1">Email*</label>  
                    <input type="text" pattern="^[a-zA-Z0-9.!#$%&'*+/=?^_`{|}~-]+@[a-zA-Z0-9-]+(?:\.[a-zA-Z0-9-]+)*$"  readonly=”readonly” class="form-control" id="correo" name="correo" value="<?php echo $this->session->userdata('email')?>" /></div>
                <div class="form-group col-lg-3 col-md-3 col-sm-6 col-xs-12">
                    <label for="exampleInputEmail1">Teléfono Movil*</label>
                    <input type="" class="form-control" id="" name="celular" required onkeypress="return solonumeros(event)" placeholder="3150025865"  value="<?php echo $this->session->userdata('phone_movil')?>" > </div>
                <div class="form-group col-lg-3 col-md-3 col-sm-6 col-xs-12">
                    <label for="exampleInputEmail1">Telefóno fijo</label>
                    <input type="text" class="form-control" name="telefono" required onkeypress="return solonumeros(event)" placeholder="3150025" value="<?php echo $this->session->userdata('phone')?>"> </div>
                <div class="form-group col-lg-3 col-md-3 col-sm-6 col-xs-12">
                    <label for="exampleInputEmail1">Ciudad/Departamento</label>
                    <input type="text" class="form-control" id="" name="ciudad"  placeholder="Bogotá/Cundinamarca"  readonly=”readonly” value="<?php echo $co['department']?>"> </div>
            </div>
             
            <div class="row">
                <div class="form-group col-lg-3 col-md-3 col-sm-6 col-xs-12">
                    <label for="exampleInputEmail1">Barrio</label>
                    <input type="text" class="form-control" id="" name="barrio" required placeholder="La pradera" value="<?php echo $co['city']?>"> </div>
                <div class="form-group col-lg-3 col-md-3 col-sm-6 col-xs-12">
                    <label for="exampleInputEmail1">Direccion de Residencia*</label>
                    <input type="tetx" class="form-control" id="" name="dirreccion" required placeholder="Calle 12 #23 -67" value="<?php echo $co['address']?>"> </div>
                <div class="form-group col-lg-3 col-md-3 col-sm-6 col-xs-12">
                    <label for="exampleInputEmail1" class="trans">.</label>
                    <br>
                    <button class="btn btn-blue">Ubica tu Dirección</button>
                     <?php endforeach;?>
                </div>
            </div>
            <div class="row">
                <div class="form-group col-lg-3 col-md-3 col-sm-6 col-xs-12">
                    <label for="exampleInputEmail1">Adjunta los siguientes documentos</label>
                    <input type="file" class="form-control upload" name="file[]" id="cpink" placeholder="Hoja de vida"> </div>
                <div class="form-group col-lg-3 col-md-3 col-sm-6 col-xs-12">
                    <label for="exampleInputEmail1" class="trasn">.</label>
                    <input type="file" class="form-control" id="cbluesky" name="file[]" placeholder="Cedula de cidadania" > </div>
            </div>
            
            <div class="row">
                <button type="submit" class="btn btn-orange btn-center">ENVIAR</button>
            </div>
        </form>
    </div>
    



