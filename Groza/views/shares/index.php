<div>	
<?php if(isset($_SESSION['is_logged_in'])) : ?>
<form action="<?php echo ROOT_URL; ?>shares/buscar" method="POST" enctype="multipart/form-data">
          <div>
            
              <input type="text" name="nombre" class="form-control" placeholder="Que desea buscar..." />
           
            
            <button class="btn btn-dafault" type="submit">Buscar</button>
            </div>
          
    </form>
	
</div>
<?php endif; ?>


	
<?php if(isset($_SESSION['is_logged_in'])) : ?>
<?php if(isset($_SESSION['es_proveedor'])) : ?>	
	<a class="btn btn-success btn-share" href="<?php echo ROOT_PATH; ?>shares/add">Share Something</a>
<?php endif; ?>


	<?php foreach($viewmodel as $item) : ?>
	
		<div class="well mt-5">
			<h3><?php echo $item['NomRec']; ?></h3>
			<p><?php echo $item['Tipo']; ?></p>
			<p><?php echo $item['TipoPlan']?></p>
			<p><?php echo $item['Descrip']; ?></p>
			<br />
			<?php if($item ['Enlace'])?>
				<a href="<?php echo $item['Enlace']; ?>">Descárgame!</a>
		</div>
	<?php endforeach; ?>
	
	<?php endif; ?>
</div>