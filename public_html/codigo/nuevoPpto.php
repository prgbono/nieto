<?php

header('Access-Control-Allow-Origin: *');
include ('../../nietoBack/inc/conexion.php');
//Para localhost (MAMP)
//include ('../../../nietoBack/inc/conexion.php');

extract($_REQUEST); 

$canarias_newPpto = isset($_REQUEST['canarias_newPpto']) ? 1 : 0;
$id_ppto = isset($_REQUEST['id_ppto']) ? $_REQUEST['id_ppto'] : NULL;
$id_cliente = isset($_REQUEST['id_cliente']) ? $_REQUEST['id_cliente'] : NULL;

/* PASOS:
1. INSERTAR TODOS LOS ARTÍCULOS DEL PRESUPUESTO EN DETALLE_PRESUPUESTO
2. INSERTAR EL PRESUPUESTO EN PRESUPUESTOS
3. Ambos pasos hay que hacerlos mediante una transacción en la bbdd*/

/*$descripcion= [];
$ref=[];
$precio=[];
$uds=[];
$cambio=[];
$pvp=[];
$dto=[];
$total=[];*/

for ($i = 1; $i < 11; $i++) {	
	array_push($descripcion, $_REQUEST['descripcion'.$i]);
	array_push($ref, $_REQUEST['ref'.$i]);
	array_push($precio, $_REQUEST['precio'.$i]);
	array_push($uds, $_REQUEST['uds'.$i]);
	array_push($cambio, $_REQUEST['cambio'.$i]);
	array_push($pvp, $_REQUEST['pvp'.$i]);
	array_push($dto, $_REQUEST['dto'.$i]);
	array_push($total, $_REQUEST['total'.$i]);

}

$descripcion=array_filter($descripcion);
$ref=array_filter($ref);
$precio=array_filter($precio);
$uds=array_filter($uds);
$cambio=array_filter($cambio);
$pvp=array_filter($pvp);
$dto=array_filter($dto);
$total=array_filter($total);
//Con esto tengo en cada array exactamente lo que ha metido ek usuario. Independientemente si ha metido alguna descripción y después no unidades. TENGO LOS ARRAYS SIN POSICIONES VACÍAS.
//También me llevo artículos incompletos


/*Distinguir si viene id_ppto o no para esta consulta (como en código/matriculacion)!*/
// 1. Inserción en Detalle_Presupuestos
for ($i = 0; $i <= count($descripcion)-1; $i++) {
	$query="INSERT INTO pruebas_detalle_presupuestos (id_ppto, descripcion, referencia, uds, precio, cambio, pvp, dto, total) VALUES (".$id_ppto.",'".$descripcion[$i]."', '".$ref[$i]."', '".$precio[$i]."', '".$uds[$i]."', '".$cambio[$i]."', '".$pvp[$i]."', '".$dto[$i]."', '".$total[$i]."')";	
	echo $query;
	//mysqli_query($link, $query);
}


/*
El asunto no viene
el total tampoco
Distinguir entre edición de presupuesto y nuevo!!!
El total no se guarda en la tabla correctamente. A partir de la coma se jode*/

//$query quitarle la última ,
//$query = substr($query, 0, -2);

/*2.-INSERTAR EN LA TABLA DE PRESUPUESTOS*/
$query= "INSERT INTO pruebas_presupuestos (fecha, id_coche, id_cliente, asunto,total, transporte, canarias, subtotal, iva) VALUES ('$fecha_newPpto', (SELECT id_coche from pruebas_coches WHERE (id_cliente = '".$id_cliente."' AND ppal=1)), '".$id_cliente."', '$asunto_newPpto', $total, '$transporte_newPpto', '$canarias_newPpto', $subtotal, '$iva_newPpto')";
//mysqli_query($link, $query);
//echo $query;

/*
Arreglar el front del subtotal, IVA y TOTAL (518) de index.php
el total y el subtotal insertado manualmente
No viene IVA
*/




/*Para que no de error si deja fila d eartículos vacías entre medias
	for ($i = 0; $i <= count($descripcion)-1; $i++) {
    	//$query = $query.$descripcion[$i]."un mojón";
    	$query = $query."((SELECT max(id_ppto) +1 FROM pruebas_presupuestos), ".$descripcion[$i] = ($_REQUEST['descripcion['.$i.']']) ? $descripcion[$i] : ''.", ".$ref[$i] = ($_REQUEST['ref['.$i.']']) ? $ref[$i] : ''.", ".$uds[$i] = ($_REQUEST['uds['.$i.']']) ? $uds[$i] : ''.", ".$precio[$i] = ($_REQUEST['precio['.$i.']']) ? $precio[$i] : ''.", ".$cambio[$i] = ($_REQUEST['cambio['.$i.']']) ? $cambio[$i] : ''.", ".$pvp[$i] = ($_REQUEST['pvp['.$i.']']) ? $pvp[$i] : ''.", ".$dto[$i] = ($_REQUEST['dto['.$i.']']) ? $dto[$i] : ''."), ";
	}*/
		//$descripcion[$i] = ($_REQUEST['descripcion['.$i.']']) ? $descripcion[$i] : '';











