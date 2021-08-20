<?php
class  ArticuloModel extends Model{
	
	
	public function index(){

		$this->query('SELECT * FROM recurso ORDER BY Tipo DESC');
		$rows = $this->resultSet();
		return $rows;
	}

	public function buscar(){

		$post = filter_input_array(INPUT_POST, FILTER_SANITIZE_STRING);
		
		/*if($post['submit']){
		{
	
			if($post['nombre'] == ''){
				Messages::setMsg('Please Fill In All Fields', 'error');
				return;
				
			}
			else{
			
			$this->query('SELECT * FROM recurso WHILE :nombre = nombre');
			$this->bind(':nombre',$post['nombre']);
			$row = $this->single();
			
	
			*/
			
			if((isset($_SESSION['cliente_data']['id']) === isset($_SESSION['suscripcion_data']['idcli']))===false || (isset($_SESSION['suscripcion_data']['tipoPlan']) != isset($_SESSION['recurso_data']['tipoPlan']))) 
				{
					
					if(isset($_SESSION['recurso_data']['tipoPlan']) === 'Silver'  &&  isset($_SESSION['suscripcion_data']['tipoPlan']) === 'Free')
					{
						header('Location: '.ROOT_URL.'users/suscripcion');
					}
					elseif(isset($_SESSION['recurso_data']['tipoPlan']) == 'Gold'  &&  ((isset($_SESSION['suscripcion_data']['idcli']) == 'Free') || isset($_SESSION['suscripcion_data']['idcli']) == 'Silver'))
					{
						header('Location: '.ROOT_URL.'users/suscripcion');
					}
				}
				
				//else{
				if($post['nombre'] == '')
				{
				
					Messages::setMsg("se deve ingresar un nombre","error");
	
				}
				
				else{
				echo $post['nombre'];
				
				 $this->query('SELECT * FROM recurso WHERE NomRec = :nombre');
				 $this->bind(':nombre',$post['nombre']);
				
				 $row= $this->single();
				
	
				 /*
				 $this->query('SELECT * FROM recurso WHERE NomRec = :nombre');
				 $this->bind(':nombre',$post['nombre']);
				 $row= $this->single();
	*/
	
				 //$_SESSION['is_logged_in'] = true;
				 if($row)
				 {
				 //$_SESSION['is_logged_in'] = true;
				 $_SESSION['recurso_data'] = array(
					 "name" =>$row['NomRec'],
					 "descript" => $row['Descrip'],
					 "tipo" => $row['Tipo'], 
					 "tipoPlan" => $row['TipoPlan'],
					 "ImgR" => $row['ImgR'],
					 "enlace" =>$row['Enlace'],
					 "idProv" => $row['IdProv']
				 );
				//}
				
				}
				return;
				
				 
	
				 }
				 
				// else{
				// 	Messages::setMsg('El Recurso no se a encontrado','error');
				//  }
	/*
				 if($row)
				 {
					$this->query('SELECT * FROM recurso WHERE NomRec = :nombre');
					$this->bind(':nombre',$post['nombre']);
				   
					$row= $this->single();
					//$_SESSION['is_logged_in'] = true;
					$_SESSION['recurso_data'] = array(
						"id" => $row['IdRec'],
						"name" =>$row['NomRec'],
						"descript" => $row['Descript'],
						"tipo" => $row['Tipo'], 
						"tipoPlan" => $row['TipoPlan'],
					//	"ImgR" => $row['ImgR'],
						"enlace" =>$row['Enlace'],
						"idProv" => $row['IdProv']
					);
	
						//header('Location: '.ROOT_URL.'shares');
					
				 }
				 else{
					Messages::setMsg('El Recurso no se a encontrado','error');
				 }
	 */
			
		
				
			//}
			// return;
			
			
		
			
	
	
		}
	
	
	public function UploadFile(){
	
			$file=file_get_contents(INPUT_POST,FILTER_SANITIZE_STRING);

			if(count($_FILES) > 0)
			{
				$directorio=   ("ROOT_URL" + "/assets/resources/");
				$archivo = $directorio . basename($_FILES["file"]["name"]); 
				$tipoArchivo = strtolower(pathinfo($archivo,PATHINFO_EXTENSION));
				if($tipoArchivo == "mov" || $tipoArchivo == "mp4" || $tipoArchivo =="mkv")
				{
					copy(file_get_contents($_FILES['file']['tmp_name']),$directorio);
				}else
				{
					echo "no cargo";
				}
			}
			else
			{
				echo "no  hay archivo";
			}
	}
	

