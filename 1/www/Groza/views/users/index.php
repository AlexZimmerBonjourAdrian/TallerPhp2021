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
  <div id="Background" > 
<div class="container mt-3">
      <div class="card text-center">
        <div class="card-header">
          <h3 class="card-title">Te registrarás como:</h3>
        </div>
        <div class="row justify-content-center">
          <div class="col-4">
    
            <div class="card-body">
              <h5 class="card-title">Proveedor</h5>
    
              <a href="<?php echo ROOT_URL; ?>users/registerProveedor" class="btn btn-outline-primary">Registrar proveedor</a>
            </div>
          </div>
          <div class="col-4">
            <div class="card-body">
              <h5 class="card-title">Cliente</h5>
    
              <a href="<?php echo ROOT_URL; ?>users/registerCliente" class="btn btn-outline-primary">Registrar cliente</a>
            </div>
     
        </div>
        </div>
      </div>
    </div>
</body>
</html>
