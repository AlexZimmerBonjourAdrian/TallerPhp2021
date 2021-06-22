
	
	<script>
	function previewFile() {
 	 var preview = document.querySelector('img');
 	 var file    = document.querySelector('input[type=file]').files[0];
 	 var reader  = new FileReader();

 	 reader.onloadend = function () {
  	  preview.src = reader.result;
  	}

  	if (file) {
   	 reader.readAsDataURL(file);
  	} else {
   	 preview.src = "";
		}
	}
		</script>



<?php if(isset($_SESSION['es_proveedor'])) : ?>

<div class="panel panel-default">
 <div class="panel heading">
<h3 class="panel-title"> Agregar Recursos<h3>
</div>

<div class="panel-body">
 <form method="post" action="<?php $_SERVER['PHP_SELF'];?>" enctype="multipart/form-data">
<div class="form-group">
	<label>Nombre</label>
	<input type="text" name="NomRec" class="form-control" />
</div>
<!--
<div class="form-group">
<input type="radio" id="NSuscrip" name="Suscrip" value="0" class="form-control">
<label for="NSuscrip">Gratis</label><br>
<input type="radio" id="Suscrip" name ="Suscrip" value="1" class="form-control">

-->



<!-- Agregar la configuracion de agregar la imagen si hace falta claro --> 


<!--
<div class="form-group">
		<label>Imagen</label>
		<input type="file" name="Imagen" class="form-control" onchange="previewFile(this);" >
		</p><img id="previewImg" src=" " alt=""><p>
    	</div>
-->



<div class="form-group">
		<p>Elija el Tipo de Recurso</p>
  	
  		<input type="radio" id="Articulo" name="Tipo" value="Articulo" class="form-control"/>
  		<label for="Articulo">Articulo</label>
  		<input type="radio" id="Revista" name="Tipo" value="Revista" class="form-control"/>
  		<label for="Revista">Revista</label>
		<input type="radio" id="Libro" name="Tipo" value="Libro" class="form-control"/>
  		<label for="Libro">Libro</label>
		<input type="radio" id="Video" name="Tipo" value="Video" class="form-control"/>
  		<label for="Video">Video</label>
		<br>  	
 </div>


 <div class="form-group">
 <p>Elija de tipo de Contrato </p>


 <label for="Free"> Free </label>
 <input type="radio" id="Free" name="TipoPlan" value="Free" class="form-Control" />
 <label for="Silver">Silver</label>
 <input type="radio" id="Silver" name="TipoPlan" value="Silver" class="form-control"/>
 <label for="Gold">Gold</label>
 <input type="radio" id="Gold" name="TipoPlan" value="Gold" class="form-Control" />

 </div>
 
 <div class="form-group">
		 <label>Descripción</label>
		<textarea name="Descript" class="form-control" required placeholder="Una Descripción de su Recurso ..." ></textarea>
</div>



		<label>Imagen</label>
		<div class="form-group">
		<input type="file" name="imagen" class="form-control" onchange="previewFile();" />
		<img src="" height="200" alt="Image preview...">
		</div>	
		

	

	<p>Enviar un Archivo</p>
	<div >
    <input id="file" type="file" name="file">
   <br>
 </div>
 

<div>
</div>




 <input class="btn btn-primary" name="submit" type="submit" value="Submit" />
 <a class="btn btn-danger" href="<?php echo ROOT_PATH; ?>shares">Cancel</a>
</form>


 </div>

 </div>