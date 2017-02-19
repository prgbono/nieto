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

/*.-UPDATE EN LA TABLA DE PEDIDOS*/
if (!$id_ppto){
    //TODO Cojo el último ppto pero puede que no le haya dado a guardar y entonces se lía (se pone generado a un ppto que no es!!!)
    $ppto =  mysqli_query($link, "SELECT MAX(id_ppto) as maxId_ppto FROM pruebas_presupuestos"); 
    $maxPpto = mysqli_fetch_assoc($ppto);
    $id_ppto = $maxPpto['maxId_ppto'];
}


$query= "UPDATE pruebas_pedidos SET generado = 'S' WHERE id_ppto = $id_ppto";
mysqli_query($link, $query);

/*Enviar correo
Obtener datos necesarios para formar el correo:
Modelo del coche*/
$coche = "SELECT pruebas_coches.modelo FROM pruebas_coches WHERE pruebas_coches.id_coche = '$vehiculo_newPpto'";
$result = mysqli_query($link, $coche);
$coche= mysqli_fetch_assoc($result);
$coche=$coche['modelo']; 

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
    if($pvp[$clave]==''){
      $articulos .= '<tr>
        <td class="desc"'.$descripcion[$clave].'</td>
        <td class="ref">'.$ref[$clave].'</td>
        <td class="uds">'.$uds[$clave].'</td>  
      </tr>';
    }
    else{
      $articulos .= '<tr>
        <td class="desc"'.$descripcion[$clave].'</td>
        <td class="ref">'.$ref[$clave].'</td>
        <td class="uds">'.$uds[$clave].'</td>
      </tr>';
    }
  }
}


$body = '<p>Hello Peter, <br>I want to order for a '.$coche.':</p>
    <table>
        <thead>
          <tr>
            <th>DESCRIPCIÓN / Description</th>
            <th>Referencia / Reference</th>
            <th>Cantidad / Amount</th>
          </tr>
        </thead>
        <tbody>'.$articulos.'
        </tbody>
    </table>
    <p>Please send it without any logos of Flying Spares and by UPS (if it\'s not possible with UPS, please let me know before send it) to:</p>
    <p>'.$nombre.'<br>
    '.$calle.'<br>   
    CP:'.$cp.', $ciudad,  (Spain)<br>
    '.$tlf1.'</p>
    <p>Thanks for your attention<br>
    David<br>
    NietoGranTurismo</p>';

//Asignamos asunto y cuerpo del mensaje
//El cuerpo del mensaje lo ponemos en formato html, haciendo 
//que se vea en negrita
$mail->Subject = "Nieto GranTurismo. Order.";
$mail->Body = $body;

//Definimos AltBody por si el destinatario del correo no admite email con formato html 
//$mail->AltBody = "Mensaje de prueba mandado con phpmailer en formato solo texto";

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
  echo "Problemas enviando correo electrónico a ".$valor;
  echo "<br/>".$mail->ErrorInfo; 
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


