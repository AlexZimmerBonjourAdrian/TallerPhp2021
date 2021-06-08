
	<div class="container p-4 w-50">
		<div class="row">
			<div class="col mx-auto">
				<div class="card text-center">
					<div class="card-header bg-light text-center">
						<h3>Registrarse</h3>
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




<!--
<div class="panel panel-default">
  <div class="panel-heading">
    <h3 class="panel-title">Register User</h3>
  </div>
  <div class="panel-body">
    <form method="post" action="">
    	<div class="form-group">
    		<label>Name</label>
    		<input type="text" name="name" class="form-control" />
    	</div>
    	<div class="form-group">
    		<label>Email</label>
    		<input type="text" name="email" class="form-control" />
    	</div>
    	<div class="form-group">
    		<label>Password</label>
    		<input type="password" name="password" class="form-control" />
    	</div>
    	<input class="btn btn-primary" name="submit" type="submit" value="Submit" />
    </form>
  </div>
</div>

-->