<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<title>Document</title>
</head>
<body>
	
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

	




		

<?php
	$_SESSION['es_cliente'] = true;
	?>

<div class="container p-4 w-50">
<div class="container" id="ribbon" class="container-fluid">
		<div class="row">
		
			<div class="col mx-auto">
				<div class="card text-center">
					<div class="card-header bg-light text-center">
						<h3>Registrarse a Cliente</h3>
					</div>
					<div class="card-body p-4">
						<form method="post" action="<?php $_SERVER['PHP_SELF'];?>" enctype="multipart/form-data">
							<div class="row">
								<div class="form-group">
									<input type="text" name="name" class="form-control" required placeholder="Nombre" />
								</div>
								<div class="form-group mt-2">
									<input type="text" name="apellido" class="form-control" required
										placeholder="Apellido" />
								</div>
							</div>
							<div class="row">
								<div class="form-group mt-2">
									<input type="text" name="nick" class="form-control" required
										placeholder="Nickname" />
								</div>
								<div class="form-group mt-2">
									<input type="password" name="password" class="form-control" required
										placeholder="Password" />
								</div>
							</div>
							<div class="row">
								<div class="form-group mt-2">
									<input type="email" name="email" class="form-control" required
										placeholder="Email" />
								</div>
							
							</div>
							
								<div class="col-8">
											<input type="date" name="fechaNac" class="form-control" required
												placeholder="Fecha de nacimiento" />
								</div>
								
								<div class="form-group mt-2">
									<input type="file" name="imagen" class="form-control" onchange="previewFile();" >
									
									<img src="" height="200" alt="Image preview...">
								</div>	
								

								
							</div>
							<div class="row">
								<div class="form-group mt-2">
									<div class="row ">
										<div class="col">
											<label for="sexo">Sexo:</label>
										</div>

										<div class="col">
											<label for="sexo">Femenino</label>
											<input type="radio" id="femenino" name="sexo" value="Femenino">
										</div>
										<div class="col">
											<label for="sexo">Masculino</label>
											<input type="radio" id="masculino" name="sexo" value="Masculino">
										</div>
										

									</div>
								</div>
								
							</div>
							<div class="d-grid gap-2 mt-4">
								<input id="submit" name="submit" type="submit" value="Registrarse"
									class='btn btn-outline-success btn-block'>

							</div>
						</form>
						</div>
					</div>
					</div>
				</div>
			</div>
		</div>
	</div>









</body>
</html>
	