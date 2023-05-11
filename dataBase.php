<?php

$servername="localhost";
$db="pokemon";
$user="root";
$pass="root";

$conexion= mysqli_connect($servername, $user, $pass, $db);
// $conexion= new mysqli($servername, $user, $pass, $db);
if($conexion->connect_error){
    die("conexion fallida");
}

