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
		if(isset($post['password'])){
			$password = md5($post['password']);	
		}
    }    
//Register Client Simple


//Region
/*
	public function registerCliente(){
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
				$this->query('INSERT INTO cliente (PassCli, NomCli,ApellidoCli,EmailCli,SexoCli,NicknameCli) VALUES(:password, :name, :apellido, :email,:sexo, :nick )');
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
				"id"	=> $row['IdCli'],
				"password" => $row['PassCli'],
				"name" => $row['NomCli'],
				"apellido" => $row['ApellidoCli'],
				"email" => $row['EmailCli'],
				"sexo" => $row['SexoCli'],
				"nick" =>$row['NicknameCli'],
				//"fechaNac" =>$row['FNCLI']

			
				);

				header('Location: '.ROOT_URL.'home');
				
			}

		}
		return;
	}
	*/
	//loginSimple

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
/*
                    // chequea si subió una imagen
                    if (count($_FILES) > 0) {
                        if (is_uploaded_file($_FILES['imagen']['tmp_name'])) {
                            $imgContenido = file_get_contents($_FILES['imagen']['tmp_name']); // este es el blob
                        }
                    }
                    else{
                        // no subió ninguna imagen
                        $imgContenido = null;
                    } */
                    
                    // Insert into MySQL
                    $this->query('INSERT INTO cliente (PassCli, NomCli, ApellidoCli, EmailCli, SexoCli, NicknameCli, FNCli, ImgCli) VALUES( :password, :name, :apellido, :email, :sexo, :nick, :fechaNac, :imagen)');
                    $this->bind(':password', $password);  // $password hasheado
                    $this->bind(':name', $post['name']);
                    $this->bind(':apellido', $post['apellido']);
                    $this->bind(':email', $post['email']);
                    $this->bind(':sexo', $post['sexo']);
                    $this->bind(':nick', $post['nick']);
                    //$this->bind(':fechaNac', $post['fechaNac']);
                    //$this->bind(':imagen', $imgContenido );
                    
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
                        //"fechaNac"	=> $row['FNCli'],
                        //"imagen"	=> $row['ImgCli']
                        

                    );

                    header('Location: '.ROOT_URL.'home');
                }
            } 
            }
            return;
    }

	/*
	public function registerCliente(){

        // Sanitize POST
		$post = filter_input_array(INPUT_POST, FILTER_SANITIZE_STRING);
		if(isset($post['password'])){
			$password = md5($post['password']);	
		}
			
        
        if(isset($post['submit'])){
            

            //si es cliente chequea campos requeridos para cliente
            //if($_SESSION['es_cliente']){
                if($post['name'] == '' || $post['apellido'] == '' || $post["sexo"] == '' || $post['nick'] == '' || $post['password'] == '' || $post['email'] == '' ){// $post['fechaNac'] == null ){
                    Messages::setMsg('Please Fill In All Fields', 'error');
                    return;
                }

                //chequea que no esté registrado
                $this->query('SELECT * FROM cliente WHERE EmailCli = :email AND PassCli = :password');
                $this->bind(':email', $post['email']);
                $this->bind(':password', $password);
                $row = $this->single();

                $this->query('SELECT * FROM autor WHERE EmailAut = :email AND PassAut = :password');
                $this->bind(':email', $post['email']);
                $this->bind(':password', $password);
                $row2 = $this->single();

                if($row || $row2){
                    Messages::setMsg('El usuario ya existe', 'error');
                }
                
                else {

                   
                    // Insert into MySQL
                    $this->query('INSERT INTO cliente (PassCli, NomCli, ApellidoCli, EmailCli, SexoCli, NicknameCli) VALUES( :password, :name, :apellido, :email, :sexo, :nick)');
                    $this->bind(':password', $password);  // $password hasheado
                    $this->bind(':name', $post['name']);
                    $this->bind(':apellido', $post['apellido']);
                    $this->bind(':email', $post['email']);
                    $this->bind(':sexo', $post['sexo']);
                    $this->bind(':nick', $post['nick']);
                   // $this->bind(':fechaNac', $post['fechaNac']);
                    //$this->bind(':imagen', $imgContenido );
                    
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
                        //"fechaNac"	=> $row['FNCli'],
                       // "imagen"	=> $row['ImgCli']
                        

                    );

                    header('Location: '.ROOT_URL.'home');
                }
            //} 
            }
            return;
    }
	*/

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
            $this->query('SELECT * FROM Proveedor WHERE EmailProv = :email AND PassProv = :password');
            $this->bind(':email', $post['email']);
            $this->bind(':password', $password);
            $row = $this->single();

            $this->query('SELECT * FROM Proveedor WHERE EmailProv = :email AND PassProv = :password');
            $this->bind(':email', $post['email']);
            $this->bind(':password', $password);
            $row2 = $this->single();

            if($row || $row2){
                Messages::setMsg('El usuario ya existe', 'error');
                
            }
            else {
                
                // Insert into MySQL
                $this->query('INSERT INTO Proveedor (PassProv, NomProv, ApellidoProv, EmailProv, SexoProv, NicknameProv ) VALUES(:password, :name, :apellido, :email, :sexo, :nick)');
                $this->bind(':password', $password);  // $password hasheado
                $this->bind(':name', $post['name']);
                $this->bind(':apellido', $post['apellido']);
                $this->bind(':email', $post['email']);
                $this->bind(':sexo', $post['sexo']);
                $this->bind(':nick', $post['nick']);
                //$this->bind(':fechaNac', $post['fechaNac']);
                //$this->bind(':imagen', $imgContenido);
               // $this->bind(':biografia', $post['biografia']);
                
                
                $this->execute(); 
                
                // se trae al usuario recien creado para setear sus datos en la sesion
                $this->query('SELECT * FROM Proveedor WHERE EmailProv = :email AND PassProv = :password');
                $this->bind(':email', $post['email']);
                $this->bind(':password', $password);

                $row = $this->single();

                // setea los datos del usuario traidos de la bd a una variable de sesion
                $_SESSION['autor_data'] = array(
                "id"	=> $row['IdProv'],
                "name"	=> $row['NomProv'],
                "apellido"	=> $row['ApellidoProv'],
                "email"	=> $row['EmailProv'],
                "sexo"	=> $row['SexoProv'],
                "nick"	=> $row['NicknameProv'],
                //"fechaNac"	=> $row['FNProv'],
               // "imagen"	=> $row['ImgProv'],
                //"biografia" => $post['BiografiaAut'],
                "password"	=> $row['PassProv']
                );

                header('Location: '.ROOT_URL.'home');
            }
        }
        }
        return;
    }

