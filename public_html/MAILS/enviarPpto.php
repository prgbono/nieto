<?php
header('Content-Type: text/html; charset=utf-8');
// Cargamos las librerías de base de datos y envío de mails
require_once('../Librerias/class.phpmailer.php');
//MAMP
//include ('../../../nietoBack/inc/conexion.php');
//PRODUCCIÓN
include ('../nietoBack/inc/conexion.php');

extract($_POST); 

/*if($_POST)
{
  foreach ($_POST as $clave=>$valor)
  {
  echo "El valor de $clave es: $valor"."\n";
      echo "<br>";
  }
}*/

//Obtengo correo del cliente
$id_cliente = !($_POST['id_cliente'] == '') ? $_POST['id_cliente'] : '';
$correo = "SELECT email FROM pruebas_clientes WHERE id_cliente = '$id_cliente'";
$result = mysqli_query($link, $correo);
$correo= mysqli_fetch_assoc($result);
$correo=$correo['email']; 

//instancio un objeto de la clase PHPMailer
$mail = new PHPMailer(); 
$mail->IsSMTP();
$mail->SMTPAuth = true;
//$mail->Host = "smtp.gmail.com"; 
$mail->Host = "smtp.nietogranturismo.com"; 
$mail->Username = "paco@nietogranturismo.com";
$mail->Password = "Biturbo5"; 
$mail->Port = 587; 

$mail->From = "paco@nietogranturismo.com";
$mail->FromName = "Paco NietoGranTurismo";

//el valor por defecto 10 de Timeout es un poco escaso dado que voy a usar una cuenta gratuita, por tanto lo pongo a 30  
$mail->Timeout=30;

//Indicamos cual es la dirección de destino del correo
$mail->AddAddress($correo);

//Asignamos asunto y cuerpo del mensaje
//El cuerpo del mensaje lo ponemos en formato html, haciendo 
//que se vea en negrita
$mail->Subject = "Nieto GranTurismo. Presupuesto personalizado";
$mail->Body = "<b>Mensaje de prueba mandado con phpmailer en formato html OK</b>";

//Definimos AltBody por si el destinatario del correo no admite email con formato html 
$mail->AltBody = "Mensaje de prueba mandado con phpmailer en formato solo texto";

//se envia el mensaje, si no ha habido problemas 
//la variable $exito tendra el valor true
$exito = $mail->Send();

//Si el mensaje no ha podido ser enviado se realizaran 4 intentos mas como mucho 
//para intentar enviar el mensaje, cada intento se hara 5 segundos despues 
//del anterior, para ello se usa la funcion sleep 
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
  window.location='http://admin.nietogranturismo.com/';
  </script> 
<?php
} 

?>