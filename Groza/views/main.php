<html>
<head>
	<title>Shareboard</title>
	<link rel="stylesheet" href="<?php echo ROOT_PATH; ?>assets/css/bootstrap.css">
	<link rel="stylesheet" href="<?php echo ROOT_PATH; ?>assets/css/style.css">
  <link rel="stylesheet" href="css/bootstrap.min.css">
  <link rel="stylesheet" href="css/main.css">
</head>
<body>
	<nav class="navbar navbar-default">
      <div class="container">
        <div class="navbar-header">
          <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#navbar" aria-expanded="false" aria-controls="navbar">
            <span class="sr-only">Toggle navigation</span>
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
          </button>
          <a class="navbar-brand" href="<?php echo ROOT_URL; ?>">Shareboard</a>
        </div>
        <div id="navbar" class="collapse navbar-collapse">
          <ul class="nav navbar-nav">
            <li><a href="<?php echo ROOT_URL; ?>">Home</a></li>
            <li><a href="<?php echo ROOT_URL; ?>articulos">Articulos</a></li>
            <li><a href="<?php echo ROOT_URL; ?>suscripciones">suscripcion</a></li>
          </ul>
          <div class="col-md-5 col-sm-5 col-xs-12 form-group pull-right top_search">
       
          <ul class="nav navbar-nav navbar-right">
          <?php if(isset($_SESSION['is_logged_in'])) : ?>
             <?php if(isset($_SESSION['es_cliente'])):?>
             <li><a href="<?php echo ROOT_URL; ?>">Welcome <?php echo $_SESSION['cliente_data']['nick']; ?></a></li>
              
              <?php elseif(isset($_SESSION['es_proveedor'])):?>
              <li><a href="<?php echo ROOT_URL; ?>">Welcome <?php echo $_SESSION['proveedor_data']['nick']; ?></a></li>
              <?php endif;?>
              <li><a href="<?php echo ROOT_URL; ?>users/logout">Logout</a></li>
          <?php else : ?>
            <li><a href="<?php echo ROOT_URL; ?>users/login">Login</a></li>
            <li><a href="<?php echo ROOT_URL; ?>users">Register</a></li>
          <?php endif; ?>
          </ul>
        </div><!--/.nav-collapse -->
      </div>
    </nav>

    <div class="container">

     <div class"=row">
      <?php Messages::display(); ?>
     	<?php require($view); ?>
     </div>

    </div><!-- /.container -->
</body>
</html>