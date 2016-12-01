<?php

header('Access-Control-Allow-Origin: *');
//PARA PRODUCCIÓN
include ('../nietoBack/inc/conexion.php');

//Para localhost (MAMP)
/*include ('../../../nietoBack/inc/conexion.php');*/

extract($_POST); 

if($_POST)
{
    foreach ($_POST as $clave=>$valor)
    {
		echo "El valor de $clave es: $valor"."\n";
        echo "<br>";
	}
    
    /*foreach ($descripcion as $clave=>$valor)
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
        echo "El valor de $clave es: $valor"."\n";
        echo "<br>";
    }
    foreach ($cambio as $clave=>$valor)
    {
        echo "El valor de $clave es: $valor"."\n";
        echo "<br>";
    }
    foreach ($pvp as $clave=>$valor)
    {
        echo "El valor de $clave es: $valor"."\n";
        echo "<br>";
    }
    foreach ($dto as $clave=>$valor)
    {
        echo "El valor de $clave es: $valor"."\n";
        echo "<br>";
    }
    foreach ($total as $clave=>$valor)
    {
        echo "El valor de $clave es: $valor"."\n";
        echo "<br>";
    }*/
}

if ($id_ppto){
    $mensaje = 'MOFIDICACIÓN';
}
else{
    $mensaje = 'INSERCIÓN';

    /*1.-INSERTAR EN LA TABLA DE PRESUPUESTOS*/
    $query= "INSERT INTO pruebas_presupuestos (fecha, id_coche, id_cliente, asunto, total, transporte, canarias, subtotal, iva) 
    VALUES ('$fecha_newPpto', '".$vehiculo_newPpto."', '".$cliente_newPpto."', '$asunto_newPpto', $total, '$transporte_newPpto', '$canarias_newPpto', $subtotal, '$iva_newPpto')";
    echo $query;
    // mysqli_query($link, $query);

    // 2. Inserción en Detalle_Presupuestos 
    /*for ($i = 0; $i <= count($descripcion); $i++) {
        $query="INSERT INTO pruebas_detalle_presupuestos (id_ppto, descripcion, referencia, uds, precio, cambio, pvp, dto, total) VALUES (".$id_ppto.",'".$descripcion[$i]."', '".$ref[$i]."', '".$uds[$i]."', '".$precio[$i]."', '".$cambio[$i]."', '".$pvp[$i]."', '".$dto[$i]."', '".$total[$i]."')";    
        //mysqli_query($link, $query); 
    }*/
    
    //$query quitarle la última ,
    //$query = substr($query, 0, -2);

    


}       

/*function formato_decimal($valor) {
    $resultado = str_replace(".","",$valor);    //eliminamos el punto de los millares
    $resultado = str_replace(",",".",$resultado);   //sustituimos la coma decimal por el punto
    return $resultado;
}
function CurrencyFormat(number, decimalcharacter, thousandseparater)
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
}

for ($i = 0; $i < 10; $i++) {   
    if ($_POST['descripcion'.$i]!=''){
        array_push($descripciones, $_REQUEST['descripcion'.$i]);
        array_push($ref, $_REQUEST['ref'.$i]);
        array_push($precio, formato_decimal($_REQUEST['precio'.$i]));
        array_push($uds, $_REQUEST['uds'.$i]);
        array_push($cambio, formato_decimal($_REQUEST['cambio'.$i]));
        array_push($pvp, formato_decimal($_REQUEST['pvp'.$i]));
        array_push($dto, $_REQUEST['dto'.$i]);
        array_push($total, formato_decimal($_REQUEST['total'.$i]));
    }
}

$descripcion=array_filter($descripcion);
$ref=array_filter($ref);
$precio=array_filter($precio);
$uds=array_filter($uds);
$cambio=array_filter($cambio);
$pvp=array_filter($pvp);
$dto=array_filter($dto);
$total=array_filter($total);*/

//Con esto tengo en cada array exactamente lo que ha metido el usuario. Independientemente si ha metido alguna descripción y después no unidades. TENGO LOS ARRAYS SIN POSICIONES VACÍAS.
//También me llevo artículos incompletos

//0. Me cargo el presupuesto anterior (tengo el id_ppto en la vble id_ppto))
    //$query="DELETE from pruebas_detalle_presupuestos where id_ppto = ".$id_ppto;
    //mysqli_query($link, $query);

    // 1. Inserción en Detalle_Presupuestos 
    /*for ($i = 0; $i <= count($descripcion); $i++) {
        $query="INSERT INTO pruebas_detalle_presupuestos (id_ppto, descripcion, referencia, uds, precio, cambio, pvp, dto, total) VALUES (".$id_ppto.",'".$descripcion[$i]."', '".$ref[$i]."', '".$uds[$i]."', '".$precio[$i]."', '".$cambio[$i]."', '".$pvp[$i]."', '".$dto[$i]."', '".$total[$i]."')";    
        //mysqli_query($link, $query); 
    }*/
    
    //$query quitarle la última ,
    //$query = substr($query, 0, -2);

    /*2.-INSERTAR EN LA TABLA DE PRESUPUESTOS*/
    /*$query= "INSERT INTO pruebas_presupuestos (fecha, id_coche, id_cliente, asunto,total, transporte, canarias, subtotal, iva) VALUES ('$fecha_newPpto', (SELECT id_coche from pruebas_coches WHERE (id_cliente = '".$id_cliente."' AND ppal=1)), '".$id_cliente."', '$asunto_newPpto', $total, '$transporte_newPpto', '$canarias_newPpto', $subtotal, '$iva_newPpto')";
    //mysqli_query($link, $query);*/


?>

<script language="javascript">
	console.log('<?php echo $mensaje; ?>');
	//window.location='/index.php';
</script> 





<?php


