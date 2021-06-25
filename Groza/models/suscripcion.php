<?php class SuscripcionModel extends Model{
   public function index()
   {
	return;
       /*$post = filter_input_array(INPUT_POST, FILTER_SANITIZE_STRING);
       if(isset($post['password'])){
           $password = md5($post['password']);	
       }*/
	}
   
// $post = filter_input_array(INPUT_POST, FILTER_SANITIZE_STRING);

	

// if(isset($post['submit']))
// {
// 	echo "Entra";
//         if($post['TipoPlan']== '' )
//         {
//             Messages::setMsg('Please Fill In All Fields', 'error');
			
// 			return;
// 			//header('Location: '.ROOT_URL.'suscripciones');
//         }
      
        
// 		$this->query('SELECT * FROM cliente where IdCli=:id');
// 		$this->bind(':id',$_SESSION['cliente_data']['id']);
// 		$row= $this->single();
	

       
// 		if($row)
// 		{
// 			if($post['TipoPlan']=='Free')
// 			{
				
// 				$precio=0;
// 				echo $precio;
// 			}
// 			elseif($post['TipoPlan']=='Silver')
// 			{
			
// 				$precio=20;
// 				echo $precio;
// 			}
// 			else{
			
// 				$precio=49;
// 				echo $precio;
// 			}
			
// 				echo $post['TipoPlan'];
// 			//Messages::setMsg("El usuario existe y esta listo para usarse",'error');
// 			$this->query('INSERT INTO suscripcion (precio,TipoPlan,IdCli) VALUES(:precio,:tipoPlan,:idcli)');
// 			$this->bind('precio','49.99');
// 			$this->bind('tipoPlan','Gold');
// 			$this->bind(':idcli',$_SESSION['cliente_data']['id']);
// 			$this->execute(); 
// 			echo "este es el Row";
            
// 			/*
// 			$this->query('INSERT INTO proveedor (PassProv, NomProv, ApellidoProv, EmailProv, SexoProv, NicknameProv ) VALUES(:password, :name, :apellido, :email, :sexo, :nick)');
// 			$this->bind(':password', $password);  // $password hasheado
// 			$this->bind(':name', $post['name']);
// 			$this->bind(':apellido', $post['apellido']);
// 			$this->bind(':email', $post['email']);
// 			$this->bind(':sexo', $post['sexo']);
// 			$this->bind(':nick', $post['nick']);
// 			*/
			
			
// 			$this->query('SELECT * FROM suscripcion WHERE IdCli = :idcli');
// 			$this->bind(':idcli',$_SESSION['cliente_data']['id']);

// 			$row = $this->single();
				

// 			$_SESSION['suscripcion_data'] = array(
// 				"id" => $row['idSuscript'],
// 				"precio" => $row['precio'],
// 				"tipoPlan" => $row['TipoPlan'],
// 				"idcli" => $row['IdCli']

// 				/*
// 				"id"	=> $row['IdProv'],
// 				"name"	=> $row['NomProv'],
// 				"apellido"	=> $row['ApellidoProv'],
// 				"email"	=> $row['EmailProv'],
// 				"sexo"	=> $row['SexoProv'],
// 				"nick"	=> $row['NicknameProv'],
// 				*/
// 				//"fechaNac"	=> $row['FNProv'],
// 			   // "imagen"	=> $row['ImgProv'],
// 				//"biografia" => $post['BiografiaAut'],
// 				//"password"	=> $row['PassProv']
				
// 			);
			
				
// 			//header('Location: '.ROOT_URL.'home');	
			
				
// 		}
       
	




	
//     }
// 	return;
   //}
   public function free()
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
			$this->query('INSERT INTO suscripcion (precio,TpoPlan,IdCli) VALUES(:precio,:tipoPlan,:idcli)');
			$this->bind(':precio','0');
			$this->bind(':tipoPlan','Free');
			$this->bind(':idcli',$_SESSION['cliente_data']['id']);
			
			$this->execute(); 
			/*
			$this->query('INSERT INTO proveedor (PassProv, NomProv, ApellidoProv, EmailProv, SexoProv, NicknameProv ) VALUES(:password, :name, :apellido, :email, :sexo, :nick)');
			$this->bind(':password', $password);  // $password hasheado
			$this->bind(':name', $post['name']);
			$this->bind(':apellido', $post['apellido']);
			$this->bind(':email', $post['email']);
			$this->bind(':sexo', $post['sexo']);
			$this->bind(':nick', $post['nick']);
			*/
			
			
			$this->query('SELECT * FROM suscripcion WHERE IdCli = :idcli');
			$this->bind(':idcli',$_SESSION['cliente_data']['id']);

				$row = $this->single();
				

			$_SESSION['suscripcion_data'] = array(
				"id" => $row['idSuscript'],
				"precio" => $row['precio'],
				"tipoPlan" => $row['TpoPlan'],
				"idcli" => $row['IdCli']

				/*
				"id"	=> $row['IdProv'],
				"name"	=> $row['NomProv'],
				"apellido"	=> $row['ApellidoProv'],
				"email"	=> $row['EmailProv'],
				"sexo"	=> $row['SexoProv'],
				"nick"	=> $row['NicknameProv'],
				*/
				//"fechaNac"	=> $row['FNProv'],
			   // "imagen"	=> $row['ImgProv'],
				//"biografia" => $post['BiografiaAut'],
				//"password"	=> $row['PassProv']
				
			);
			
				
			//header('Location: '.ROOT_URL.'home');	
			
				
		}
		
	}
	return;


	}
   public function silver()
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
		   $this->query('INSERT INTO suscripcion (precio,TpoPlan,IdCli) VALUES(:precio,:tipoPlan,:idcli)');
		   $this->bind(':precio','20.00');
		   $this->bind(':tipoPlan','Silver');
		   $this->bind(':idcli',$_SESSION['cliente_data']['id']);
		   
		   $this->execute(); 
		   /*
		   $this->query('INSERT INTO proveedor (PassProv, NomProv, ApellidoProv, EmailProv, SexoProv, NicknameProv ) VALUES(:password, :name, :apellido, :email, :sexo, :nick)');
		   $this->bind(':password', $password);  // $password hasheado
		   $this->bind(':name', $post['name']);
		   $this->bind(':apellido', $post['apellido']);
		   $this->bind(':email', $post['email']);
		   $this->bind(':sexo', $post['sexo']);
		   $this->bind(':nick', $post['nick']);
		   */
		   
		   
		   $this->query('SELECT * FROM suscripcion WHERE IdCli = :idcli');
		   $this->bind(':idcli',$_SESSION['cliente_data']['id']);

			   $row = $this->single();
			   

		   $_SESSION['suscripcion_data'] = array(
			   "id" => $row['idSuscript'],
			   "precio" => $row['precio'],
			   "tipoPlan" => $row['TpoPlan'],
			   "idcli" => $row['IdCli']

			   /*
			   "id"	=> $row['IdProv'],
			   "name"	=> $row['NomProv'],
			   "apellido"	=> $row['ApellidoProv'],
			   "email"	=> $row['EmailProv'],
			   "sexo"	=> $row['SexoProv'],
			   "nick"	=> $row['NicknameProv'],
			   */
			   //"fechaNac"	=> $row['FNProv'],
			  // "imagen"	=> $row['ImgProv'],
			   //"biografia" => $post['BiografiaAut'],
			   //"password"	=> $row['PassProv']
			   
		   );
		   
			   
		   //header('Location: '.ROOT_URL.'home');	
		   
			   
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

			echo "Entra";
			//Messages::setMsg("El usuario existe y esta listo para usarse",'error');
			$this->query('INSERT INTO suscripcion (precio,TpoPlan,IdCli) VALUES(:precio,:tipoPlan,:idcli)');
			$this->bind(':precio','49.99');
			$this->bind(':tipoPlan','Gold');
			$this->bind(':idcli',$_SESSION['cliente_data']['id']);
			
			$this->execute(); 
			/*
			$this->query('INSERT INTO proveedor (PassProv, NomProv, ApellidoProv, EmailProv, SexoProv, NicknameProv ) VALUES(:password, :name, :apellido, :email, :sexo, :nick)');
			$this->bind(':password', $password);  // $password hasheado
			$this->bind(':name', $post['name']);
			$this->bind(':apellido', $post['apellido']);
			$this->bind(':email', $post['email']);
			$this->bind(':sexo', $post['sexo']);
			$this->bind(':nick', $post['nick']);
			*/
			
			
			$this->query('SELECT * FROM suscripcion WHERE IdCli = :idcli');
			$this->bind(':idcli',$_SESSION['cliente_data']['id']);

				$row = $this->single();
				

			$_SESSION['suscripcion_data'] = array(
				"id" => $row['idSuscript'],
				"precio" => $row['precio'],
				"tipoPlan" => $row['TpoPlan'],
				"idcli" => $row['IdCli']

				/*
				"id"	=> $row['IdProv'],
				"name"	=> $row['NomProv'],
				"apellido"	=> $row['ApellidoProv'],
				"email"	=> $row['EmailProv'],
				"sexo"	=> $row['SexoProv'],
				"nick"	=> $row['NicknameProv'],
				*/
				//"fechaNac"	=> $row['FNProv'],
			   // "imagen"	=> $row['ImgProv'],
				//"biografia" => $post['BiografiaAut'],
				//"password"	=> $row['PassProv']
				
			);
			
				
			//header('Location: '.ROOT_URL.'home');	
			
				
		}
		
	}
	return;


	}

}






?>