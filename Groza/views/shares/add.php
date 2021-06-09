<div class="panel panel-default">
 <div class="panel heading">
<h3 class="panel-title"> agregar Recursos<h3>
</div>
<div class="panel-body">
 <form method="post" action="<?php $_SERVER['PHP_SELF']; ?>" enctype="multipart/forma-data">
<div class="form-group">
	<label>Nombre</label>
	<input type="text" name="Nombre" class="form-control" />
</div>
<!--
<div class="form-group">
<input type="radio" id="NSuscrip" name="Suscrip" value="0" class="form-control">
<label for="NSuscrip">Gratis</label><br>
<input type="radio" id="Suscrip" name ="Suscrip" value="1" class="form-control">

-->
<div class="form-group">
		<p>Elija el Tipo de Recurso</p>
  		<input type="radio" id="Libro" name="Tipo" value="Libro " class="form-control">
  		<label for="Libro">Libro</label><br>
  		<input type="radio" id="AudioLibro" name="Tipo" value="AudioLibro" class="form-control">
  		<label for="AudioLibro">AudioLibro</label><br>
  		<input type="radio" id="Revista" name="Tipo" value="Revista" class="form-control">
  		<label for="Revista">Revista</label>
		<input type="radio" id="Podcast" name="Tipo" value="Podcast" class="form-control">
  		<label for="Podcast">Podcast</label><br>
		<input type="radio" id="Documento" name="Tipo" value="Documento" class="form-control">
  		<label for="Documento">Documento</label><br>
		<br>  
		</div>


 </div>
 </div>