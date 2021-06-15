<?php
class ShareModel extends Model{
	public function index(){
		$this->query('SELECT * FROM recurso ORDER BY Tipo DESC');
		$rows = $this->resultSet();
		return $rows;
	}

	public function add(){
		// Sanitize POST
		$post = filter_input_array(INPUT_POST, FILTER_SANITIZE_STRING);

		if($post['submit']){

			//$img=file_get_contents(INPUT_POST,FILTER_SANITIZE_STRING);
		/*	if( $post['NomRec'] == '' ||  $post['Descrip'] == '' || $post['Tipo'] == ''|| $post['TipoPlan']== '' || $post['Enlace']== ''){
				Messages::setMsg('Please Fill In All Fields', 'error');
				return;
			}
			*/


			$this->query('INSERT INTO recurso (NomRec,Descript,Tipo,TipoPlan,Enlace,IdProv) values(:nombre,:descrip,:tipo,:tipoPlan,:enlace,:idProv)');
			$this->bind(':nombre', $post['NomRec']);
			$this->bind(':descrip', $post['Descript']);
			//$this->bind(':ImgR',NULL);
			$this->bind(':tipo',$post['Tipo']);
			$this->bind(':tipoPlan',$post['TipoPlan']);
			$this->bind(':enlace',$post['Enlace']);
			$this->bind(':idProv',$_SESSION['proveedor_data']['id']);
			
			$this->execute();

			$this->query('SELECT * FROM recurso WHERE NomRec = :nombre');
			$this->bind(':nombre',$post['nombre']);
			
			$row = $this->single();

			$_SESSION['is_logged_in'] = true;
			$_SESSION['recurso_data'] = array(
				"id" => $row['IdRec'],
				"name" =>$row['NomRec'],
				"descript" => $row['Descript'],
				"tipo" => $row['Tipo'], 
				"tipoPlan" => $row['TipoPlan'],
				"enlace" =>$row['Enlace'],
				"idProv" => $row['IdProv']
			);
						
			
			header('Location: '.ROOT_URL.'home');
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