<?php

class suscripciones extends Controller{


	protected function suscripcion()
	{
		$viewmodel = new SuscriptiesonModel();
		$this->returnView($viewmodel->suscripcion(), true);
	}


    protected function cancelarSuscripcion()
	{
		$viewmodel = new SuscriptiesonModel();
		$this->returnView($viewmodel->cancelarSuscripcion(),true);
	}


	protected function free()
	{
		$viewmodel = new SuscriptiesonModel();
		$this->returnView($viewmodel->free(), true);
	}

	protected function silver()
	{
		$viewmodel = new  SuscriptiesonModel();
		$this->returnView($viewmodel->silver(), true);

	}
	protected function gold()
	{
	
		$viewmodel = new  SuscriptiesonModel();
		$this->returnView($viewmodel->gold(),true);
	}
}

