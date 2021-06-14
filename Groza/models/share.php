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


			$this->query('INSERT INTO recurso (NomRec,Descript,Tipo,TipoPlan,Enlace,IdProv) values(:Nombre,:Descrip,:Tipo,:TipoPlan,:Enlace,:IdProv)');
			$this->bind(':Nombre', $post['NomRec']);
			$this->bind(':Descrip', $post['Descript']);
			//$this->bind(':ImgR',NULL);
			$this->bind(':Tipo',$post['Tipo']);
			$this->bind(':TipoPlan',$post['TipoPlan']);
			$this->bind(':Enlace',$post['Enlace']);
			$this->bind(':IdProv',$_SESSION['proveedor_data']['id']);
			
			$this->execute();





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