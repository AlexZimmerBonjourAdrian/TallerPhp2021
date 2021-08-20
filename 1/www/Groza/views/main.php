<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">

  <link rel="stylesheet" href="<?php echo ROOT_PATH; ?>assets/css/bootstrap.min.css">
  <link rel="stylesheet" href="<?php echo ROOT_PATH; ?>assets/css/main.css">
  <title>Groza Corporation</title>
</head>
<body>
<nav class="navbar navbar-expand-sm navbar-dark bg-danger">
        <div class="container-fluid">
         

            <button class="navbar-toggler" 
            type="button" 
            data-toggle="collapse" 
            data-target="#navbarSupportedContent"
            aria-controls="navbarSupportedContent"
            aria-expanded="false"
            aria-label="Toogle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>

            <div class="collapse navbar-collapse" id="navbarSupportedContent">
                <ul class="navbar-nav ml-auto">
                    <li class="nav-item"><a class="nav-link" href="<?php echo ROOT_URL; ?>">Home</a></li>
                    <li class="nav-item" ><a class="nav-link" href="<?php echo ROOT_URL; ?>articulos">articulos</a></li>
                    <li class="nav-item"><a class="nav-link"  href="<?php echo ROOT_URL; ?>suscripciones">Suscripcion</a></li>
                   
               
                
                <div class="col-md-5 col-sm-5 col-xs-12 form-group pull-right top_search">

                    <ul class="nav navbar-nav navbar-left">
          <?php if(isset($_SESSION['is_logged_in'])) : ?>
             <?php if(isset($_SESSION['es_cliente'])):?>
             <li><a href="<?php echo ROOT_URL; ?>">Welcome <?php echo $_SESSION['cliente_data']['name']; ?></a></li>
              
              <?php elseif(isset($_SESSION['es_proveedor'])):?>
              <li><a href="<?php echo ROOT_URL; ?>">Welcome <?php echo $_SESSION['proveedor_data']['name']; ?></a></li>
              <?php endif;?>
              <li><a href="<?php echo ROOT_URL; ?>users/logout">Logout</a></li>
          
          <?php else : ?>
           
            <li class="nav-item" ><a  class="nav-link" href="<?php echo ROOT_URL; ?>users/login">Login</a></li>
           
            <li class="nav-item" ><a class="nav-link" href="<?php echo ROOT_URL; ?>users">Register</a></li>
          
          <?php endif; ?>
          </ul>
        </div><!--/.nav-collapse -->
      </div>
    </nav>


        </div>

        <div class="container">

<div class"=row">
 <?php Messages::display(); ?>
  <?php require($view); ?>
</div>

</div><!-- /.container -->
</body>
</html>