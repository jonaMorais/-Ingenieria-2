<?php
require_once 'conexion.php';
// se recibe el valor que identifica la imagen en la tabla
$id = $_GET['id_Publi'];

$link = conect();

// se recupera la información de la imagen
$sql= "SELECT foto, tipoImagen FROM publicacion WHERE idPublicacion = $id";
$result= mysqli_query($link, $sql);
$row= mysqli_fetch_assoc($result);

// se imprime la imagen y se le avisa al navegador que lo que se está
// enviando no es texto, sino que es una imagen un tipo en particular
header("Content-type: " . $row['tipoImagen']);
echo $row['foto'];

?>
