<?php
//var_dump($_FILES["file"]);
//print_r($_FILES);
//$nombre=$_FILES['archivo']['name'];
//if(! file_exists('archivo'))

//Designa el directorio
$directorio = "uploads/";

//Busca el directora + archivo
$archivo = $directorio . basename($_FILES["file"]["name"]);

//muestra el archivo
//echo $archivo;

//averigua de que extension en el archivo
$tipoArchivo = strtolower(pathinfo($archivo, PATHINFO_EXTENSION));

//validar que es una imagen
$size = getimagesize($_FILES["file"]["tmp_name"]);

//validar que es una imagen
$size = getimagesize($_FILES["file"]["tmp_name"]);

//var_dump($size);



//validando tamaño del archivo
  //$size =  echo $_FILES["file"]["size"];

  if($size !=false)
  {
      echo $_FILES["file"]["size"];

  }else{
      echo "El documento no es una imagen";
  }




?>