	public function add(){
		// Sanitize POST
		$post = filter_input_array(INPUT_POST, FILTER_SANITIZE_STRING);

		if($post['submit']){

			
			//$img=file_get_contents(INPUT_POST,FILTER_SANITIZE_STRING);
			if( $post['NomRec'] == '' ||  $post['Descript'] == '' || $post['Tipo'] == ''|| $post['TipoPlan']== '' || file_exists($_FILES["file"]["name"])  ){
				Messages::setMsg('Please Fill In All Fields', 'error');
				return;
			}
			
			
			if (count($_FILES) > 0) 
			{
				
				$targetfolder = 'C:/wamp64/www/Groza/assets/upload/';

			$archivoExiste=file_exists($targetfolder . $_FILES["file"]["name"]);
				if (is_uploaded_file($_FILES['imagen']['tmp_name'])) {
					$imgContenido = file_get_contents($_FILES['imagen']['tmp_name']); // este es el blob
				}

				if ($archivoExiste === true) 
				{
					echo $_FILES["file"]["name"] . "El archivo ya";
					$pathDownload="download.php?path=" . "assets/upload/" . $_FILES["file"]["name"];
				}
				
				else {
					move_uploaded_file($_FILES["file"]["tmp_name"],
						$targetfolder . $_FILES["file"]["name"]);
				  $pathDownload="download.php?path=" . "assets/upload/". $_FILES["file"]["name"];
				 }
			}
			else{
				// no subió ninguna imagen
				$imgContenido = null;
			} 

			
			
			
			
			
		//	UploadFile();

		$this->query('INSERT INTO recurso (NomRec,Descrip,Tipo,TipoPlan,ImgR,Enlace,IdProv) values(:nombre,:descrip,:tipo,:tipoPlan,:imgR,:enlace,:idProv)');
		$this->bind(':nombre', $post['NomRec']);
		$this->bind(':descrip', $post['Descript']);
		$this->bind(':imgR',$imgContenido);
		$this->bind(':tipo',$post['Tipo']);
		$this->bind(':tipoPlan',$post['TipoPlan']);
		$this->bind(':enlace',$pathDownload);
		$this->bind(':idProv',$_SESSION['proveedor_data']['id']);
		
			
			$this->execute();
			/*
			$this->query('INSERT INTO recurso (idRec,NomRec,Descrip,Tipo,TipoPlan,ImgR,Enlace,IdProv) values(:nombre,:descrip,:tipo,:tipoPlan,:imagen,:enlace,:idProv)');
			$this->bind(':nombre', "Alex");
			$this->bind(':descrip', "Hola que hace");
			$this->bind(':imagen',NUll);
			$this->bind(':tipo',"Libro");
			$this->bind(':tipoPlan',"Free");
			$this->bind(':enlace',"Link");
			$this->bind(':idProv',$_SESSION['proveedor_data']['id']);
			
			$this->execute();
*/

			$this->query('SELECT * FROM recurso WHERE NomRec = :nombre');
			$this->bind(':nombre',$post['nombre']);
			
			$row = $this->single();
			
		//	$_SESSION['is_logged_in'] = true;
			$_SESSION['recurso_data'] = array(
				"id" => $row['IdRec'],
				"name" =>$row['NomRec'],
				"descript" => $row['Descript'],
				"tipo" => $row['Tipo'], 
				"tipoPlan" => $row['TipoPlan'],
				"imgR" => $row['ImgR'],
				"enlace" =>$row['Enlace'],
				"idProv" => $row['IdProv']
			);
				
			header('Location: '.ROOT_URL.'Articulos');	
			//	
			
			//header('Location: '.ROOT_URL.'home');
			/*
			// Insert into MySQL
			$this->query('INSERT INTO shares (title, body, link, user_id) VALUES(:title, :body, :link, :user_id)');
			$this->bind(':title', $post['title']);
			$this->bind(':body', $post['body']);
			$this->bind(':link', $post['link']);
			$this->bind(':user_id', 1);
			$this->execute();
			*/
			// Verify
			/*if($this->lastInsertId()){
				// Redirect
				header('Location: '.ROOT_URL.'shares');
			}*/
			//header('Location: '.ROOT_URL.'home');
			
		}
		
		return;	
	}
	
	

	
}