<div>	

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
	

	<?php foreach($viewmodel as $item) : ?>
	<?php if(isset($item['TipoPlan'])===isset($_SESSION['suscripcion']['tipoPlan']) || isset($_SESSION['es_proveedor'])  ) ?>
		<div class="well mt-5">
			<h3><?php echo $item['NomRec']; ?></h3>
			<p><?php echo $item['Tipo']; ?></p>
			<p><?php echo $item['TipoPlan']?></p>
			<p><?php echo $item['Descrip']; ?></p>
			<br />
			<?php if($item ['Enlace'])?>
				<a class="btn btn-default mb-2" href="<?php echo $item['Enlace'] ?>" target="_blank">Descárgame!</a>
		</div>
	
	<?php endforeach; ?>
	<?php endif; ?>
</div>