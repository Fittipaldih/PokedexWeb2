<?php

$servername="localhost";
$db="pokemon";
$user="root";
$pass="";

$conexion= mysqli_connect($servername, $user, $pass, $db);

if($conexion->connect_error){
    die("conexion fallida");
}