
<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<title>Document</title>
</head>
<body>
<form method="post" action="<?php echo ROOT_URL; ?>articulos/buscar"  enctype="multipart/form-data">
          <div>
            
              <input id="nombre" type="text" name="nombre" class="form-control" placeholder="Que desea buscar..." />
           
            
            <button class="btn btn-dafault" id="submit" name="submit" type="submit">Buscar</button>
            </div>
          
    </form>
	
</div>



	
<?php if(isset($_SESSION['is_logged_in'])) : ?>
<?php if(isset($_SESSION['es_proveedor'])) : ?>	

	<a class="btn btn-success btn-share" href="<?php echo ROOT_PATH; ?>Articulos/add">Agregar Articulos</a>
	<?php endif; ?>
	

	<!DOCTYPE html>
	<html lang="en">
	<head>
		<meta charset="UTF-8">
		<meta http-equiv="X-UA-Compatible" content="IE=edge">
		<meta name="viewport" content="width=device-width, initial-scale=1.0">
		<title>Document</title>
	</head>
	<body>

	<?php foreach($viewmodel as $item) : ?>
	<?php if(isset($item['TipoPlan'])===isset($_SESSION['suscripcion']['tipoPlan']) || isset($_SESSION['es_proveedor'])  ) ?>
		<div class="container" id="ribbon" class="container-fluid">
		<div class="row text-blue" >
		<div class="well mt-5">
			<div class="container p-3 mb-2 bg-success text-white" >
			
			<h3 class="mb-0 " ><?php echo $item['NomRec']; ?></h3>
			<p class="mb-0" ><?php echo $item['Tipo']; ?></p>
			<p class="mb-0"><?php echo $item['TipoPlan']?></p>
			<p class="mb-0"><?php echo $item['Descrip']; ?></p>
			</div>
			<br />
			<?php if($item ['Enlace'])?>
				<a class="btn btn-default mb-2 bg-info text-white" href="<?php echo $item['Enlace'] ?>" target="_blank">Descárgame!</a>
			
	<?php endforeach; ?>
	</div>
	</div>
	</div>
	<?php endif; ?>
</div>
</body>
</html>
<div>	

