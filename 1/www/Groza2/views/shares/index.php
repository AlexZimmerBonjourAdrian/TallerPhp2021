<div>	
<form action="<?php echo ROOT_URL; ?>shares/buscar" method="POST" enctype="multipart/form-data">
          <div>
            
              <input type="text" name="nombre" class="form-control" placeholder="Que desea buscar..." />
           
            
            <button class="btn btn-dafault" type="submit">Buscar</button>
            </div>
          
    </form>
	
</div>



	
	
	<a class="btn btn-success btn-share" href="<?php echo ROOT_PATH; ?>shares/add">Share Something</a>
	<?php foreach($viewmodel as $item) : ?>
		<div class="well mt-5">
			<h3><?php echo $item['NomRec']; ?></h3>
			<p><?php echo $item['Tipo']; ?></p>
			<p><?php echo $item['TipoPlan']?></p>
			<p><?php echo $item['Descript']; ?></p>
			<br />
			<?php if($item ['Enlace'])?>
				<a class="btn btn-default mb-2" href="<?php echo $item['Enlace']; ?>" target="_blank">Descárgame!</a>
			
			
		</div>
	<?php endforeach; ?>
</div>