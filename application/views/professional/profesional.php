<!DOCTYPE html>
<html>
<head>
<meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="">
    <meta name="author" content="">
    <link rel="icon" href="">
    
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

	<title>People</title>
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
                    <li><a href="#">Trabaja con Nosotros</a></li>
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
<?php echo $this->session->userdata('email');?>

</body>
</html>