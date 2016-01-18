<?php
header('Access-Control-Allow-Origin: *');

//BBDD connect
include 'inc/conexion.php';

//cadena a buscar caso que venga del buscador
$keyword = isset($_REQUEST['keyword']) ? '%'.$_REQUEST['keyword'].'%' : NULL;

//Esta parte sobra, no entra en este caso nunca
if(is_null($keyword)){
    $sql="select * from pruebas_bbdd ORDER BY sp_title";
}
else{
    $sql = "SELECT * FROM pruebas_bbdd WHERE (part_number LIKE '$keyword' or title LIKE '$keyword' or sp_title LIKE '$keyword' or gbp LIKE '$keyword') ORDER BY sp_title";
}
        
//ejecutamos
$result = mysqli_query($link, $sql);

//JSON
$output= array();
while($fila = mysqli_fetch_assoc($result)){
    //$output[]= $fila; Con esta instrucción bastaría pero los registros con tildes los pone a null
    $output[]=array_map('utf8_encode', $fila);

}

    //Falta el close connection mysqli_close(mysqli_connect($host, $user, $password, $database)) or die("Error en la DCX");

echo '{"Piezas":'.json_encode($output).'}';










