<?php

header('Access-Control-Allow-Origin: *');

//Incluir el fichero de conexión para conectar con la BBDD
include 'inc/conexion.php';

// Obtener los datos que nos envía jquery 
extract($_REQUEST); //A partir de esta línea tenemos disponibles unas variables que se llaman igual que el atributo name de los inputs del formulario. 

$cliente_newPpto = isset($_REQUEST['cliente_newPpto']) ? $_REQUEST['cliente_newPpto'] : 1;


echo $cliente_newPpto;

/*if (no trae artículos){
    echo -1;
}
else{
    
}*/