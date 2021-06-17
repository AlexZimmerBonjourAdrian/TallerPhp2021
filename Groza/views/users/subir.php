<?php
  //var_dump($_FILES["file"]);
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
    }
  
  


  

?>