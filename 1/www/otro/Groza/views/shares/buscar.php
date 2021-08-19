
<?php if((isset($post['nombre']) === '' )===false) : ?>
   
<div>
<div class="well mt-5">
<p><?php echo $_SESSION['recurso_data']['name'] ?></p>
<p><?php echo $_SESSION['recurso_data']['descript'] ?></p>
<p><?php echo $_SESSION['recurso_data']['tipo'] ?></p>
<p><?php echo $_SESSION['recurso_data']['tipoPlan'] ?></p>
<img <?php $_SESSION['recurso_data']['imgR']?> width="42" height="42" >
<br />

    <a href="<?php echo $_SESSION['recurso_data']['enlace']?>">Descárgame!</a>

    </div>

    

<?php endif; ?>
</div>
