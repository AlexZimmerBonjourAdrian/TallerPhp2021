<?php
//session_start();
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
                if($post['name'] == '' || $post['apellido'] == '' || empty($_post["sexo"]) || $post['nick'] == '' || $post['password'] == '' || $post['email'] == '' || $post['fechaNac'] == null || $post['suscripcion'] ){
                    Messages::setMsg('Please Fill In All Fields', 'error');
                    return;
                }
                
                //chequea que no esté registrado
                $this->query('SELECT * FROM cliente WHERE EmailCli = :email AND PassCli = :password');
                $this->bind(':email', $post['email']);
                $this->bind(':password', $password);

                $row = $this->single();
                if($row){
                    Messages::setMsg('El usuario ya existe', 'error');
                }
                else {

                    // chequea si subió una imagen
                    if (count($_FILES) > 0) {
                        if (is_uploaded_file($_FILES['imagen']['tmp_name'])) {
                            $imgContenido = addslashes(file_get_contents($_FILES['imagen']['tmp_name'])); // este es el blob
                        }
                    }
                    else{
                        // no subió ninguna imagen
                        $imgContenido = null;
                    } 
                    
                    // Insert into MySQL
                    $this->query('INSERT INTO cliente (PassCli, NomCli, ApellidoCli, EmailCli, SexoCli, NicknameCli, FNCli, ImgCli) VALUES( :password, :name, :apellido, :email, :sexo, :nick, :fechaNac, imagen)');
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
                        "imagen"	=> $row['ImgCli'],
                        "suscripcion" =>$row['suscripcion']

                    );

                    header('Location: '.ROOT_URL.'usuarios');
                }
            } 
        }
        return;
    }


	public function registerAutor(){
        // Sanitize POST
		$post = filter_input_array(INPUT_POST, FILTER_SANITIZE_STRING);
		if(isset($post['password'])){
			$password = md5($post['password']);	
		}
			
	
	if(isset($post['submit'])){
        if($_SESSION['es_autor']){

            // chequea si subió una imagen
            if (count($_FILES) > 0) {
                if (is_uploaded_file($_FILES['imagen']['tmp_name'])) {
                    $imgContenido = addslashes(file_get_contents($_FILES['imagen']['tmp_name'])); // este es el blob
                }
            }
            else{
                // no subió ninguna imagen
                $imgContenido = null;
            } 

            if($post['name'] == '' || $post['apellido'] == '' || empty($_post["sexo"]) || $post['nick'] == '' || $post['password'] == '' || $post['email'] == '' || $post['fechaNac'] !== null  || $imgContenido == null  || $post['biografia'] == ''){
                Messages::setMsg('Please Fill In All Fields', 'error');
                return;
            }
            //chequea que no esté registrado
            $this->query('SELECT * FROM autor WHERE EmailAut = :email AND PassAut = :password');
            $this->bind(':email', $post['email']);
            $this->bind(':password', $password);

            $row = $this->single();
            if($row){
                Messages::setMsg('El usuario ya existe', 'error');
            }
            else {
                
                // Insert into MySQL
                $this->query('INSERT INTO autor (PassAut, NomAut, ApellidoAut, EmailAut, SexoAut, NicknameAut, FNAut, ImgAut, BiografiaAut) VALUES(:password, :name, :apellido, :email, :sexo, :nick, :fechaNac, $imgContenido, :biografia)');
                $this->bind(':password', $password);  // $password hasheado
                $this->bind(':name', $post['name']);
                $this->bind(':apellido', $post['apellido']);
                $this->bind(':email', $post['email']);
                $this->bind(':sexo', $post['sexo']);
                $this->bind(':nick', $post['nick']);
                $this->bind(':fechaNac', $post['fechaNac']);
                $this->bind(':imagen', $imgContenido);
                $this->bind(':biografia', $post['biografia']);
               // $this->bind(':boolval',$post['Suscripcion']);
                
                $this->execute(); 
                
                // se trae al usuario recien creado para setear sus datos en la sesion
                $this->query('SELECT * FROM autor WHERE EmailAut = :email AND PassAut = :password');
                $this->bind(':email', $post['email']);
                $this->bind(':password', $password);

                $row = $this->single();

                // setea los datos del usuario traidos de la bd a una variable de sesion
                $_SESSION['autor_data'] = array(
                "id"	=> $row['IdAut'],
                "name"	=> $row['NomAut'],
                "apellido"	=> $row['ApellidoAut'],
                "email"	=> $row['EmailAut'],
                "sexo"	=> $row['SexoAut'],
                "nick"	=> $row['NicknameAut'],
                "fechaNac"	=> $row['FNAut'],
                "imagen"	=> $row['ImgAut'],
                "biografia" => $post['BiografiaAut'],
                "password"	=> $row['PassAut']
                //"Suscrito" => $row['Suscrito']
                );

                header('Location: '.ROOT_URL.'usuarios');
            }
        }
        }
        return;
    }



    public function subscription()
    {
  
        $post = filter_input_array(INPUT_POST, FILTER_SANITIZE_STRING);
		if(isset($post['password'])){
			$password = md5($post['password']);	
		}
			
		
	
	//if(isset($post['submit'])){
      //  if($_SESSION['es_cliente'])
      //  {
         //   if($post['name'] == '' || $post['apellido'] == '' || empty($_post["sexo"]) || $post['nick'] == '' || $post['password'] == '' || $post['email'] == '' || $post['fechaNac'] !== null  || $imgContenido == null  || $post['biografia'] == '')
         //   {
               // Messenges:setMsg()
           // }
            
             //$this->query('SELECT * FROM cliente where id=$_SESSION[session_id()]');
            // Messages::setMsg("Entra", 'error');
             
            //$id=$_SESSION[session_id()];
           // $this->query('SELECT * FROM cliente WHERE E=$_SESSION[session_id()]');
           // $this->bind('id',$id);
            //$this->bind('bool',$post['boolval']);
           // $row= $this->single();
            

            
       //     if($row)
       //     {
       //     Messages::setMsg('El Usuario fue encontrado', 'error');
         //    }
             /*
            else
            {
                $this->query('UPDATE cliente SET Suscrito=1 WHERE id=$id');
                $this->bind(':boolval',$post['boolval']);
                $this->execute(); 
            }

            $_SESSION['cliente_data'] = array(
                "Suscrito"	=> $row['Suscrito']
            );
            // Messages::setMsg('Entra y Realiza La consulta', 'error');
            header('Location: '.ROOT_URL.'usuarios');
        }
        else
        {
            Messages::setMsg('No Realizo nada', 'error');
        }
        
*/

  //  }
       /* 
        $post = filter_input_array(INPUT_POST, FILTER_VALIDATE_BOOL);
		if(isset($post['boolval'])){
			$Subscrito = $post['boolval'];	
		}
        */
        /*
        if(!isset($_SESSION['is:_logged_in']))
        {
            header('Location: '.ROOT_URL.'Login');
            Messages::setMsg('Please Fill In All Fields', 'error');
        }
        */
        /*
        $id = $_SESSION[session_id()];
        $this->query('SELECT * FROM USUARIO WHERE id=$_SESSION[session_id()');
        $this->query(':id',$id);
        $this->query(':boolval',$Subscrito);
        $row= $this->single();
*/
          
        
     //   }   
    }






	public function login(){
		// Sanitize POST
		$post = filter_input_array(INPUT_POST, FILTER_SANITIZE_STRING);

		if(isset($post['password'])){
		$password = md5($post['password']);	
		}
		

		if(isset($post['submit'])){
			// Compare Login
			$this->query('SELECT * FROM autor WHERE EmailAut = :email AND PassAut = :password');
			$this->bind(':email', $post['email']);
			$this->bind(':password', $password);
			
			$row = $this->single();

			if($row){
				$_SESSION['is_logged_in'] = true;
				$_SESSION['autor_data'] = array(
					"id"	=> $row['IdAut'],
					"name"	=> $row['NomAut'],
					"apellido"	=> $row['ApellidoAut'],
					"email"	=> $row['EmailAut'],
					"sexo"	=> $row['SexoAut'],
					"nick"	=> $row['NicknameAut'],
					"fechaNac"	=> $row['FNAut'],
					"imagen"	=> $row['ImgAut'],
					"biografia" => $post['BiografiaAut'],
					"password"	=> $row['PassAut'],
                    "Suscrito" => $row['Suscrito']
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
					"imagen"	=> $row['ImgCli'],
                    "Suscrito" => $row['Suscrito']
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