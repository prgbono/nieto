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
    }
    
    echo "id_ppto: El valor de $id_ppto es: $id_ppto"."\n";
    echo "<br>";*/
    

    //$canarias_newPpto = isset($_POST['canarias_newPpto']) ? 1 : 0;
    $iva_newPpto = !($_POST['iva_newPpto'] == '') ? $_POST['iva_newPpto'] : 21;

}

/*-INSERTAR EN LA TABLA DE PEDIDOS*/
$query= "INSERT INTO pruebas_pedidos (id_ppto, fecha, id_fra, id_coche, id_cliente, total, fra_env, inter, recog, fianza, pagado, cambio, beneficio, anul, iva, subtotal, generado) VALUES ('".$id_ppto."', STR_TO_DATE('$fecha_newPpto', '%d-%m-%Y'), '', '".$vehiculo_newPpto."', '".$cliente_newPpto."', '$totalTotal', 'N', 'N', 'N', 0, 0, 0, 0, 'N', '".$iva_newPpto."', '$subtotal', 'S')";
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
$mail->Username = "paco@nietogranturismo.com";
$mail->Password = "Biturbo5"; 
$mail->Port = 587; 

$mail->From = "paco@nietogranturismo.com";
$mail->FromName = "Paco NietoGranTurismo";

//el valor por defecto 10 de Timeout es un poco escaso dado que voy a usar una cuenta gratuita, por tanto lo pongo a 30  
$mail->Timeout=30;

//Indicamos cual es la dirección de destino del correo
$mail->AddAddress('pacoriosgalan@gmail.com');

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
}

?>
<script language="javascript">
    //LOCALHOST
    //window.location='/nieto/public_html/index.php';

    //PRODUCCIÓN
    window.location='http://admin.nietogranturismo.com/';    
</script> 
<?php


