<!-- NAVBAR
<?=base_url()?>assets/
================================================== --> 
<body>
    <nav id="headerwhite" class="navbar navbar-default peopleheader animated fadeInDown displaynone">
        <div class="container-fluid">
            <!-- Brand and toggle get grouped for better mobile display -->
            <div class="navbar-header">
                <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#bs-example-navbar-collapse-1" aria-expanded="false"> <span class="sr-only">Toggle navigation</span> <span class="icon-bar"></span> <span class="icon-bar"></span> <span class="icon-bar"></span> </button> <a class="navbar-brand" href="#"><img src="<?=base_url()?>assets/ico/LogoQuickwhite.png" id="logoquick" alt=""></a> </div>
            <!-- Collect the nav links, forms, and other content for toggling-->
            <div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
                <ul class="nav navbar-nav navbar-right">
                    <li><a href="<?=base_url('index.php/web_home');?>">Inicio</a></li>
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
    <div class="navbar-wrapper">
        <div class="container-fluid">
            <div id="logoquick"><img src="<?=base_url()?>assets/ico/logopeople.png" alt=""></div>
            <nav class="navbar navbar-inverse pull-right homeNavbar nav-conte">
                <div class="container">
                    <div class="navbar-header">
                        <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#navbar" aria-expanded="false" aria-controls="navbar"> <span class="sr-only">Toggle navigation</span> <span class="icon-bar"></span> <span class="icon-bar"></span> <span class="icon-bar"></span> </button>
                    </div>
                    <div id="navbar" class="navbar-collapse collapse">
                        <ul class="nav navbar-nav ">
                            <li class="active"><a href="<?php echo base_url('index.php/web_home');?>">Inicio</a></li>
                            <li><a href="#">Servicios</a></li>
                            <li><a href="#">Clientes</a></li>
                            <li><a href="#">Nosotros</a></li>
                            <li><a href="<?=base_url('index.php/web_professional/registro');?>">Trabaja con Nosotros</a></li>
                            <li>
                                <a href="#">
                                    <button id="registro">Registrate</button>
                                </a>
                            </li>
                        </ul>
                    </div>
                </div>
            </nav>
        </div>
    </div>
    <!--------------------------------------------------------->
    <div id="myCarousel" class="carousel slide" data-ride="carousel">
        <!-- Indicators -->
        <ol class="carousel-indicators">
            <li data-target="#myCarousel" data-slide-to="0" class=""></li>
            <li data-target="#myCarousel" data-slide-to="1" class="active"></li>
            <li data-target="#myCarousel" data-slide-to="2" class=""></li>
        </ol>
        <div class="carousel-inner" role="listbox">
            <div class="item"> <img class="first-slide" src="<?=base_url()?>assets/images/Home_fond.png" alt="First slide">
                <div class="container">
                    <div class="carousel-caption">
                        <h1>Talento Confiable para tu Empresa</h1>
                        <p>Estudio de Confiabilidad, Referenciación Financiera, Visitas Domiciliarias, Poligrafía, y Exámenes Médicos Ocupacionales</p>
                    </div>
                </div>
            </div>
            <div class="item active"> <img class="second-slide" src="<?=base_url()?>assets/images/home-fond2.png" 2 alt="Second slide">
                <div class="container">
                    <div class="carousel-caption">
                        <h1>Talento Confiable para tu Empresa</h1>
                        <p>Te garantizamos personal Idóneo, Confiable y Seguro  en cualquier fase del ciclo de Vida Laboral o Corporativo.</p>
                    </div>
                </div>
            </div>
            <div class="item"> <img class="third-slide" src="<?=base_url()?>assets/images/Home_fond.png" alt="Third slide">
                <div class="container">
                    <div class="carousel-caption">
                        <h1>Talento Confiable para tu Empresa</h1>
                        <p>Contamos a nivel Nacional con la más amplia Red de Especialistas que asegurarán la Idoneidad y Confiabilidad de tu Talento</p>
                    </div>
                </div>
            </div>
        </div>
        <a class="left carousel-control" href="http://getbootstrap.com/examples/carousel/#myCarousel" role="button" data-slide="prev"> <span class="glyphicon glyphicon-chevron-left" aria-hidden="true"></span> <span class="sr-only">Previous</span> </a>
        <a class="right carousel-control" href="http://getbootstrap.com/examples/carousel/#myCarousel" role="button" data-slide="next"> <span class="glyphicon glyphicon-chevron-right" aria-hidden="true"></span> <span class="sr-only">Next</span> </a>
        <div id="tipocliente" class="center-block">
            <form class="form-inline" id="tipoclienteform" action='<?php echo base_url('/index.php/web_home/verify');?>' method="post">
                <div class="form-group">
                    <div class="btn-group">
                        <button type="button" class="btn btn-gray dropdown-toggle" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" id="tipobutton">Tipo <img src="<?=base_url()?>assets/ico/caret.png"> </button>
                        <ul class="dropdown-menu">
                            <li><a href="#">Soy Cliente</a></li>
                            <li><a href="#">Soy Prestador</a></li>
                        </ul>
                    </div>
                
                    <input type="text" class="form-control" id="email"  pattern="^[a-zA-Z0-9.!#$%&'*+/=?^_`{|}~-]+@[a-zA-Z0-9-]+(?:\.[a-zA-Z0-9-]+)*$" name="email" placeholder="Usuario" required>
                    <input type="password" class="form-control" id="password" name="password" placeholder="contraseña" required>
                    <button type="submit" class="btn btn-blue">Ingresar </button>
                    
                    
                    <button type="submit" class="btn btn-orange">Ver Precios y Reservar</button>
                </div>
         </form>
        </div>
    </div>
    <!------------------------------------------------------>
    <div id="ServicesPages">
        <div class="container">
            <h2 class="tittleblue">¿Qué Servicios Puedes Encontrar en PeopleQuick?</h2>
            <div class="Qservicios row">
                <div class="col-lg-3 col-md-3 col-sm-3 col-xs-6 "> <img src="<?=base_url()?>assets/images/services_1.png" class="img-responsive" alt="">
                    <div class="servicestext" id="confiabilidad">
                        <h4>Estudio de Confiabilidad </h4>
                        <p class="hidden-xs"> Verificamos las Referencias Personales, Laborales, Academicas y Bases de Datos de Tu Personal. Adicional realizamos la Referención Financiera </p>
                    </div>
                </div>
                <div class="col-lg-3 col-md-3 col-sm-3 col-xs-6 "> <img src="<?=base_url()?>assets/images/services_2.png" class="img-responsive" alt="">
                    <div class="servicestext" id="domiciliaria">
                        <h4>Visita Domiciliaria </h4>
                        <p class=" hidden-xs"> Constatamos la realidad socioeconómica en el Domicilio, analizando el entorno e interacciónes familiares así como su estilo de vida. </p>
                    </div>
                </div>
                <div class="col-lg-3 col-md-3 col-sm-3 col-xs-6 "> <img src="<?=base_url()?>assets/images/services_3.png" class="img-responsive" alt="">
                    <div class="servicestext" id="poligrafia">
                        <h4>Poligrafía </h4>
                        <p class=" hidden-xs"> Examinamos la veracidad con Poligrafos de Pre-empleo, Rutina o Específicos. Implmentamos Tecnología de Eye Detect. </p>
                    </div>
                </div>
                <div class="col-lg-3 col-md-3 col-sm-3 col-xs-6 "> <img src="<?=base_url()?>assets/images/services_4.png" class="img-responsive" alt="">
                    <div class="servicestext" id="examen">
                        <h4>Exámen Médico Ocupacional</h4>
                        <p class=" hidden-xs"> Verificamos mediante exámenes de Ingreso, Periódicos, Egreso y Post-incapacidad la condición de salud y riesgos asociados. </p>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div id="howitworks">
        <div class="container-fluid">
            <h2 class="tittleblue">¿Cómo funciona?</h2>
            <div class="Qservicios row">
                <div class="col-lg-3 col-md-3 col-sm-3 col-xs-6"> <img src="<?=base_url()?>assets/ico/como_1.png" class="img-responsive" alt="">
                    <p>Preselecciona el talento a evaluar y diligencia la solicitud en la plataforma </p>
                </div>
                <div class="col-lg-3 col-md-3 col-sm-3 col-xs-6"> <img src="<?=base_url()?>assets/ico/como_2.png" class="img-responsive" alt="">
                    <p> Nuestra Sistema Agenda automaticamente y por Georreferenciación a los evaluadores</p>
                </div>
                <div class="col-lg-3 col-md-3 col-sm-3 col-xs-6"> <img src="<?=base_url()?>assets/ico/como_3.png" class="img-responsive" alt="">
                    <p>En tiempo real nuestros profesionales elaborarán y registrarán los informes en la plataforma</p>
                </div>
                <div class="col-lg-3 col-md-3 col-sm-3 col-xs-6"> <img src="<?=base_url()?>assets/ico/como_4.png" class="img-responsive" alt="">
                    <p>Podrás consultar on-line y en cualquier momento los resultados de las Pruebas y Alertas </p>
                </div>
            </div>
        </div>
    </div>
    <div id="quickhelp">
        <div class="container-fluid">
            <div class="col-lg-6 col-md-6 col-sm-6 col-xs-12 helpwidth"><img src="<?=base_url()?>assets/ico/logo_orange.png" class="logo"></div>
            <div class="col-lg-6 col-md-6 col-sm-6 col-xs-12 helpwidth texthelp">
                <h3>People Quick te Ayuda a Verificar la Idoneidad y Confiabilidad de tu Talento Humano</h3>
                <p>Contamos con la más amplia Red de Especialistas que ejecutan para tu empresa y en cualquier fase del Ciclo de Vida Laboral, los servicios de Estudios de Confiabilidad, Referenciación Financiera,  Visitas Domiciliarias, Poligrafías y Exámenes Médicos Ocupacionales.</p>
                <p>Realizamos de forma Ágil y Eficiente estos procesos contribuyendo a la dinámica de productividad que nuestros clientes necesitan.</p>
                <div class="download col-lg-12 col-md-12 col-sm-12 col-xs-12">
                    <h5>Descarga Nuestra App, y asegura la Idoneidad y Confiabilidad!</h5>
                    <a href=""><img src="<?=base_url()?>assets/ico/btn-googleplay.png" alt="google-play"></a>
                    <a href=""><img src="<?=base_url()?>assets/ico/btn_appstore.png" alt="app-store"></a> <a href="" class="btn btn-orange">CONOCE MÁS</a></div>
            </div>
        </div>
    </div>
    <div id="beneficios">
        <div class="container-fluid">
            <h2 class="tittleblue">Nuestros Clientes Obtendrán Más Beneficios</h2>
            <div class="row ">
                <div class="col-lg-3 col-md-3 col-sm-6 col-xs-12 text-center"> <img src="<?=base_url()?>assets/ico/beneficio-1.png" class="center-block" alt="">
                    <div class="text-center textbeneficio">
                        <h4>AHORRO DE TIEMPO</h4>
                        <p> Consulta los resultados de las evaluaciones en máximo 2 días </p>
                    </div>
                </div>
                <div class="col-lg-3 col-md-3 col-sm-6 col-xs-12 text-center"> <img src="<?=base_url()?>assets/ico/beneficio-2.png" class="center-block" alt="">
                    <div class="text-center textbeneficio">
                        <h4>COBERTURA NACIONAL</h4>
                        <p> Contamos en LATAM con la más amplia red de especialistas </p>
                    </div>
                </div>
                <div class="col-lg-3 col-md-3 col-sm-6 col-xs-12"> <img src="<?=base_url()?>assets/ico/beneficio-3.png" class="center-block" alt="">
                    <div class="text-center textbeneficio">
                        <h4>ALERTAS TEMPRANAS</h4>
                        <p> Te informamos de inmediato si evidenciamos novedades en el proceso </p>
                    </div>
                </div>
                <div class="col-lg-3 col-md-3 col-sm-6 col-xs-12 text-center"> <img src="<?=base_url()?>assets/ico/beneficio-4.png" class="center-block" alt="">
                    <div class="text-center textbeneficio">
                        <h4>GEOREFERENCIACIÓN PARA TU TALENTO</h4>
                        <p> Los proceso se realiczan más cerca de la residencia del evaluado </p>
                    </div>
                </div>
                <div class="row"> </div>
                <div class="col-lg-3 col-md-3 col-sm-6 col-xs-12 text-center"> <img src="<?=base_url()?>assets/ico/beneficio-5.png" alt="">
                    <div class="text-center textbeneficio">
                        <h4>CONSULTA DE INFORMES ON-LINE</h4>
                        <p> Revisa en cualquier momento y lugar los resultados de las evaluaciones </p>
                    </div>
                </div>
                <div class="col-lg-3 col-md-3 col-sm-6 col-xs-12 text-center"> <img src="<?=base_url()?>assets/ico/beneficio-6.png" alt="">
                    <div class="text-center textbeneficio">
                        <h4>REVISIÓN DE TUS HISTÓRICOS</h4>
                        <p> Consulta la información de todos tus servicios solicitados </p>
                    </div>
                </div>
                <div class="col-lg-3 col-md-3 col-sm-6 col-xs-12 text-center"> <img src="<?=base_url()?>assets/ico/beneficio-7.png" alt="">
                    <div class="text-center textbeneficio">
                        <h4>TARIFAS ESTANDAR</h4>
                        <p> Contarás con una sola tarifa al nivel nacional. </p>
                    </div>
                </div>
                <div class="col-lg-3 col-md-3 col-sm-6 col-xs-12 text-center"> <img src="<?=base_url()?>assets/ico/beneficio-8.png" alt="">
                    <div class="text-center textbeneficio">
                        <h4>REDUCCIÓN DE COSTOS</h4>
                        <p> Nuestros volumenes de negocio aseguran los mejores precios para tí </p>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div id="nuestrosservicios">
        <div class="container-fluid">
            <h2>Nuestros Servicios</h2>
            <div class="col-lg-4 col-md-4 col-sm-6 col-xs-12 text-left elem"> <img src="<?=base_url()?>assets/ico/nuestros_servicios_1.png" alt=""> </div>
            <div class="col-lg-4 col-md-4 col-sm-6 col-xs-12 text-left elem"> <img src="<?=base_url()?>assets/ico/nuestros_servicios_2.png" alt=""> </div>
            <div class="col-lg-4 col-md-4 col-sm-6 col-xs-12 text-left elem"> <img src="<?=base_url()?>assets/ico/nuestros_servicios_3.png" alt=""> </div>
            <div class="col-lg-4 col-md-4 col-sm-6 col-xs-12 text-left elem"> <img src="<?=base_url()?>assets/ico/nuestros_servicios_4.png" alt=""> </div>
            <div class="col-lg-4 col-md-4 col-sm-6 col-xs-12 text-left elem"> <img src="<?=base_url()?>assets/ico/nuestros_servicios_5.png" alt=""> </div>
            <div class="col-lg-4 col-md-4 col-sm-6 col-xs-12 text-left elem"> <img src="<?=base_url()?>assets/ico/nuestros_servicios_6.png" alt=""> </div>
        </div>
    </div>
    <div id="queremos">
        <div class="container">
            <div class="row">
                <div class="col-lg-6 col-md-6 col-sm-8 col-xs-12">
                    <h2>Queremos que nos conozcas</h2>
                    <p>Somos un Equipo de People Quicker´s, tendrás nuestro compromiso para asegurar la Idoneidad y Confiabilidad de tu Talento. </p>
                    <p>Orgullosamente hacemos parte del Grupo Quick, Organización Empresarial de gran reconocimiento en Colombia que se proyecta como una de las Corporaciones de mayor impacto y crecimiento en Latinoamérica.</p>
                </div>
            </div>
            <div class="row imgquerer">
                <div class="col-lg-2 col-md-3 col-sm-4 col-xs-6"><img src="<?=base_url()?>assets/ico/logo-grupo-quick.png" alt="" class="img-responsive"></div>
                <div class="col-lg-2 col-md-3 col-sm-4 col-xs-6"><img src="<?=base_url()?>assets/ico/logo-quick-help-grupo-quick.png" alt="" class="img-responsive"></div>
                <div class="col-lg-2 col-md-3 col-sm-4 col-xs-6"><img src="<?=base_url()?>assets/ico/logo-quick-and-clean-grupo-quick.png" alt="" class="img-responsive"></div>
                <div class="col-lg-2 col-md-3 col-sm-4 col-xs-6"><img src="<?=base_url()?>assets/ico/logo-people-quick-grupo-quick.png" alt="" class="img-responsive"></div>
                <div class="col-lg-2 col-md-3 col-sm-4 col-xs-6"><img src="<?=base_url()?>assets/ico/logo-smart-quick-grupo-quick.png" alt="" class="img-responsive"></div>
                <div class="col-lg-2 col-md-3 col-sm-4 col-xs-6"><img src="<?=base_url()?>assets/ico/logo-belavenko.png" alt="" class="img-responsive"></div>
            </div>
        </div>
    </div>
    <div id="contactanos">
        <div class="container">
        <form action='<?php echo base_url('/index.php/web_home/emailContac');?>'  method="post" >
            <h2 class="tittleblue">Contáctanos</h2>
            <h3>Cuéntanos tus Necesidades</h3>
            <div class="row formcontac">
                <div class="col-lg-4">
                    <input type="text" name="nombre" placeholder="Nombre" required> </div>
                <div class="col-lg-4">
                    <div class="dropdown">
                        <button class="btn btn-default dropdown-toggle col-lg-2" type="button" id="dropdownMenu1" data-toggle="dropdown" aria-haspopup="true" aria-expanded="true"> Seleccione su servicio de interes <span class="caret"></span> </button>
                        <ul class="dropdown-menu" aria-labelledby="dropdownMenu1">
                            <li><a href="#">Action</a></li>
                            <li><a href="#">Another action</a></li>
                            <li><a href="#">Something else here</a></li>
                            <li role="separator" class="divider"></li>
                            <li><a href="#">Separated link</a></li>
                        </ul>
                    </div>
                </div>
                <div class="col-lg-4">
                    <div class="dropdown">
                        <button class="btn btn-default dropdown-toggle col-lg-2" type="button" id="dropdownMenu1" data-toggle="dropdown" aria-haspopup="true" aria-expanded="true"> Seleccione el tamaño de la empresa <span class="caret"></span> </button>
                        <ul class="dropdown-menu" aria-labelledby="dropdownMenu1">
                            <li><a href="#">Action</a></li>
                            <li><a href="#">Another action</a></li>
                            <li><a href="#">Something else here</a></li>
                            <li role="separator" class="divider"></li>
                            <li><a href="#">Separated link</a></li>
                        </ul>
                    </div>
                </div>
            </div>
            <div class="row formcontac">
                <div class="col-lg-4">
                    <input type="text" name="empresa" placeholder="Empresa" required>
                    <input type="text" name="correo" placeholder="E-mail" required>
                    <input type="text" name="telefono" placeholder="Telefono" required> </div>
                <div class="col-lg-8">
                    <textarea name="comentario" id="comentario" rows="4"></textarea>
                </div>
            </div>
            <button type="submit" class="btn btn-gray btn-center text-uppercase">Enviar</button>
            </form>
            <div id="tel">
                <div class="row btn-center"> <img src="<?=base_url()?>assets/ico/icotelefono.png" alt="">
                    <label for="">(571) 747 0547</label>
                </div>
                <div class="row btn-center"> <img src="<?=base_url()?>assets/ico/icomail.png" alt="">
                    <label for="">sac@peoplequick.com</label>
                </div> <img src="<?=base_url()?>assets/ico/icofacebook.png" alt=""> <img src="<?=base_url()?>assets/ico/icotwitter.png" alt=""> <img src="<?=base_url()?>assets/ico/icoyoutube.png" alt=""> <img src="<?=base_url()?>assets/ico/icolink.png" alt=""> </div>
        </div>
    </div>
    <div id="buscasazul">
        <div class="container">
            <h2>¿Buscas trabajo en People Quick?</h2>
            <button class="btn btn-center btn-white">Registrate ahora</button>
        </div>
    </div>
    <div id="oficinas">
        <div class="container-fluid">
            <h2 class="tittleblue">Oficinas</h2>
            <div class="row">
                <div class="col-lg-4 col-md-4 col-sm-4 col-xs-6">
                    <h4>BOGOTÁ</h4>
                    <h5>PBX. (1) 747 0547</h5>
                    <p>Carrera 92 No. 64C 12 Cedi Quick</p>
                </div>
                <div class="col-lg-4 col-md-4 col-sm-4 col-xs-6">
                    <h4>CALI</h4>
                    <h5>379 9556 – 379 9557</h5>
                    <p>Avenida 6 Norte No. 50 N – 48 Barrio La Flora</p>
                </div>
                <div class="col-lg-4 col-md-4 col-sm-4 col-xs-6">
                    <h4>MEDELLÍN</h4>
                    <h5>366 2882</h5>
                    <p>Carrera 66 Nº 49 B – 20 OF.217</p>
                </div>
                <div class="col-lg-4 col-md-4 col-sm-4 col-xs-6">
                    <h4>BARRANQUILLA</h4>
                    <h5>385 5569</h5>
                    <p>Cra. 54 Nº 70 – 69 Local 103 Edificio Prado 54</p>
                </div>
                <div class="col-lg-4 col-md-4 col-sm-4 col-xs-6">
                    <h4>BUENAVENTURA</h4>
                    <h5>379 9556 – 379 9557</h5>
                    <p>Avenida 6 Norte No. 50 N – 48 Barrio La Flora</p>
                </div>
                <div class="col-lg-4 col-md-4 col-sm-4 col-xs-6">
                    <h4>CARTAGENA</h4>
                    <h5>310 262 2051</h5>
                    <p>Callejón Fidel Cano No. 21 a – 05 Barrio El Bosque</p>
                </div>
                <div class="col-lg-4 col-md-4 col-sm-4 col-xs-6 col-lg-offset-4 col-md-offset-4 col-sm-offset-4">
                    <h4>BUCARAMANGA</h4>
                    <h5>643 1228</h5>
                    <p>Carrera. 35 A No. 51 – 43 Local 203 Edificio Rueda</p>
                </div>
                <div class="col-lg-offset-1 col-lg-10 col-md-12 col-sm-12 col-xs-12" id="cobertura">
                    <h4>Cobertura en toda Colombia</h4>
                    <h5>San Andrés – Santa Marta – Barranquilla – Cartagena – Montería – Valledupar – Sincelejo – Cúcuta – Bucaramanga – Medellín – Manizales – Pereira – Armenia – Cali – Bogotá – Ibagué – Pasto - Tunja – Buenaventura – Duitama – Florencia – Neiva – Villavicencio – Yopal</h5> </div>
            </div>
        </div>
    </div>