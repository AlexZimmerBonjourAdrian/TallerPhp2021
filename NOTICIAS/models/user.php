<?php
session_start();
/*
class UserModel extends Model{
public function register(){

	$post = filter_input_array(INPUT_POST, FILTER_SANITIZE_STRING);
	if(isset($post['password']))
	{
		$password =md5($post['password']);
	}


}
public function registerCliente()
{
	$post = filter_input_array(INPUT_POST, FILTER_SANITIZE_STRING);
	if(isset($post['password']))
	{
		$password=md5($post['password']);
	}


	if(isset($post['submit']))
	{
		
	}



}
}
*/



class UserModel extends Model{
	public function register(){
		// Sanitize POST
		$post = filter_input_array(INPUT_POST, FILTER_SANITIZE_STRING);

		$password = md5($post['password']);

		if($post['submit']){

			if($post['name'] == '' || $post['apellido'] == '' || $post["sexo"] == '' || $post['nick'] == '' || $post['password'] == '' || $post['email'] == '' ){
				Messages::setMsg('Please Fill In All Fields', 'error');
				return;
			}

			$this->query('SELECT * FROM cliente WHERE EmailCli = :email AND PassCli = :password');
			$this->bind(':email', $post['email']);
			$this->bind(':password', $password);

			$row = $this->single();



			if($row){
				Messages::setMsg('El Cliente ya existe', 'error');
			}
			else {
				
				// Insert into MySQL
				$this->query('INSERT INTO cliente (PassCli, NomCli,ApellidoCli, SexoCli,NicknameCli) VALUES(:password, :name, :apellido, :email,:sexo, :nick )');
				$this->bind(':password', $password);  // $password hasheado
				$this->bind(':name', $post['name']);
				$this->bind(':apellido', $post['apellido']);
				$this->bind(':email', $post['email']);
				$this->bind(':sexo', $post['sexo']);
				$this->bind(':nick', $post['nick']);
				//$this->bind(':fechaNac', $post['fechaNac']);
				
				$this->execute();

				$this->query('SELECT * FROM cliente WHERE EmailCli = :email AND PassCli = :password');
				$this->bind(':email', $post['email']);
				$this->bind(':password', $password);
		
				$row = $this->single();
				
				$_SESSION['is_logged_in'] = true;
				$_SESSION['cliente_data'] = array(
				"id"	=> $row['idCli'],
				"password" => $row['PassCli'],
				"name" => $row['NomCli'],
				"apellido" => $row['ApellidoCli'],
				"email" => $row['EmalCli'],
				"sexo" => $row['SexoCli'],
				"nick" =>$row['NicknameCli'],
				//"fechaNac" =>$row['FNCLI']

			
				);

				header('Location: '.ROOT_URL.'home');
				
			}

		}
		return;
	}
/*
	public function login(){
		// Sanitize POST
		$post = filter_input_array(INPUT_POST, FILTER_SANITIZE_STRING);

		$password = md5($post['password']);

		if($post['submit']){
			// Compare Login
			$this->query('SELECT * FROM users WHERE email = :email AND password = :password');
			$this->bind(':email', $post['email']);
			$this->bind(':password', $password);
			
			$row = $this->single();

			if($row){
				$_SESSION['is_logged_in'] = true;
				$_SESSION['user_data'] = array(
					"id"	=> $row['id'],
					"name"	=> $row['name'],
					"email"	=> $row['email']
				);
				
				header('Location: '.ROOT_URL.'shares');

			} else {
				Messages::setMsg('Incorrect Login', 'error');
			}
		}
		return;
	}
	
}

*/
/*
public function login()
{
	$post = filter_input_array(INPUT_POST, FILTER_SANITIZE_STRING);
	if(isset($post['password']))
	{
		$password = md5($post['password']);
	

	if(isset($post['submit']))
	{
		$this->query('SELECT * FROM cliente WHERE EmailCli = :email AND PassCli=:password');
		$this->bind(':email',$post['email']);
		$this->bind(':password',$password);

		$row = $this->single();

		if($row)
		{
			$_SESSION['is_logged_in'] = true;
			$_SESSION['cliente_data'] = array(
				"id" => $row['IdCli'],
				"name" => $row['NomCli'],
				"apellido" => $row['ApellidoCli'],
				"email" => $row['EmailCli'],
				"sexo" => $row['SexoCli'],
				"nick" => $row['NicknameCli'],
				"password" => $row['PassCli']
			);
		
		}
		header('Location: '.ROOT_URL. 'home')

		/*
		else if($post['submit'])
		{
			
		}
		


	}


}
}
*/
}
