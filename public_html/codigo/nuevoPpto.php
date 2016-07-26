<?php

header('Access-Control-Allow-Origin: *');
include ('../nietoBack/inc/conexion.php');

//Para localhost (MAMP)
//include ('../../../nietoBack/inc/conexion.php');

extract($_REQUEST); 

$canarias_newPpto = isset($_REQUEST['canarias_newPpto']) ? 1 : 0;
$id_ppto = isset($_REQUEST['id_ppto']) ? $_REQUEST['id_ppto'] : NULL;
$id_cliente = isset($_REQUEST['id_cliente']) ? $_REQUEST['id_cliente'] : NULL;

echo 'id_ppto: '.$id_ppto;

//NO SE PQ NO LLEGA EL $_REQUEST['descripcion'.$i]!!!!!!!!!!!!!!!!!!!
echo 'descripcion1: '.$_REQUEST['asd'];



function formato_decimal($valor) {
	$resultado = str_replace(".","",$valor);	//eliminamos el punto de los millares
	$resultado = str_replace(",",".",$resultado);	//sustituimos la coma decimal por el punto
	return $resultado;
}

/*functionnction CurrencyFormat(number, decimalcharacter, thousandseparater)
{
    var decimalplaces = 2;
    number = parseFloat(number);
    var sign = number < 0 ? "-" : "";
    var formatted = new String(number.toFixed(decimalplaces));
    if (decimalcharacter.length && decimalcharacter != ".") {
        formatted = formatted.replace(/\./, decimalcharacter);
    }
    var integer = "";
    var fraction = "";
    var strnumber = new String(formatted);
    var dotpos = decimalcharacter.length ? strnumber.indexOf(decimalcharacter) : -1;
    if (dotpos > -1)
    {
        if (dotpos) {
            integer = strnumber.substr(0, dotpos);
        }
        fraction = strnumber.substr(dotpos + 1);
    }
    else {
        integer = strnumber;
    }
    if (integer) {
        integer = String(Math.abs(integer));
    }
    while (fraction.length < decimalplaces) {
        fraction += "0";
    }
    temparray = new Array();
    while (integer.length > 3)
    {
        temparray.unshift(integer.substr(-3));
        integer = integer.substr(0, integer.length - 3);
    }
    temparray.unshift(integer);
    integer = temparray.join(thousandseparater);
    return sign + integer + decimalcharacter + fraction;
}*/

/* PASOS:
1. INSERTAR TODOS LOS ARTÍCULOS DEL PRESUPUESTO EN DETALLE_PRESUPUESTO
2. INSERTAR EL PRESUPUESTO EN PRESUPUESTOS
3. Ambos pasos hay que hacerlos mediante una transacción en la bbdd*/

for ($i = 0; $i < 10; $i++) {	
	echo $_REQUEST['descripcion'.$i];

	//echo 'con #: ' $('#descripcion'.$i).val(); 
	if ($_REQUEST['descripcion'.$i]!=''){
		array_push($descripcion, $_REQUEST['descripcion'.$i]);
		array_push($ref, $_REQUEST['ref'.$i]);
		array_push($precio, formato_decimal($_REQUEST['precio'.$i]));
		array_push($uds, $_REQUEST['uds'.$i]);
		array_push($cambio, formato_decimal($_REQUEST['cambio'.$i]));
		array_push($pvp, formato_decimal($_REQUEST['pvp'.$i]));
		array_push($dto, $_REQUEST['dto'.$i]);
		array_push($total, formato_decimal($_REQUEST['total'.$i]));
	}
}

/*$descripcion=array_filter($descripcion);
$ref=array_filter($ref);
$precio=array_filter($precio);
$uds=array_filter($uds);
$cambio=array_filter($cambio);
$pvp=array_filter($pvp);
$dto=array_filter($dto);
$total=array_filter($total);*/
//Con esto tengo en cada array exactamente lo que ha metido ek usuario. Independientemente si ha metido alguna descripción y después no unidades. TENGO LOS ARRAYS SIN POSICIONES VACÍAS.
//También me llevo artículos incompletos


/*Distinguir si viene id_ppto o no para esta consulta (como en código/matriculacion)!
Hay que distinguir entre nuevo ppto y edición de pptp*/

if ($id_ppto){
	echo 'En el if de id_ppto: '.$id_ppto;
	//MODIFICACIÓN	
	//0. Me cargo el presupuesto anterior (tengo el id_ppto en la vble id_ppto))
	$query="DELETE from pruebas_detalle_presupuestos where id_ppto = ".$id_ppto;
	//mysqli_query($link, $query);

	// 1. Inserción en Detalle_Presupuestos
	
	for ($i = 0; $i <= count($descripcion); $i++) {
		$query="INSERT INTO pruebas_detalle_presupuestos (id_ppto, descripcion, referencia, uds, precio, cambio, pvp, dto, total) VALUES (".$id_ppto.",'".$descripcion[$i]."', '".$ref[$i]."', '".$uds[$i]."', '".$precio[$i]."', '".$cambio[$i]."', '".$pvp[$i]."', '".$dto[$i]."', '".$total[$i]."')";	
		echo $descripcion[$i];
		//mysqli_query($link, $query); 
	}

	
	//$query quitarle la última ,
	//$query = substr($query, 0, -2);

	/*2.-INSERTAR EN LA TABLA DE PRESUPUESTOS*/
	$query= "INSERT INTO pruebas_presupuestos (fecha, id_coche, id_cliente, asunto,total, transporte, canarias, subtotal, iva) VALUES ('$fecha_newPpto', (SELECT id_coche from pruebas_coches WHERE (id_cliente = '".$id_cliente."' AND ppal=1)), '".$id_cliente."', '$asunto_newPpto', $total, '$transporte_newPpto', '$canarias_newPpto', $subtotal, '$iva_newPpto')";
	//echo $query;
	//mysqli_query($link, $query);
	

	/*
	Arreglar el front del subtotal, IVA y TOTAL (518) de index.php
	el total y el subtotal insertado manualmente
	No viene IVA
	*/

}
else{
	//INSERCIÓN
	echo 'INSERCIÓN';
}

?>
<!-- <script language="javascript">
	window.location='/index.php';
</script> -->
<?php





/*Para que no de error si deja fila d eartículos vacías entre medias
	for ($i = 0; $i <= count($descripcion)-1; $i++) {
    	//$query = $query.$descripcion[$i]."un mojón";
    	$query = $query."((SELECT max(id_ppto) +1 FROM pruebas_presupuestos), ".$descripcion[$i] = ($_REQUEST['descripcion['.$i.']']) ? $descripcion[$i] : ''.", ".$ref[$i] = ($_REQUEST['ref['.$i.']']) ? $ref[$i] : ''.", ".$uds[$i] = ($_REQUEST['uds['.$i.']']) ? $uds[$i] : ''.", ".$precio[$i] = ($_REQUEST['precio['.$i.']']) ? $precio[$i] : ''.", ".$cambio[$i] = ($_REQUEST['cambio['.$i.']']) ? $cambio[$i] : ''.", ".$pvp[$i] = ($_REQUEST['pvp['.$i.']']) ? $pvp[$i] : ''.", ".$dto[$i] = ($_REQUEST['dto['.$i.']']) ? $dto[$i] : ''."), ";
	}*/
		//$descripcion[$i] = ($_REQUEST['descripcion['.$i.']']) ? $descripcion[$i] : '';











