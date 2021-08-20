<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<link rel="stylesheet" href="<?php echo ROOT_PATH; ?>assets/css/bootstrap.min.css">
  <link rel="stylesheet" href="<?php echo ROOT_PATH; ?>assets/css/main.css">
	<title>Document</title>
</head>
<body>


<div id="carouselExampleIndicators" class="carousel slide" data-ride="carousel">
  <ol class="carousel-indicators">
    <li data-target="#carouselExampleIndicators" data-slide-to="0" class="active"></li>
    <li data-target="#carouselExampleIndicators" data-slide-to="1"></li>
    <li data-target="#carouselExampleIndicators" data-slide-to="2"></li>
  </ol>
  <div class="carousel-inner">
    <div class="carousel-item active">
	<img src="<?php echo ROOT_PATH; ?>assets/img/slide01.jpg" class="d-block w-100" src="..." alt="First slide">
    </div>
    <div class="carousel-item">
   <img src="<?php echo ROOT_PATH; ?>assets/img/slide02.jpg"class="d-block w-100" src="..." alt="Second slide">
    </div>
    <div class="carousel-item">
      <img src="<?php echo ROOT_PATH; ?>assets/img/slide03.jpg" class="d-block w-100" src="..." alt="Third slide">
    </div>
  </div>
  <a class="carousel-control-prev" href="#carouselExampleIndicators" role="button" data-slide="prev">
    <span class="carousel-control-prev-icon" aria-hidden="true"></span>
    <span class="sr-only">Previous</span>
  </a>
  <a class="carousel-control-next" href="#carouselExampleIndicators" role="button" data-slide="next">
    <span class="carousel-control-next-icon" aria-hidden="true"></span>
    <span class="sr-only">Next</span>
  </a>
</div>


    <div id="ribbon" class="container-fluid">
        <div id="birthday" class="container w-25 pl-5">

     <div class="row align-items-center " >
            <div class="col-sm p-3 text-light">
               
            <div>

                <div class="col-sm p-4 text-light text-center">
                    <p class="text-warning h3" >Rediseño de Pagina! </p>
                    <h4>Empeizen con nuestra suscripcion Gratuita</h4>
                </div>

            </div>
            </div>

        </div>
       
</div>

</div>


<div id="separator-ribbon">
    <div class="content bg-warning"></div>
    
        
    </div>
  </div>


  <div id="games">
    <div class="container-md p-5">
        <div class="row pt-5">
            <h3 class="text-center pb-5 pt-5 h1">Lo mas destacable</h3>
        </div>
        <div class="row">
            <div class="col-sm">
                <div class="card w-100 card-border mb-5">
                    <img src="<?php echo ROOT_PATH; ?>assets/img/card01.jpg" class="card-img-top" alt="">
                    <div class="card-body">
                    <h5 class="card-title">Mas sobre nosotros</h5>
                    <p class="card-text">Quienes somos?, Cual es nuestra mision?,Que podemos hacer por usted?</p>
                  <!--  <a href="#" class="btn btn-primary">Go somewhere</a> -->
                    </div>
                </div>
    </div>
    <div class="col-sm">
        <div class="card w-100 card-border mb-5">
            <img src="<?php echo ROOT_PATH; ?>assets/img/card02.jpg" class="card-img-top" alt="">
            <div class="card-body">
            <h5 class="card-title">Registrese es gratis!</h5>
            <p class="card-text">Acceso a todo nuestro contenido Free</p>
          <!--  <a href="#" class="btn btn-primary">Go somewhere</a> -->
            </div>
        </div>
</div>
<div class="col-sm">
    <div class="card w-100 card-border mb-5">
        <img src="<?php echo ROOT_PATH; ?>assets/img/card03.jpg" class="card-img-top" alt="">
        <div class="card-body">
        <h5 class="card-title">Vea nuestros usuarios destacados!</h5>
        <p class="card-text">La lista de los 100 mejores, actualizada todas las semanas</p>
      <!--  <a href="#" class="btn btn-primary">Go somewhere</a> -->
        </div>
    </div>
</div>
</div>

<script src="<?php echo ROOT_PATH; ?>assets/js/propper.min.js"></script>
<script src="<?php echo ROOT_PATH; ?>assets/js/bootstrap.min.js"></script>
</body>
</html>
