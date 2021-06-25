<?php
class Articulos extends Controller{
	protected function index(){
		$viewmodel = new ArticuloModel();
		$this->returnView($viewmodel->index(), true);
	}

	protected function add(){
		if(!isset($_SESSION['is_logged_in'])){
			header('Location: '.ROOT_URL.'articulos');
		}
		$viewmodel = new  ArticuloModel();
		$this->returnView($viewmodel->add(), true);
	}

	protected function buscar()
	{
		
		$viewmodel = new  ArticuloModel();
		$this->returnView($viewmodel->buscar(), true);
	}

}