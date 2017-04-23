<?php

/*
1. Guardar/Actualizar pedido en la BBDD
2. Enviar correo al proveedor
*/

header('Access-Control-Allow-Origin: *');
require_once('../Librerias/class.phpmailer.php');
//PARA PRODUCCIÓN
include ('../nietoBack/inc/conexion.php');

//Para localhost (MAMP)
//include ('../../../nietoBack/inc/conexion.php');

extract($_POST); 

/*if($_POST)
{
    foreach ($_POST as $clave=>$valor)
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
    }
    
    echo "id_ppto: El valor de $id_ppto es: $id_ppto"."\n";
    echo "<br>";
    

    //$canarias_newPpto = isset($_POST['canarias_newPpto']) ? 1 : 0;
    $iva_newPpto = !($_POST['iva_newPpto'] == '') ? $_POST['iva_newPpto'] : 21;

}/*

/*GUARDAR PPTO (mismo código que código/nuevoPpto)*/
$canarias_newPpto = isset($_POST['canarias_newPpto']) ? 1 : 0;
$iva_newPpto = !($_POST['iva_newPpto'] == '') ? $_POST['iva_newPpto'] : 21;
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
    //echo $query."\n";
    mysqli_query($link, $query);

    //Obtengo el id_ppto recién insentado para usarlo en la tabla de detalles_presupuestos
    $ppto =  mysqli_query($link, "SELECT MAX(id_ppto) as maxId_ppto FROM pruebas_presupuestos"); 
    $maxPpto = mysqli_fetch_assoc($ppto);
    $id_ppto = $maxPpto['maxId_ppto'];
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
mysqli_query($link, $query2); 
/*FIN GUARDADO PPTO


/*-INSERTAR EN LA TABLA DE PEDIDOS*/
$query= "INSERT INTO pruebas_pedidos (id_ppto, fecha, id_fra, id_coche, id_cliente, total, fra_env, inter, recog, fianza, pagado, cambio, beneficio, anul, iva, subtotal, generado) VALUES ('".$id_ppto."', STR_TO_DATE('$fecha_newPpto', '%d/%m/%Y'), '', '".$vehiculo_newPpto."', '".$cliente_newPpto."', '$totalTotal', 'N', 'N', 'N', 0, 0, 0, 0, 'N', '".$iva_newPpto."', '$subtotal', 'S')";
//echo $query;
mysqli_query($link, $query);

/*//TODO:Comprobar que no se haya enviado ya este pedido
$query= "SELECT * FROM pruebas_pedidos WHERE id_ppto='$id_ppto'";
$result = mysqli_query($link, $query);
if(mysqli_num_rows($result)==0){
    //Primera vez que se envía este presupuesto. Guardar en pruebas_pedidos
    
}else{
    //Presupuesto ya enviado. Advertirlo
}*/


//Obtengo las descripciones de los productos en inglés
foreach ($ref as $clave=>$valor)
{
  $query = "SELECT title FROM pruebas_bbdd WHERE part_number = '$ref[$clave]'";
  $result = mysqli_query($link, $query);
  $result= mysqli_fetch_assoc($result);
  $descripcion[$clave] = $result['title'];
}

/*Enviar correo
Obtener datos necesarios para formar el correo:
Modelo del coche*/
$coche = "SELECT pruebas_coches.modelo, pruebas_coches.anio, pruebas_coches.bastidor  FROM pruebas_coches WHERE pruebas_coches.id_coche = '$vehiculo_newPpto'";
$result = mysqli_query($link, $coche);
$datosCoche= mysqli_fetch_assoc($result);
$coche=$datosCoche['modelo']; 
$anio=$datosCoche['anio'];
$bastidor=$datosCoche['bastidor']; 

