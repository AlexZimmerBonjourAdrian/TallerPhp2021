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
<?php if(isset($_SESSION['is_logged_in'])) : ?>
    <?php if(isset($_SESSION['es_cliente'])) : ?>
  
<div class="row">
<div class="container-md p-5">

<h3 class="text-center pb-5 pt-5 h1">Bienvenido a Gold!!!<h3>

<button type="button" action="<?php echo ROOT_PATH; ?>" class="btn btn-outline-primary">Volver a Home</button>




</div>
</div>
<?php endif; ?>
<?php endif; ?>
    
</body>
</html>


<!-- Ejecutar operacion de suscripcion-->