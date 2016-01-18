<?php
header('Access-Control-Allow-Origin: *');

//1.Incluir el fichero de conexión para conectar con la BBDD
include 'inc/conexion.php';

//2. Obtener los datos que nos envía jquery 
extract(utf8_decode($_REQUEST)); //A partir de esta línea tenemos disponibles unas variables que se llaman igual que el atributo name de los inputs del formulario. 

$id_cliente = isset($_REQUEST['id_cliente']) ? $_REQUEST['id_cliente'] : NULL; 
$id_coches = isset($_REQUEST['id_coches']) ? $_REQUEST['id_coches'] : NULL; 
$id_direcciones = isset($_REQUEST['id_direcciones']) ? $_REQUEST['id_direcciones'] : NULL;
$coches_array = isset($_REQUEST['$coches_array']) ? $_REQUEST['$coches_array'] : NULL;

//UTF-8 -- TRAERLO Y DECODIFICARLO EN UN ARRAY PQ NO SÉ LAS VARIABLES QUE VA A TRAER!!!
$nombre = (trim($nombre));
$variado = (trim($variado));
$tlf0 = (trim($tlf0)); //Cambiar noombre de campo de los tlf's
$email1 = (trim($email1));
$ciudad = (trim($ciudad));
$ppal = (trim($ppal));
$envio_nombre = (trim($envio_nombre));
$envio_calle = (trim($envio_calle));
$envioCP = (trim($envioCP));
$envio_ciudad = (trim($envio_ciudad));
$fact_nombre = (trim($fact_nombre));
$fact_calle = (trim($fact_calle));
$factCP = (trim($factCP));
$factNIF = (trim($factNIF));
$fact_ciudad = (trim($fact_ciudad));

//Puede estar el problema en definir arrays en PHP como receptores de los datos enviados
echo $coches_array;


/*REcorrer el array de id_coches
 * $coche0 = utf8_decode(trim($coche0));
 * $coche1 = utf8_decode(trim($coche1));
 * $coche2 = utf8_decode(trim($coche2)); 
 * $bas0 = utf8_decode(trim($bas0));
 * $bas1 = utf8_decode(trim($bas1));
 * $bas2 = utf8_decode(trim($bas2));
 * $anio0 = utf8_decode(trim($anio0));
 * $anio1 = utf8_decode(trim($anio1));
 * $anio2 = utf8_decode(trim($anio2));
 */

 
