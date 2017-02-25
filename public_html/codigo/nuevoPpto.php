<?php
//require_once ('../dompdf/dompdf_config.inc.php');
header('Access-Control-Allow-Origin: *');
//PARA PRODUCCIÓN
include ('../nietoBack/inc/conexion.php');

//Para localhost (MAMP)
//include ('../../../nietoBack/inc/conexion.php');

extract($_POST); 

if($_POST)
{
    /*foreach ($_POST as $clave=>$valor)
    {
		echo "El valor de $clave es: $valor"."\n";
        echo "<br>";
	}
    
    foreach ($descripcion as $clave=>$valor)
    {
        echo "El valor de $clave es: $valor"."\n";
        echo "<br>";
    }
    foreach ($ref as $clave=>$valor)
    {
        echo "El valor de $clave es: $valor"."\n";
        echo "<br>";
    }
    foreach ($precio as $clave=>$valor)
    {
        echo "El valor de $clave es: $valor"."\n";
        echo "<br>";
    }
    foreach ($uds as $clave=>$valor)
    {
        echo "UDS: El valor de $clave es: $valor"."\n";
        echo "<br>";
    }
    foreach ($cambio as $clave=>$valor)
    {
        echo "CAMBIO: El valor de $clave es: $valor"."\n";
        echo "<br>";
    }
    foreach ($pvp as $clave=>$valor)
    {
        echo "PVP: El valor de $clave es: $valor"."\n";
        echo "<br>";
    }
    foreach ($dto as $clave=>$valor)
    {
        echo "DTO: El valor de $clave es: $valor"."\n";
        echo "<br>";
    }
    foreach ($total as $clave=>$valor)
    {
        echo "TOTAL: El valor de $clave es: $valor"."\n";
        echo "<br>";
    }*/

    $canarias_newPpto = isset($_POST['canarias_newPpto']) ? 1 : 0;
    $iva_newPpto = !($_POST['iva_newPpto'] == '') ? $_POST['iva_newPpto'] : 21;

}

$totalTotal = str_replace(',','.',$totalTotal);
$subtotal = str_replace(',','.',$subtotal);
$fecha_newPpto = str_replace('-','/',$fecha_newPpto);

if ($id_ppto){
    $mensaje = 'MOFIDICACIÓN';
    /*1.-MODIFICAR EN LA TABLA DE PRESUPUESTOS*/
    $query= "UPDATE pruebas_presupuestos SET fecha = STR_TO_DATE('$fecha_newPpto', '%d/%m/%Y'), 
        id_coche = '".$vehiculo_newPpto."', id_cliente = '".$cliente_newPpto."', asunto = '$asunto_newPpto', 
        total = '$totalTotal', transporte = '$transporte_newPpto', canarias = '".$canarias_newPpto."', 
        subtotal = '$subtotal', iva = '".$iva_newPpto."' WHERE id_ppto = '$id_ppto' ";
    /*echo $query."\n";*/
    mysqli_query($link, $query);
    
    /* 2.- ELIMINAR TODOS LOS REGISTROS ASOCIADOS a ese id_ppto EN LA TABLA DE DETALLES */
    $query3= "DELETE FROM pruebas_detalle_presupuestos WHERE id_ppto = '$id_ppto' ";
    /*echo $query3."\n";*/
    mysqli_query($link, $query3);

    /* 3.- REESCRIBIR la tabla de detalles (Acción común con la inserción)*/

}
else{
    $mensaje = 'INSERCIÓN';
    
    /*1.-INSERTAR EN LA TABLA DE PRESUPUESTOS*/
    //Para localhost el formato debe ser '%d/%m/%Y' instead of '%d-%m-%Y'
    $query= "INSERT INTO pruebas_presupuestos (fecha, id_coche, id_cliente, asunto, total, transporte, canarias, subtotal, iva) VALUES (STR_TO_DATE('$fecha_newPpto', '%d/%m/%Y'), '".$vehiculo_newPpto."', '".$cliente_newPpto."', '$asunto_newPpto', '$totalTotal', '$transporte_newPpto', '".$canarias_newPpto."', '$subtotal', '".$iva_newPpto."')";
    /*echo $query."\n";*/
    mysqli_query($link, $query);

    //Obtengo el id_ppto recién insentado para usarlo en la tabla de detalles_presupuestos
    $ppto =  mysqli_query($link, "SELECT MAX(id_ppto) as maxId_ppto FROM pruebas_presupuestos"); 
    $maxPpto = mysqli_fetch_assoc($ppto);
    $id_ppto = $maxPpto['maxId_ppto'];

    /*-INSERTAR EN LA TABLA DE PEDIDOS con generado = False*/
    $query= "INSERT INTO pruebas_pedidos (id_ppto, fecha, id_fra, id_coche, id_cliente, total, fra_env, inter, recog, fianza, pagado, cambio, beneficio, anul, iva, subtotal, generado) VALUES ('".$id_ppto."', STR_TO_DATE('$fecha_newPpto', '%d/%m/%Y'), '', '".$vehiculo_newPpto."', '".$cliente_newPpto."', '$totalTotal', 'N', 'N', 'N', 0, 0, 0, 0, 'N', '".$iva_newPpto."', '$subtotal', 'N')";
    
    mysqli_query($link, $query);
    /* 3.- ESCRIBIR la tabla de detalles (Acción común con la modificación)*/

}
        
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

/*echo $query;
echo $query2;*/

mysqli_query($link, $query2); 
       

?>
<script language="javascript">
    //LOCALHOST
    //window.location='/nieto/public_html/index.php';

    //PRODUCCIÓN
    window.location='http://admin.nietogranturismo.com/';    
</script> 
<?php


