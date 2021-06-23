<?php
session_start();



class UserModel extends Model{

	public function register(){
        // Sanitize POST
		$post = filter_input_array(INPUT_POST, FILTER_SANITIZE_STRING);
		if(isset($post['password'])){
			$password = md5($post['password']);	
		}
		
    }    





	
	

	
	public function registerCliente(){
        
        
        // Sanitize POST
		$post = filter_input_array(INPUT_POST, FILTER_SANITIZE_STRING);

		if(isset($post['password'])){
			$password = md5($post['password']);	
		}
	
	
		
        if(isset($post['submit'])){
            

            //si es cliente chequea campos requeridos para cliente
            if($_SESSION['es_cliente']){
				
                if($post['name'] == '' || $post['apellido'] == '' || $post["sexo"] == '' || $post['nick'] == '' || $post['password'] == '' || $post['email'] == '' ){
                    Messages::setMsg('Please Fill In All Fields', 'error');
                    return;
                }

                //chequea que no esté registrado
                $this->query('SELECT * FROM cliente WHERE EmailCli = :email AND PassCli = :password');
                $this->bind(':email', $post['email']);
                $this->bind(':password', $password);
                $row = $this->single();

                $this->query('SELECT * FROM proveedor WHERE EmailProv = :email AND PassProv = :password');
                $this->bind(':email', $post['email']);
                $this->bind(':password', $password);
                $row2 = $this->single();

                if($row || $row2){
                    Messages::setMsg('El usuario ya existe', 'error');
                }
                
                else {

					//chequea si subió una imagen
					if (count($_FILES) > 0) {
                        if (is_uploaded_file($_FILES['imagen']['tmp_name'])) {
                            //print_r("Entra en el chequeo de la imagen");
							$imgContenido = (file_get_contents($_FILES['imagen']['tmp_name'])); // este es el blob
							
						}
                    }
                    else{
                        // no subió ninguna imagen
						print_r("No Entra");
                        $imgContenido = null;
                    }
                    
                    // Insert into MySQL
                    $this->query('INSERT INTO cliente (PassCli, NomCli, ApellidoCli,ImgCli,FNCli,EmailCli, SexoCli, NicknameCli) VALUES( :password, :name, :apellido,:imagen, :fechaNac,:email, :sexo, :nick)');
                    $this->bind(':password', $password);  // $password hasheado
                    $this->bind(':name', $post['name']);
                    $this->bind(':apellido', $post['apellido']);
                    $this->bind(':email', $post['email']);
                    $this->bind(':sexo', $post['sexo']);
                    $this->bind(':nick', $post['nick']);
                    $this->bind(':fechaNac', $post['fechaNac']);
                    $this->bind(':imagen', $imgContenido );
                    
                    $this->execute(); 
                    
                    // se trae al usuario recien creado para setear sus datos en la sesion
                    $this->query('SELECT * FROM cliente WHERE EmailCli = :email AND PassCli = :password');
                    $this->bind(':email', $post['email']);
                    $this->bind(':password', $password);

                    $row = $this->single();
					
                    $_SESSION['cliente_data'] = array(
                        "id"	=> $row['IdCli'],
                        "password"	=> $row['PassCli'],
                        "name"	=> $row['NomCli'],
                        "apellido"	=> $row['ApellidoCli'],
                        "email"	=> $row['EmailCli'],
                        "sexo"	=> $row['SexoCli'],
                        "nick"	=> $row['NicknameCli'],
                        "fechaNac"	=> $row['FNCli'],
                        "imagen"	=> $row['ImgCli']
                        

                    );

                    header('Location: '.ROOT_URL.'home');
                }
            } 
            }
            return;
    }




	

	

	
	
 
	public function registerProveedor(){
        // Sanitize POST

		
		$post = filter_input_array(INPUT_POST, FILTER_SANITIZE_STRING);
		if(isset($post['password'])){

			$password = md5($post['password']);	
		}
			
	
		if(isset($post['submit'])){
        if($_SESSION['es_proveedor']){

           

            if($post['name'] == '' || $post['apellido'] == '' || $post["sexo"] == '' || $post['nick'] == '' || $post['password'] == '' || $post['email'] == '' ){
                Messages::setMsg('Please Fill In All Fields', 'error');
                return;
            }

			
            //chequea que no esté registrado
            $this->query('SELECT * FROM proveedor WHERE EmailProv = :email AND PassProv = :password');
            $this->bind(':email', $post['email']);
            $this->bind(':password', $password);
            $row = $this->single();

            $this->query('SELECT * FROM cliente WHERE EmailCli = :email AND PassCli = :password');
            $this->bind(':email', $post['email']);
            $this->bind(':password', $password);
            $row2 = $this->single();

            if($row || $row2){
                Messages::setMsg('El usuario ya existe', 'error');
                
            }
            else {
                if (count($_FILES) > 0) {
					if (is_uploaded_file($_FILES['imagen']['tmp_name'])) {
						$imgContenido = file_get_contents($_FILES['imagen']['tmp_name']); // este es el blob
					}
				}
				else{
					// no subió ninguna imagen
					$imgContenido = null;
				} 

                // Insert into MySQL
                $this->query('INSERT INTO proveedor (PassProv, NomProv, ApellidoProv, EmailProv, ImgProv,FNProv, NomEmpresa,SexoProv,NicknameProv) VALUES(:password,:name,:apellido,:email,:imagen,:fechaNac,:empresa,:sexo,:nick)');
                $this->bind(':password', $password);  // $password hasheado
                $this->bind(':name', $post['name']);
                $this->bind(':apellido', $post['apellido']);
                $this->bind(':email', $post['email']);
                $this->bind(':sexo', $post['sexo']);
                $this->bind(':nick', $post['nick']);
                $this->bind(':fechaNac', $post['fechaNac']);
                $this->bind(':imagen', $imgContenido);
				$this->bind(':empresa',$post['empresa']);
               // $this->bind(':biografia', $post['biografia']);
                
			   
                
                $this->execute(); 
                
                // se trae al usuario recien creado para setear sus datos en la sesion
                $this->query('SELECT * FROM proveedor WHERE EmailProv = :email AND PassProv = :password');
                $this->bind(':email', $post['email']);
                $this->bind(':password', $password);

                $row = $this->single();

                // setea los datos del usuario traidos de la bd a una variable de sesion
                $_SESSION['proveedor_data'] = array(
                "id"	=> $row['IdProv'],
                "name"	=> $row['NomProv'],
                "apellido"	=> $row['ApellidoProv'],
                "email"	=> $row['EmailProv'],
                "sexo"	=> $row['SexoProv'],
                "nick"	=> $row['Nickname'],
                "fechaNac"	=> $row['FNProv'],
                "imagen"	=> $row['ImgProv'],
                //"biografia" => $post['BiografiaAut'],
                "password"	=> $row['PassProv'],
				"empresa" => $row['NameEmpresa']
                );

                header('Location: '.ROOT_URL.'home');
            }
        }
        }
        return;
    }



public function login(){
	// Sanitize POST
	$post = filter_input_array(INPUT_POST, FILTER_SANITIZE_STRING);

	if(isset($post['password'])){
	$password = md5($post['password']);	
	}
	

	if(isset($post['submit'])){
		// Compare Login
		$this->query('SELECT * FROM proveedor WHERE EmailProv = :email AND PassProv = :password');
		$this->bind(':email', $post['email']);
		$this->bind(':password', $password);
		
		$row = $this->single();

		if($row){
			$_SESSION['is_logged_in'] = true;
			$_SESSION['proveedor_data'] = array(
				"id"	=> $row['IdProv'],
				"name"	=> $row['NomProv'],
				"apellido"	=> $row['ApellidoProv'],
				"email"	=> $row['EmailProv'],
				"sexo"	=> $row['SexoProv'],
				"nick"	=> $row['NicknameProv'],
				"fechaNac"	=> $row['FNProv'],
				"imagen"	=> $row['ImgProv'],

				"password"	=> $row['PassProv']
				);
			
			header('Location: '.ROOT_URL.'shares');

		} 
	 elseif($post['submit']){
	
		$this->query('SELECT * FROM cliente WHERE EmailCli = :email AND PassCli = :password');
		$this->bind(':email', $post['email']);
		$this->bind(':password', $password);
		
		$row = $this->single();

		if($row){
			$_SESSION['is_logged_in'] = true;
			$_SESSION['cliente_data'] = array(
				"id"	=> $row['IdCli'],
				"password"	=> $row['PassCli'],
				"name"	=> $row['NomCli'],
				"apellido"	=> $row['ApellidoCli'],
				"email"	=> $row['EmailCli'],
				"sexo"	=> $row['SexoCli'],
				"nick"	=> $row['NicknameCli'],
				"fechaNac"	=> $row['FNCli'],
				"imagen"	=> $row['ImgCli']
			);
			
			header('Location: '.ROOT_URL.'shares');

		} 
	}else {
			Messages::setMsg('Incorrect Login', 'error');
		}
	}
	return;
}

}







	


	





