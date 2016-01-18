<?php
header('Access-Control-Allow-Origin: *');

//BBDD connect
include 'inc/conexion.php';

//cadena a buscar en los nombres de clientes caso que se informe
$keyword = isset($_REQUEST['keyword']) ? '%'.$_REQUEST['keyword'].'%' : NULL;
//$keyword = '%'.$_POST['keyword'].'%';

//Esta parte sobra, no entra en este caso nunca
if(is_null($keyword)){
    $sql = "SELECT * FROM pruebas_clientes ORDER BY nombre";
}
else{
    $sql = "SELECT * FROM pruebas_clientes WHERE nombre LIKE '$keyword' or coche LIKE '$keyword' or variado LIKE '$keyword' ORDER BY nombre";
}

//ejecutamos
$result = mysqli_query($link, $sql);

//JSON
$output= array();
while($fila = mysqli_fetch_assoc($result)){
    //$output[]= $fila; Con esta instrucción bastaría pero los registros con tildes los pone a null
    $output[]=array_map('utf8_encode', $fila);

}
//echo $sql;
//echo count($output);
echo '{"Clientes":'.json_encode($output).'}';
//Falta el close connection mysqli_close(mysqli_connect($host, $user, $password, $database)) or die("Error en la DCX");




    









