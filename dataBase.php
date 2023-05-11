<?php

$servername="localhost";
$db="pokemon";
$user="root";
$pass="";

$conexion= new mysqli($servername, $user, $pass, $db);
$conexion= mysqli_connect($servername, $user, $pass, $db);

if($conexion->connect_error){
    die("conexion fallida");
}