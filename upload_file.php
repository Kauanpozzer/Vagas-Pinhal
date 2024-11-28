<?php


function imagem()
{
$erro="";

$target_dir = "img/";


  /********Definindo novo nome para o arquivo */

  $arquivo = pathinfo($_FILES['fileToUpload']['name']);
  $extensao = ".".$arquivo['extension'];
  date_default_timezone_set('America/Sao_Paulo');
  $novo_nome = date('dmYHis').uniqid(md5(basename($_FILES["fileToUpload"]["name"]))).$extensao;

  //-----------------------------------------



$target_file = $target_dir . $novo_nome; 

$uploadOk = 1;
$imageFileType = strtolower(pathinfo($target_file,PATHINFO_EXTENSION));

// Check if image file is a actual image or fake image
if(isset($_POST["submit"])) {

  $check = getimagesize($_FILES["fileToUpload"]["tmp_name"]);
  if($check !== false) {    
    $uploadOk = 1;
  } else {
    $erro= "Isto não é uma Imagem.";
    header("location:empresa-area.php?erro=$erro"); 
    $uploadOk = 0;
  }
}


// Check file size
if ($_FILES["fileToUpload"]["size"] > 500000) {
    $erro= "Arquivo muito grande.";
    header("location:empresa-area.php?erro=$erro"); 
  $uploadOk = 0;
}

// Allow certain file formats
if($imageFileType != "jpg" && $imageFileType != "png" && $imageFileType != "jpeg"
&& $imageFileType != "gif" && $imageFileType != "avif" && $imageFileType != "svg") {
    $erro= "Só aceita arquivos JPG, JPEG, PNG, GIF & AVIF";
    header("location:empresa-area.php?erro=$erro");    
  $uploadOk = 0;
}

// Check if $uploadOk is set to 0 by an error
// if ($uploadOk == 0) {
//   echo "Sorry, your file was not uploaded.";
// // if everything is ok, try to upload file
// } else

if ($uploadOk==1){


  if (move_uploaded_file(  $_FILES["fileToUpload"]["tmp_name"] , $target_file)) {  
 
   return $target_dir.$novo_nome;
 
  } else {
    $erro= "Não foi possivel upar o a imagem ";
    header("location:empresa-area.php?erro=$erro");    
  }
}

}
?>