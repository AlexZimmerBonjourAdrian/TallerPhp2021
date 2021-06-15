<?php
class Users extends Controller{


	
	protected function suscripcion()
	{
		$viewmodel = new UserModel();
		$this->returnView($viewmodel->suscripcion(), true);
	}

	

	protected function register(){
		$viewmodel = new UserModel();
		$this->returnView($viewmodel->register(), true);
	}

	protected function registerProveedor(){
		$viewmodel = new UserModel();
		$this->returnView($viewmodel->registerProveedor(),true);
	}
	
	protected function registerCliente()
	{
		$viewmodel = new UserModel();
		$this->returnView($viewmodel->registerCliente(),true);
	}

	protected function login(){
		$viewmodel = new UserModel();
		$this->returnView($viewmodel->login(), true);
	}
/*
	protected function suscripcion()
	{
		$virewmodel = new UserModel();
		$this->returnView($viewmodel->suscripcion(),true);
	}
	*/
	protected function logout(){
		unset($_SESSION['is_logged_in']);
		unset($_SESSION['user_data']);
		session_destroy();
		// Redirect
		header('Location: '.ROOT_URL);
	}

	public function free()
	{
		$viewmodel = new UserModel();
		$this->returnView($viewmodel->free(), true);
	}

	public function silver()
	{
		$viewmodel = new UserModel();
		$this->returnView($viewmodel->silver(), true);

	}
	public function gold()
	{
	
		$viewmodel = new UserModel();
		$this->returnView($viewmodel->gold(),true);
	}

	public function cancelarSuscripcion()
	{
		$viewmodel = new UserModel();
		$this->returnView($viewmodel->cancelarSuscripcion(),true);
	}

	public function exampleUpdateFile()
	{
		$viewmodel = new UserModel();
		$this->returnView($viewmodel->exampleUpdateFile(),true);
	}
public function subir()
{
	$viewmodel = new UserModel();
	$this->returnView($viewmodel->subir(),true);
}





}