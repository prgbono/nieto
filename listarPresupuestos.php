<?php
header('Access-Control-Allow-Origin: *');

//BBDD connect
include 'inc/conexion.php';

//cadena a buscar caso que venga del buscador
$keyword = isset($_REQUEST['keyword']) ? '%'.$_REQUEST['keyword'].'%' : NULL;

//cliente a filtrar caso que venga del botón listar presupuestos de un cliente determinado en la pantalla Listado de clientes.
//Si no viene cliente que sea 0 y por ese 0 filtramos la consulta
$cliente = isset($_REQUEST['cliente']) ? $_REQUEST['cliente'] : 0;

/*Esta parte sobra, no entra en este caso nunca
if(is_null($keyword)){
    $sql="select * from pruebas_presupuestos ORDER BY fecha";
}*/
if($cliente!=0){
    $sql="select * from pruebas_presupuestos WHERE id_cliente = '$cliente' ORDER BY fecha";
}
else{
    $sql = "SELECT * FROM pruebas_presupuestos WHERE (id_ppto LIKE '$keyword' or fecha LIKE '$keyword' or id_coche LIKE '$keyword' or id_cliente LIKE '$keyword' or total LIKE '$keyword') ORDER BY fecha";
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

//echo $cliente;
echo '{"Presupuestos":'.json_encode($output).'}';






