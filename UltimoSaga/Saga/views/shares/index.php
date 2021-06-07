
<div>
	
	<?php foreach($viewmodel as $item) : ?>
		<div class="well mt-5">
			<h3><?php echo $item['NomRec']; ?></h3>
			<?php echo '<img src="data:image/jpeg;base64,'.base64_encode($item['ImgR']).'"/>'; ?><br />
			<small><?php echo $item['Tipo']; ?></small>
			<hr />
			<p><?php echo $item['Descrip']; ?></p>
			<br />
				<?php if($item ['Descarg'])?>
				<a class="btn btn-default mb-2" href="<?php echo $item['Enlace']; ?>" target="_blank">Descárgame!</a>
			
			<a class="btn btn-primary" href="<?php echo ROOT_PATH; ?>shares/evaluar/?IdRec=<?php echo $item['IdRec']; ?>" role="button">Evaluar</a>
		
		</div>
	<?php endforeach; ?>
</div>