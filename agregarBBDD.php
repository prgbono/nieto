<?php

//Esta instrucción es para que funcione entre servidores, incluido si lo piruebas en el Chrome
header('Access-Control-Allow-Origin: *');
include 'inc/conexion.php';

extract($_REQUEST); 
$partNumber = utf8_decode(trim($partNumber));
$title = utf8_decode(trim($title));
$titulo = utf8_decode(trim($titulo));
$gbp = utf8_decode(trim($gbp));

//1. Comprobar que no exista ya el partNumber enviado
$query = "SELECT * FROM pruebas_bbdd WHERE part_number='$partNumber'";
$result = mysqli_query($link, $query);
if (mysqli_num_rows($result)>0){
    //Ya existe
    echo -1;
}else{
    //no existe. Insertar
    $query= "INSERT INTO pruebas_bbdd (part_number, title, sp_title, gbp) VALUES ('$partNumber', '$title', '$titulo', '$gbp')";
    $result=  mysqli_query($link, $query);
    echo 1;
}

