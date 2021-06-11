<?php
class ShareModel extends Model{
	public function index(){
		$this->query('SELECT * FROM Recursos ORDER BY create_date DESC');
		$rows = $this->resultSet();
		return $rows;
	}

	public function add(){
		// Sanitize POST
		$post = filter_input_array(INPUT_POST, FILTER_SANITIZE_STRING);

		if(isset($post['submit'])){

			$img=file_get_contents(INPUT_POST,FILTER_SANITIZE_STRING);
			if($post['Nombre'] == ''||  $post['Descript'] ==''|| $post['Descarg']==''  || $post['Tipo'] ==''|| $post['Descript'] == '' || $post['Enlace']=='' || $post['TipoPlan']==''){
				Messages::setMsg('Please Fill In All Fields', 'error');
				return;
			}

			$this->query('INSERT INTO recurso (NomRec,Descript,ImgR,Tipo,TipoPlan,Enlace,IdProv) values(:Nombre,:Descript,:Tipo,:TipoPlan,:Enlace,:IdProv)');
			$this->bind(':Nombre', $post['Nombre']);
			$this->bind(':Tipo',$post['Tipo']);
			$this->bind(':TipoPlan',$post['TipoPlan']);
		//	$this->bind(':ImgR',$img);
			$this->bind(':Descript', $post['Descript']);
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
			header('Location: '.ROOT_URL.'home');
		}
		return;
	}
}