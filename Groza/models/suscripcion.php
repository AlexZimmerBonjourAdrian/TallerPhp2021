<?php
class SuscripcionModel extends Model{
    
    
	public function suscripcion()
	{
		$post = filter_input_array(INPUT_POST, FILTER_SANITIZE_STRING);
		if(isset($post['password'])){
			$password = md5($post['password']);	
		}
	}

	protected function cancelarSuscripcion()
	{
		$post = filter_input_array(INPUT_POST, FILTER_SANITIZE_STRING);

	if(isset($post['password'])){
	$password = md5($post['password']);	
	}
	

			
			$this->query('SELECT * FROM cliente where EmailCli=:email');
			$this->bind(':email',$_SESSION['cliente_data']['email']);
			$row= $this->single();
		

			if($row)
			{

				
				$this->query('DELETE FROM suscripcion WHERE IdCli=:idcli');
				$this->bind(':idcli',$_SESSION['suscripcion_data']['idcli']);
			
				$this->execute(); 
				
				
				$this->query('SELECT * FROM suscripcion WHERE IdCli = :idcli');
				$this->bind(':idcli',$_SESSION['suscripcion_data']['idcli']);

                    $row = $this->single();
				
				if(!$row)
				{
				$_SESSION['suscripcion_data'] = array(
					"id" => $row['idSuscript'][NULL],
					"precio" => $row['precio'][NULL],
					"tipoPlan" => $row['TipoPlan'][NULL],
					"idcli" => $row['IdCli'][NULL]
				
					
				);
				header('Location: '.ROOT_URL.'home');	
				}
				
					
		
			
					
			}
			
	
		return;

	


	}
   
   protected function free()
	{
		$post = filter_input_array(INPUT_POST, FILTER_SANITIZE_STRING);

	if(isset($post['password'])){
	$password = md5($post['password']);	
	}


    
	if($_SESSION['es_cliente']){
			
		$this->query('SELECT * FROM cliente where EmailCli=:email');
		$this->bind(':email',$_SESSION['cliente_data']['email']);
		$row= $this->single();
	

		if($row)
		{

			//Messages::setMsg("El usuario existe y esta listo para usarse",'error');
			$this->query('INSERT INTO suscripcion (precio,tipoPlan,IdCli) VALUES(:precio,:tipoPlan,:idcli)');
			$this->bind('precio','0');
			$this->bind('tipoPlan','Free');
			$this->bind(':idcli',$_SESSION['cliente_data']['id']);
			$this->execute(); 
		
			
			$this->query('SELECT * FROM suscripcion WHERE IdCli = :idcli');
			$this->bind(':idcli',$_SESSION['cliente_data']['id']);

				$row = $this->single();
				

			$_SESSION['suscripcion_data'] = array(
				"id" => $row['idSuscript'],
				"precio" => $row['precio'],
				"tipoPlan" => $row['tipoPlan'],
				"idcli" => $row['IdCli']

			
				
			);
			
				
			//header('Location: '.ROOT_URL.'home');			
		}
	}
	return;
	}
    


    protected function silver()
	{
		
	$post = filter_input_array(INPUT_POST, FILTER_SANITIZE_STRING);
/*
	if(isset($post['password'])){
	$password = md5($post['password']);	
	}
	*/
	//if($post['submit']){
	
        if($_SESSION['es_cliente']){
			
			$this->query('SELECT * FROM cliente where EmailCli=:email');
			$this->bind(':email',$_SESSION['cliente_data']['email']);
			$row= $this->single();
		

			if($row)
			{

				//Messages::setMsg("El usuario existe y esta listo para usarse",'error');
				$this->query('INSERT INTO suscripcion (precio,tipoPlan,IdCli) VALUES(:precio,:tipoPlan,:idcli)');
				$this->bind('precio','19.99');
				$this->bind('tipoPlan','Silver');
				$this->bind(':idcli',$_SESSION['cliente_data']['id']);		
				$this->execute(); 
				$this->query('SELECT * FROM suscripcion WHERE IdCli = :idcli');
				$this->bind(':idcli',$_SESSION['cliente_data']['id']);

                    $row = $this->single();
					

				$_SESSION['suscripcion_data'] = array(
					"id" => $row['idSuscript'],
					"precio" => $row['precio'],
					"tipoPlan" => $row['tipoPlan'],
					"idcli" => $row['IdCli']
				);		
			}
		}
		return;	
}

	public function gold()
	{
         $post = filter_input_array(INPUT_POST, FILTER_SANITIZE_STRING);

	    if(isset($post['password'])){
	    $password = md5($post['password']);	
	 }

	if($_SESSION['es_cliente']){
			
		$this->query('SELECT * FROM cliente where EmailCli=:email');
		$this->bind(':email',$_SESSION['cliente_data']['email']);
		$row= $this->single();
	

		if($row)
		{

			//Messages::setMsg("El usuario existe y esta listo para usarse",'error');
			$this->query('INSERT INTO suscripcion (precio,tipoPlan,IdCli) VALUES(:precio,:tipoPlan,:idcli)');
			$this->bind('precio','49.99');
			$this->bind('tipoPlan','Gold');
			$this->bind(':idcli',$_SESSION['cliente_data']['id']);
			
			$this->execute(); 
		
			
			
			$this->query('SELECT * FROM suscripcion WHERE IdCli = :idcli');
			$this->bind(':idcli',$_SESSION['cliente_data']['id']);

				$row = $this->single();
				

			$_SESSION['suscripcion_data'] = array(
				"id" => $row['idSuscript'],
				"precio" => $row['precio'],
				"tipoPlan" => $row['tipoPlan'],
				"idcli" => $row['IdCli']
			);			
		}
		
	}
	return;
	}
}

	


?>