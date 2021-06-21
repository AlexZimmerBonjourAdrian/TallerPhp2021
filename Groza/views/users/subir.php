<?php


//var_dump($_FILES["file"]);
/*
  //
  $directorio = "Groza/assets/resources/";

  //FileDestination
  $archivo = $directorio . basename($_FILES["file"]["name"]);

  //muestra el archivo
  //echo $archivo;
  
  //averigua de que extension en el archivo
  $tipoArchivo = strtolower(pathinfo($archivo, PATHINFO_EXTENSION));
  
  //validar que es una imagen
  //$size = getimagesize($_FILES["file"]["tmp_name"]);
  
  //validar que es una imagen
  $checarSiImagem = getimagesize($_FILES["file"]["tmp_name"]);
  
  //var_dump($size);
  
  
  
  //validando tamaño del archivo
    //$size =  echo $_FILES["file"]["size"];
  
    if($checarSiImagem != false)
    {
        $size  = $_FILES["file"]["size"];
       
        if($size > 5000000){
          echo "El archivo tiene que ser menor a 500kb";
      }else{
  
  
  
          //validar tipo de imagen
          if($tipoArchivo == "jpg" || $tipoArchivo == "jpeg" ){
              // se valido el archivo correctamente
  
              if(move_uploaded_file($_FILES["file"]["tmp_name"],$archivo))
                  echo "El archivo se subio correctamente";
              else{
                  echo "Hubo un error en la subida";
              }
          }else{
              echo "Solo se admiten archivos jpg";
          }
      }
  
    }else{
        echo "El documento no es una imagen";
    }*/
    //$post = filter_input_array(INPUT_POST, FILTER_SANITIZE_STRING);
   // public function UploadFile(){
	//if(isset($post['submit']))
    //{
        

		/*
        $file=file_get_contents(INPUT_POST,FILTER_SANITIZE_STRING);

        if(count($_FILES) > 0)
        {
            $directorio=  "/assets/resources/";
            $archivo = basename($_FILES["file"]["name"]); 
            $tipoArchivo = strtolower(pathinfo($archivo, PATHINFO_EXTENSION));
            if($tipoArchivo == "mov" || $tipoArchivo == "mp4" || $tipoArchivo =="mkv")
            {
                copy(file_get_contents($archivo,$directorio));
            }else
            {
                echo "no cargo";
            }
        }
        else
        {
            echo "no  hay archivo";
        }
        */
        ini_set('upload_max_filesize', '50M');
        ini_set('post_max_size', '50M');
        ini_set('max_input_time', 300);
        ini_set('max_execution_time', 300);
        
        $targetfolder = 'C:/wamp64/www/Groza/assets/upload/';

        $archivoExiste=file_exists($targetfolder . $_FILES["file"]["name"]);
        /*
        if(!file_exists($targetfolder))
        {
            mkdir($targetfolder,0777, true);
        }
        */
        if ($archivoExiste === true) 
        {
            echo $_FILES["file"]["name"] . "already exists.";
        }
       else {
           move_uploaded_file($_FILES["file"]["tmp_name"],
               $targetfolder . $_FILES["file"]["name"]);
       
    }
//} }


  //  }


?>