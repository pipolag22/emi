<?php

$user = $_POST["user"];
$pass = $_POST["pass"];

$usuario = "emiman";
$contrasenia = "795879";

if ($usuario == $user && $contrasenia == $pass ){
  header ("location:listar.php");
} else {
  header ("location:error.html");}


 ?>
