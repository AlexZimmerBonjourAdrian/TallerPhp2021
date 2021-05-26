<div>
	<?php if(isset($_SESSION['is_logged_in'])) : ?>
	<a class="btn btn-success btn-share" href="<?php echo ROOT_PATH; ?>shares/add">Publicar Recurso</a>
	<?php endif; ?>
	<?php foreach($viewmodel as $item) : ?>
		<div class="well">
			<h3><?php echo $item['NomRec']; ?></h3>
			<?php echo '<img src="data:image/jpeg;base64,'.base64_encode($item['ImgR']).'"/>'; ?><br />
			<small><?php echo $item['Tipo']; ?></small>
			<hr />
			<p><?php echo $item['Descrip']; ?></p>
			<br />
				<?php if($item ['Descarg'])?>
				<a class="btn btn-default" href="<?php echo $item['Enlace']; ?>" target="_blank">Descargame!</a>
		</div>
	<?php endforeach; ?>
</div>