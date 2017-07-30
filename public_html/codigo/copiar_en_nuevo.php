<?php
//require_once ('../dompdf/dompdf_config.inc.php');
header("Content-Type: text/html;charset=utf-8");
header('Access-Control-Allow-Origin: *');
//PARA PRODUCCIÓN
include ('../nietoBack/inc/conexion.php');

extract($_POST); 

$canarias_newPpto = isset($_POST['canarias_newPpto']) ? 1 : 0;
$iva_newPpto = !($_POST['iva_newPpto'] == '') ? $_POST['iva_newPpto'] : 21;
$totalTotal = str_replace(',','.',$totalTotal);
$subtotal = str_replace(',','.',$subtotal);
$fecha_newPpto = str_replace('-','/',$fecha_newPpto);
    
/*1.-INSERTAR EN LA TABLA DE PRESUPUESTOS*/
$query= "INSERT INTO pruebas_presupuestos (fecha, id_coche, id_cliente, asunto, total, transporte, canarias, subtotal, iva) VALUES (STR_TO_DATE('$fecha_newPpto', '%d/%m/%Y'), '".$vehiculo_newPpto."', '".$cliente_newPpto."', '$asunto_newPpto', '$totalTotal', '$transporte_newPpto', '".$canarias_newPpto."', '$subtotal', '".$iva_newPpto."')";
//echo $query."\n";
mysqli_query($link, $query);

//Obtengo el id_ppto recién insentado para usarlo en la tabla de detalles_presupuestos
$ppto =  mysqli_query($link, "SELECT MAX(id_ppto) as maxId_ppto FROM pruebas_presupuestos"); 
$maxPpto = mysqli_fetch_assoc($ppto);
$id_ppto = $maxPpto['maxId_ppto'];
        
//Con esto tengo en cada array exactamente lo que ha metido el usuario. Independientemente si ha metido alguna descripción y después no unidades. TENGO LOS ARRAYS SIN POSICIONES VACÍAS.
$descripcion=array_filter($descripcion);
$ref=array_filter($ref);
$precio=array_filter($precio);
$uds=array_filter($uds);
$cambio=array_filter($cambio);
$pvp=array_filter($pvp);
$dto=array_filter($dto);
$total=array_filter($total);

$query2="INSERT INTO pruebas_detalle_presupuestos (id_ppto, descripcion, referencia, uds, precio, cambio, pvp, dto, total) VALUES ";   
foreach ($descripcion as $clave=>$valor)
{
    $precio = str_replace(',','.',$precio);
    $cambio = str_replace(',','.',$cambio);
    $pvp = str_replace(',','.',$pvp);
    $total = str_replace(',','.',$total);
    $query2.= "(".$id_ppto.",'$valor', '".$ref[$clave]."', ".$uds[$clave].", '".$precio[$clave]."', '".$cambio[$clave]."', '".$pvp[$clave]."', '".$dto[$clave]."', '".$total[$clave]."'),";
}
$query2 = substr($query2, 0, -1);
mysqli_query($link, $query2); 

/*
echo $query;
echo $query2;
*/

?>
<script language="javascript">
	/*<script type='text/javascript'>*/
    window.location='http://admin.nietogranturismo.com/?p=cen';
    /*$(document).ready(function(){
    	document.getElementById("contenedor").style.left = "-300%";
    	console.log('contenedor -300');    
    });*/
</script> 
<?php


