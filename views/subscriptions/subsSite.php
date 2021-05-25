<h3>Subscribirse</h3>
<?php
	$_SESSION['es_cliente'] = true;
	?> <div class="container p-4 w-50">
     <div class="row">
          <div class="col mx-auto">
               <div class="card text-center">
                    <div class="card-header bg-light text-center">
                         <h3>Subscribirse</h3>
                    </div>
                    <div class="card-body p-4">
                         <form method="post" action="<?php $_SERVER['PHP_SELF']; ?>">
                              <div class="row">
                                   <div class="form-group">
                                        <input type="Number" name="Monto" class="form-control"/>
                                   </div>
                         </form>
                    </div>
               </div>
          </div>
     </div>
</div>


