<?php

header('Access-Control-Allow-Origin: *');
//PARA PRODUCCIÓN
include ('../nietoBack/inc/conexion.php');

//Para localhost (MAMP)
/*include ('../../../nietoBack/inc/conexion.php');*/

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

if ($id_ppto){
    $mensaje = 'MOFIDICACIÓN';
}
else{
    $mensaje = 'INSERCIÓN';
    
    /*1.-INSERTAR EN LA TABLA DE PRESUPUESTOS*/
    $query= "INSERT INTO pruebas_presupuestos (fecha, id_coche, id_cliente, asunto, total, transporte, canarias, subtotal, iva) VALUES (STR_TO_DATE('$fecha_newPpto', '%d/%m/%Y'), '".$vehiculo_newPpto."', '".$cliente_newPpto."', '$asunto_newPpto', $totalTotal, '$transporte_newPpto', '".$canarias_newPpto."', $subtotal, '".$iva_newPpto."')";
    /*echo $query."\n";*/

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
        $query2.= "(".$id_ppto.",'$valor', '".$ref[$clave]."', ".$uds[$clave].", ".$precio[$clave].", ".$cambio[$clave].", '".$pvp[$clave]."', '".$dto[$clave]."', ".$total[$clave]."),";
    }
    $query2 = substr($query2, 0, -1);
    /*echo $query2;*/

    mysqli_query($link, $query);
    mysqli_query($link, $query2); 

}       

?>
<script language="javascript">
	console.log('<?php echo $mensaje; ?>');
	window.location='/index.php';
</script> 
<?php


