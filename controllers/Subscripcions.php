<?php
class Subscription extends Controller
{
    
    protected function Subscription()
    {
        $viewMode = new Subscripcionmodels();
        $this->returnview($viewMode->PaySubscription(), true);
    }
/*
Todo Selecionar metodo de pago
Select metodo de pago.
*/

/*

TODO:Darse de baja
Darse de baja de la subscripcion.

*/

    
}
?>