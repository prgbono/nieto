<?php

header('Content-Type: text/html; charset=utf-8');
// Cargamos las librerías de base de datos y envío de mails
require_once('../Librerias/class.phpmailer.php');
//G4SECURITY
//include '../nietoBack/inc/conexion.php';
//MAMP
include ('../../../nietoBack/inc/conexion.php');

//Cogemos todos los datos del ppto
extract($_POST); 

/*$canarias_newPpto = isset($_POST['canarias_newPpto']) ? 1 : 0;
$iva_newPpto = !($_POST['iva_newPpto'] == '') ? $_POST['iva_newPpto'] : 21;*/


//instancio un objeto de la clase PHPMailer
$mail = new PHPMailer(); 


//SMTP


$mail->IsSMTP();
$mail->SMTPAuth = true;
$mail->Host = "smtp.gmail.com"; 
$mail->Username = "p.rios.utopia@gmail.com";
$mail->Password = "Utopia2015"; 
$mail->Port = 587; 



  //Indicamos cual es nuestra dirección de correo y el nombre que 
  //queremos que vea el usuario que lee nuestro correo
  $mail->From = "p.rios.utopia@gmail.com";
  $mail->FromName = "Eduardo Garcia";

  //el valor por defecto 10 de Timeout es un poco escaso dado que voy a usar una cuenta gratuita, por tanto lo pongo a 30  
  $mail->Timeout=30;

  //Indicamos cual es la dirección de destino del correo
  $mail->AddAddress("pacoriosgalan@gmail.com");

  //Asignamos asunto y cuerpo del mensaje
  //El cuerpo del mensaje lo ponemos en formato html, haciendo 
  //que se vea en negrita
  $mail->Subject = "Prueba de phpmailer";
  $mail->Body = "<b>Mensaje de prueba mandado con phpmailer en formato html</b>";

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
    echo "Mensaje enviado correctamente";
    ?>
    <script language="javascript">
      console.log('Mensaje enviado');
    </script> 
    <?php
   } 




//For de los artículos
/*$articulos = '';
foreach ($descripcion as $clave=>$valor)
{
  if (!$descripcion[$clave]==''){
    if($pvp[$clave]==''){
      $articulos .= '<tr><td class="ref">'.$ref[$clave].'</td>
      <td class="desc" style="width:50%">'.$descripcion[$clave].'</td>
      <td class="pvp">'.$precio[$clave].'</td>
      <td class="uds">'.$uds[$clave].'</td>
      <td class="importe">'.$total[$clave].'</td>
      </tr>';
    }
    else{
      $articulos .= '<tr><td class="ref">'.$ref[$clave].'</td>
      <td class="desc" style="width:50%">'.$descripcion[$clave].'</td>
      <td class="pvp">'.$pvp[$clave].'</td>
      <td class="uds">'.$uds[$clave].'</td>
      <td class="importe">'.$total[$clave].'</td>
      </tr>';
    }
  }
}
*/

/*$html='
<html>
  <head>
    <meta charset="utf-8">
    <title>Presupuesto NIETO GRAN TURISMO. TLF - 654 777 777 - comercial@nietogranturismo.com</title>
    <link href="../css/presupuesto_style.css" rel="stylesheet" type="text/css"/>  
  </head>
  <body>
  <div class="contenido">
    <header class="clearfix">
      <h1>Presupuesto</h1> 
      <div id="project">
        <div><span>CLIENTE</span>'.utf8_encode($cliente_newPpto).'</div>
        <div><span>VEHÍCULO</span>'.utf8_encode($vehiculo_newPpto).'</div>
        <div><span>FECHA </span>'.$fecha_newPpto.'</div>
      </div>
    </header>
    <main>
      <table>
        <thead>
          <tr>
            <th class="ref">REFERENCIA</th>
            <th class="desc" style="width:50%">DESCRIPCIÓN</th>
            <th>PVP</th>
            <th>UDS</th>
            <th>IMPORTE</th>
          </tr>
        </thead>
        <tbody>'.$articulos.'
          <tr>
            <td colspan="4" class="grand total">SUBTOTAL</td>
            <td class="grand">'.$subtotal.'€</td>
          </tr>
          <tr>
            <td colspan="4">IVA</td>
            <td>'.$iva_newPpto.'%</td>
          </tr>
          <tr>
            <td colspan="4"><strong>TOTAL</strong></td>
            <td><strong>'.$totalTotal.'€</strong></td>
          </tr>
        </tbody>
      </table>
      <br />
      <br />
      <div id="notices">
        <div>Comentarios:</div>
        <div class="notice">'.utf8_encode($asunto_newPpto).'</div>
      </div>
    </main>
    <footer>
      NIETO GRAN TURISMO. TLF - 654 777 777 - comercial@nietogranturismo.com
    </footer>
  </div>
  </body>
</html>';*/


/*$pdf = new DOMPDF();
$pdf->set_paper("A4", "portrait");
$pdf->load_html($html); 
$pdf->render();
//ASÍ SE DESCARGA
//$pdf->stream('NietoPresupuesto.pdf');
//ASÍ SE VE EN EL VISOR DEL BROWSER
$pdf->stream('NietoPresupuesto.pdf', array("Attachment" => "0"));*/

?>