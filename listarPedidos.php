<?php
header('Access-Control-Allow-Origin: *');

//BBDD connect
include 'inc/conexion.php';


//cadena a buscar caso que venga del buscador
$keyword = isset($_REQUEST['keyword']) ? '%'.$_REQUEST['keyword'].'%' : NULL;

//Esta parte sobra, no entra en este caso nunca
if(is_null($keyword)){
    //sql's de los 4 trimestres del año en curso y del resto de pedidos de otros años
    $sql_tri1="select * from pruebas_pedidos where date(fecha) between '".date("Y")."-01-01 00:00:00' AND '".date("Y")."-03-31 23:59:59'";
    $sql_tri2="select * from pruebas_pedidos where date(fecha) between '".date("Y")."-04-01 00:00:00' AND '".date("Y")."-06-30 23:59:59'";
    $sql_tri3="select * from pruebas_pedidos where date(fecha) between '".date("Y")."-07-01 00:00:00' AND '".date("Y")."-09-30 23:59:59'";
    $sql_tri4="select * from pruebas_pedidos where date(fecha) between '".date("Y")."-10-01 00:00:00' AND '".date("Y")."-12-31 23:59:59'";
    $sql_PedTotal="select * from pruebas_pedidos where date(fecha) not between '".date("Y")."-01-01' AND '".date("Y")."-12-31'";

}
else{
    $sql_tri1="select * from pruebas_pedidos where (date(fecha) between '".date("Y")."-01-01 00:00:00' AND '".date("Y")."-03-31 23:59:59') AND (id_pedido LIKE '$keyword' or fecha LIKE '$keyword' or id_fra LIKE '$keyword' or id_coche LIKE '$keyword' or id_cliente LIKE '$keyword')";
    
    $sql_tri2="select * from pruebas_pedidos where (date(fecha) between '".date("Y")."-04-01 00:00:00' AND '".date("Y")."-06-30 23:59:59') AND (id_pedido LIKE '$keyword' or fecha LIKE '$keyword' or id_fra LIKE '$keyword' or id_coche LIKE '$keyword' or id_cliente LIKE '$keyword')";
    
    $sql_tri3="select * from pruebas_pedidos where (date(fecha) between '".date("Y")."-07-01 00:00:00' AND '".date("Y")."-09-30 23:59:59') AND (id_pedido LIKE '$keyword' or fecha LIKE '$keyword' or id_fra LIKE '$keyword' or id_coche LIKE '$keyword' or id_cliente LIKE '$keyword')";
    
    $sql_tri4="select * from pruebas_pedidos where (date(fecha) between '".date("Y")."-10-01 00:00:00' AND '".date("Y")."-12-31 23:59:59') AND (id_pedido LIKE '$keyword' or fecha LIKE '$keyword' or id_fra LIKE '$keyword' or id_coche LIKE '$keyword' or id_cliente LIKE '$keyword')";
    
    $sql_PedTotal="select * from pruebas_pedidos where (date(fecha) not between '".date("Y")."-01-01' AND '".date("Y")."-12-31') AND (id_pedido LIKE '$keyword' or fecha LIKE '$keyword' or id_fra LIKE '$keyword' or id_coche LIKE '$keyword' or id_cliente LIKE '$keyword')";
    
}

//ejecutamos
$result1 = mysqli_query($link, $sql_tri1);
$result2 = mysqli_query($link, $sql_tri2);
$result3 = mysqli_query($link, $sql_tri3);
$result4 = mysqli_query($link, $sql_tri4);
$resultPedTotal = mysqli_query($link, $sql_PedTotal);


//JSON
$output1= array();
while($fila = mysqli_fetch_assoc($result1)){
    //$output[]= $fila; Con esta instrucción bastaría pero los registros con tildes los pone a null
    $output1[]=array_map('utf8_encode', $fila);
}

$output2= array();
while($fila = mysqli_fetch_assoc($result2)){
    $output2[]=array_map('utf8_encode', $fila);
}

$output3= array();
while($fila = mysqli_fetch_assoc($result3)){
    $output3[]=array_map('utf8_encode', $fila);
}

$output4= array();
while($fila = mysqli_fetch_assoc($result4)){
    $output4[]=array_map('utf8_encode', $fila);
}

$outputPedTotal= array();
while($fila = mysqli_fetch_assoc($resultPedTotal)){
    $outputPedTotal[]=array_map('utf8_encode', $fila);
}

    //Falta el close connection mysqli_close(mysqli_connect($host, $user, $password, $database)) or die("Error en la DCX");

echo '{"Pedidos":'.json_encode(array($output1, $output2, $output3, $output4, $outputPedTotal)).'}';





