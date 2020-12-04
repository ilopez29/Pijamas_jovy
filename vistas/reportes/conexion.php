<?php 

   class Conexion{
   	  public function conectar(){
   	  	  $conexion= new PDO("mysql:host=localhost;dbname=jovypijamas","root","");
   	  	  return $conexion;
   	  }
   }
 $mysqli = new mysqli ("localhost","root","","jovypijamas");
 ?>
