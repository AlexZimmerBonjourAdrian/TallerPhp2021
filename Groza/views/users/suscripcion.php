<div class="panel panel-default">
<?php if(isset($_SESSION['is_logged_in'])) : ?>
    <?php if(isset($_SESSION['es_cliente'])) : ?>
        
    <div class="panel-heading">
    <h3 class="panel-title">Suscripciones</h3>
    </div>

    <div class="form-group">
        <div class="container">
    
    <p> Elija su plan de tipo de Recurso<p>
    

<div class="form-group">
<?php if(((isset($_SESSION['cliente_data']['id']) === isset($_SESSION['suscription_data']['idcli']))===false)) : ?>
    <label text-align="center" for="free" id="Free" name="Precio" value="0"></label>
    <li><a href="<?php echo ROOT_URL; ?>users/free">Subscribirse es gratis</a></li>



    <label text-align="center" for="silver" id="Silver" name="Precio" value="14.99"></label>
    <li><a href="<?php echo ROOT_URL; ?>users/silver">Suscribirse a Plata</a></li>
   
  
   <label text-align="center" for="gold" id="gold" name="Precio" value="39.99"></label>

    <li><a href="<?php echo ROOT_URL; ?>users/gold">Suscribirse a ORO</a></li>
   
    <?php endif;?>
    
        <?php if((isset($_SESSION['cliente_data']['id']) === isset($_SESSION['suscripcion_data']['idcli']))) : ?>
    <div class = "form-group">
     <div class="container">
     
     <li><a href="<?php echo ROOT_URL; ?>users/cancelarSuscripcion">Cancelar Suscripcion</a></li>
     
     </div>
     </div>
     <?php endif;?>
    
    
    <?php endif; ?>
    <?php endif; ?>
    
</div>
</div>