//Mi Login basico para probarlo
/*
	public function login(){
		// Sanitize POST
		$post = filter_input_array(INPUT_POST, FILTER_SANITIZE_STRING);

		if(isset($post['password'])){
		$password = md5($post['password']);	
		}

		 if(isset($post['submit'])){
		
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
					//"fechaNac"	=> $row['FNCli'],
					//"imagen"	=> $row['ImgCli']
				);
				
				
				header('Location: '.ROOT_URL.'shares');} 
		}else {
				Messages::setMsg('Incorrect Login', 'error');
			}
		
		return;
	}
*/
public function login(){
	// Sanitize POST
	$post = filter_input_array(INPUT_POST, FILTER_SANITIZE_STRING);

	if(isset($post['password'])){
	$password = md5($post['password']);	
	}
	

	if(isset($post['submit'])){
		// Compare Login
		$this->query('SELECT * FROM Autor WHERE EmailAut = :email AND PassAut = :password');
		$this->bind(':email', $post['email']);
		$this->bind(':password', $password);
		
		$row = $this->single();

		if($row){
			$_SESSION['is_logged_in'] = true;
			$_SESSION['Proveedor_data'] = array(
				"id"	=> $row['IdProv'],
				"name"	=> $row['NomProv'],
				"apellido"	=> $row['ApellidoProv'],
				"email"	=> $row['EmailProv'],
				"sexo"	=> $row['SexoProv'],
				"nick"	=> $row['NicknameProv'],
				//"fechaNac"	=> $row['FNProv'],
				//"imagen"	=> $row['ImgProv'],
				//"biografia" => $post['BiografiaAut'],
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

/*
public function login(){
	// Sanitize POST
	$post = filter_input_array(INPUT_POST, FILTER_SANITIZE_STRING);

	if(isset($post['password'])){
	$password = md5($post['password']);	
	}

	 if(isset($post['submit'])){
	
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
				//"fechaNac"	=> $row['FNCli'],
				//"imagen"	=> $row['ImgCli']
			);
			
			
			header('Location: '.ROOT_URL.'shares');} 
	} elseif($post['submit']){
		
		$this->query('SELECT * FROM Provee WHERE EmailProv = :email AND PassProv = :password');
		$this->bind(':email', $post['email']);
		$this->bind(':password', $password);
		
		$row = $this->single();

		if($row){
			$_SESSION['is_logged_in'] = true;
			$_SESSION['Proveedor_data'] = array(
				"id"	=> $row['IdProv'],
				"password"	=> $row['PassProv'],
				"name"	=> $row['NomProv'],
				"apellido"	=> $row['ApellidoProv'],
				"email"	=> $row['EmailProv'],
				"sexo"	=> $row['SexoProv'],
				"nick"	=> $row['NicknameProv'],
				//"fechaNac"	=> $row['FNCli'],
				//"imagen"	=> $row['ImgCli']
			);
			
			header('Location: '.ROOT_URL.'shares');

		} 
	else {
			Messages::setMsg('Incorrect Login', 'error');
		}
	
	return;
	
}*/
//Login Completo



//}





	


	





