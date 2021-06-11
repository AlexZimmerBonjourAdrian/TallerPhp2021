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
		 <label>Descripción</label>
		<textarea name="Descrip" class="form-control" required placeholder="Una Descripción de su Recurso ..." ></textarea>
		</div>

<!-- Agregar la configuracion de agregar la imagen si hace falta claro --> 

<div class="form-group">
		<label>Link de Descarga</label>
		<input type="text" name="Enlace" class="form-control"> 
		</div>
<!--
<div class="form-group">
		<label>Imagen</label>
		<input type="file" name="Imagen" class="form-control" onchange="previewFile(this);" >
		</p><img id="previewImg" src=" " alt=""><p>
    	</div>
-->



<div class="form-group">
		<p>Elija el Tipo de Recurso</p>
  	
  		<input type="radio" id="Articulo" name="Tipo" value="Articulo" class="form-control">
  		<label for="AudioLibro">AudioLibro</label><br>
  		<input type="radio" id="Revista" name="Tipo" value="Revista" class="form-control">
  		<label for="Revista">Revista</label>
		<input type="radio" id="Libro" name="Tipo" value="Libro" class="form-control">
  		<label for="Podcast">Podcast</label><br>
		<input type="radio" id="Video" name="Tipo" value="Video" class="form-control">
  		<label for="Documento">Documento</label><br>
		<br>  
		</div>
 </div>


 <div class="form-group">
 <p>Elija de tipo de Contrato </p>

 <label for="Gold">Gold</label>
<input type="radio" id="Silver" name=TipoPlan value="Silver" class="form-Control" />
<label for="Gold">Silver</label>
 <input type="radio" id="Free" name="TipoPlan" value="Free" class="form-control"/>
 <label for="Free"> Free </label><br>
 <input type="radio" id="Gold" name=TipoPlan value="Gold" class="form-Control" />

 </div>
 
 <input id="submit" name="submit" type="submit" value="Publicar"
									class='btn btn-outline-success btn-block'>

</form>

 </div>