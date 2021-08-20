<?php
	class Suscripciones extends Controller{

        protected function index(){
         
            $viewmodel = new SuscripcionModel();
            $this->returnView($viewmodel->index(), true);
        }

        protected function cancelarSuscripcion()
    	{
        if(!isset($_SESSION['is_logged_in'])){
			header('Location: '.ROOT_URL.'suscripciones');
		}
        elseif(isset($_SESSION['es_proveedor']))
        {
            header('Location: '.ROOT_URL.'suscripciones');
        }
       // unset($_SESSION['suscripcion_data']);
		$viewmodel = new SuscripcionModel();
		$this->returnView($viewmodel->cancelarSuscripcion(),true);
	    }
        
    protected function free(){
    if(!isset($_SESSION['is_logged_in'])){
        header('Location: '.ROOT_URL.'suscripciones');
    }
       elseif(isset($_SESSION['es_proveedor']))
        {
            header('Location: '.ROOT_URL.'suscripciones');
        }
    $viewmodel= new SuscripcionModel();
    $this->returnView($viewmodel->free(),true);
    }

    protected function silver(){
     if(!isset($_SESSION['is_logged_in'])){
        header('Location: '.ROOT_URL.'suscripciones');
    }
       elseif(isset($_SESSION['es_proveedor']))
        {
            header('Location: '.ROOT_URL.'suscripciones');
        }
    $viewmodel= new SuscripcionModel();
    $this->returnView($viewmodel->silver(),true);
    }
    protected function gold()
    {
        if(!isset($_SESSION['is_logged_in'])){
        header('Location: '.ROOT_URL.'suscripciones');
    }
       elseif(isset($_SESSION['es_proveedor']))
        {
            header('Location: '.ROOT_URL.'suscripciones');
        }
    
    $viewmodel= new SuscripcionModel();
    $this->returnView($viewmodel->gold(),true);
    }
 
}
?>
 
