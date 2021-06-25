

<div>
<div class="well mt-5">
<p><?php echo $_SESSION['recurso_data']['name'] ?></p>
<p><?php echo $_SESSION['recurso_data']['descript']?></p>
<p><?php echo $_SESSION['recurso_data']['tipo'] ?></p>
<p><?php echo $_SESSION['recurso_data']['tipoPlan'] ?></p>
<br />
<?php if($_SESSION['recurso_data']['enlace'])?>
				<a class="btn btn-default mb-2" href="<?php echo $_SESSION['recurso_data']['enlace'] ?>" target="_blank">Descárgame!</a>

    </div>		


</div>