//Datos del cliente
$datosCli = "SELECT pruebas_clientes.nombre, pruebas_clientes.tlf1, pruebas_direcciones.calle, pruebas_direcciones.cp, pruebas_direcciones.ciudad FROM pruebas_clientes INNER JOIN pruebas_direcciones ON pruebas_clientes.id_cliente =pruebas_direcciones.id_cliente WHERE pruebas_clientes.id_cliente = '$cliente_newPpto' and pruebas_direcciones.E_F = 'E'";
$result = mysqli_query($link, $datosCli);
$datosCli= mysqli_fetch_assoc($result);
$nombre=$datosCli['nombre']; 
$calle=$datosCli['calle'];
$cp=$datosCli['cp'];
$ciudad=$datosCli['ciudad'];
$tlf1=$datosCli['tlf1'];

$mail = new PHPMailer(); 
$mail->IsSMTP();
$mail->SMTPAuth = true;
$mail->Host = "smtp.nietogranturismo.com"; 
$mail->Username = "comercial@nietogranturismo.com";
$mail->Password = "Ferrari1"; 
$mail->Port = 587; 

$mail->From = "comercial@nietogranturismo.com";
$mail->FromName = "NietoGranTurismo";

//el valor por defecto 10 de Timeout es un poco escaso dado que voy a usar una cuenta gratuita, por tanto lo pongo a 30  
$mail->Timeout=30;

//Indicamos cual es la dirección de destino del correo
$mail->AddAddress('davidoski@hotmail.com');
//Copia/s oculta
$mail->AddBCC('pacoriosgalan@gmail.com');



$articulos = '';
foreach ($descripcion as $clave=>$valor)
{
  if (!$descripcion[$clave]==''){
    $articulos .= '<tr>
    <td class="desc">'.$descripcion[$clave].'</td>
    <td class="ref">'.$ref[$clave].'</td>
    <td class="uds">'.$uds[$clave].'</td>
    </tr>';
  }
}


$body = '<p>Hello Peter, <br>I want to order for a '.$coche.', year: '.$anio.', and #: '.$bastidor.':</p>
<table>
    <thead>
      <tr>
        <th>Descripción / Description</th>
        <th>Referencia / Reference</th>
        <th>Cantidad / Amount</th>
       </tr>
    </thead>
    <tbody>'.$articulos.'
    </tbody>
</table>
    <p>Please send it without any logos of Flying Spares and by UPS (if it\'s not possible with UPS, please let me know before send it) to:</p>
    <p>'.$nombre.'<br>c/ '.$calle.'<br>CP:'.$cp.', '.$ciudad.', (Spain)<br>
    Telf: '.$tlf1.'</p>
<p>Thanks for your attention<br>
David<br>
NietoGranTurismo</p>';


//Asignamos asunto y cuerpo del mensaje
//El cuerpo del mensaje lo ponemos en formato html, haciendo 
//que se vea en negrita
$mail->Subject = "Nieto GranTurismo. Order.";
$mail->Body = $body;
//$mail->Body += "<p>I want to order for a $COCHE .-</p>";

//Definimos AltBody por si el destinatario del correo no admite email con formato html 
$mail->AltBody = "Mensaje de prueba mandado con phpmailer en formato solo texto";

//se envia el mensaje, si no ha habido problemas 
//la variable $exito tendra el valor true
$exito = $mail->Send();

//Si el mensaje no ha podido ser enviado se realizaran 4 intentos mas con un intervalo de 5seg
$intentos=1; 
while ((!$exito) && ($intentos < 5)) {
  sleep(5);
  //echo $mail->ErrorInfo;
  $exito = $mail->Send();
  $intentos=$intentos+1;  
}
 
    
if(!$exito)
{
  /*echo "Problemas enviando correo electrónico a ".$valor;
  echo "<br/>".$mail->ErrorInfo; */
  ?>
  <script language="javascript">
  console.log('Mensaje NO enviado');
  </script> 
  <?php 
}
else
{
  ?>
  <script language="javascript">
  console.log('Mensaje enviado');
  </script> 
<?php
//echo $mensaje;
}

?>
<script language="javascript">
    //LOCALHOST
    //window.location='/nieto/public_html/index.php';

    //PRODUCCIÓN
    window.location='http://admin.nietogranturismo.com/';    
</script> 
<?php


