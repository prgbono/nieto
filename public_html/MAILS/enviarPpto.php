<?php
header('Content-Type: text/html; charset=utf-8');
// Cargamos las librerías de base de datos y envío de mails
require_once('../Librerias/class.phpmailer.php');
require_once ('../dompdf/dompdf_config.inc.php');
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

/*echo $query;
echo $query2;*/

mysqli_query($link, $query2); 
/*FIN GUARDAR PPTO*/

//Envío al cliente
//Obtengo correo del cliente
$cliente_seleccionado = isset($_POST['cliente_newPpto']) ? $_POST['cliente_newPpto'] : '';
$id_cliente = !($_POST['id_cliente'] == '') ? $_POST['id_cliente'] : $cliente_seleccionado;
$correo = "SELECT email FROM pruebas_clientes WHERE id_cliente = '$id_cliente'";
$result = mysqli_query($link, $correo);
$correo= mysqli_fetch_assoc($result);
$correo=$correo['email']; 


/*Enviar correo
Obtener datos necesarios para formar el correo:
Modelo del coche*/
$coche = "SELECT pruebas_coches.modelo, pruebas_coches.anio, pruebas_coches.bastidor  FROM pruebas_coches WHERE pruebas_coches.id_coche = '$vehiculo_newPpto'";
$result = mysqli_query($link, $coche);
$datosCoche= mysqli_fetch_assoc($result);
$coche=$datosCoche['modelo']; 
$anio=$datosCoche['anio'];
$bastidor=$datosCoche['bastidor']; 

//Generar el adjunto a enviar con DomPDF
$datosCli="SELECT pruebas_clientes.id_cliente, pruebas_clientes.nombre, pruebas_clientes.variado, pruebas_clientes.tlf1, pruebas_clientes.tlf2, pruebas_clientes.email, pruebas_clientes.email2, pruebas_clientes.ciudad, pruebas_coches.modelo, pruebas_coches.bastidor, pruebas_coches.anio FROM pruebas_clientes INNER JOIN pruebas_coches ON pruebas_clientes.id_cliente = pruebas_coches.id_cliente AND pruebas_clientes.id_cliente = '$cliente_newPpto'";
  $result = mysqli_query($link, $datosCli);
  $fila= mysqli_fetch_assoc($result);
  $cliente_newPpto = $fila['nombre'];
  $vehiculo_newPpto = $fila['modelo'];

$articulos = '';
foreach ($descripcion as $clave=>$valor)
{
  if (!$descripcion[$clave]==''){
    if($pvp[$clave]==''){
      $articulos .= '<tr><td class="desc" style="width:50%">'.$descripcion[$clave].'</td>
      <td class="ref">'.$ref[$clave].'</td>
      <td class="uds">'.$uds[$clave].'</td>
      <td class="pvp">'.$precio[$clave].'</td>
      <td class="importe">'.$total[$clave].'</td>
      </tr>';
    }
    else{
      $articulos .= '<tr><td class="desc" style="width:50%">'.$descripcion[$clave].'</td>
      <td class="ref">'.$ref[$clave].'</td>
      <td class="uds">'.$uds[$clave].'</td>
      <td class="pvp">'.$pvp[$clave].'</td>
      <td class="importe">'.$total[$clave].'</td>
      </tr>';
    }
  }
}

//$file_location = $_SERVER['DOCUMENT_ROOT']."/presupuestos/".$id_ppto.".pdf";

$html='
<html>
  <head>
    <meta charset="utf-8">
    <title>Presupuesto NIETO GRAN TURISMO. TLF - 654 777 777 - comercial@nietogranturismo.com</title>
    <link href="../css/presupuesto_style.css" rel="stylesheet" type="text/css"/>  
  </head>
  <body>
  <div class="contenido">
    <header class="clearfix">
      <h1>NIETO GRAN TURISMO - Presupuesto</h1>
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
            <th class="desc" style="width:50%">DESCRIPCIÓN</th>
            <th class="ref">REFERENCIA</th>
            <th>UDS</th>
            <th>PVP</th>
            <th>IMPORTE</th>
          </tr>
        </thead>
        <tbody>'.$articulos.'
          <div id="notices">
            <div>Comentarios:</div>
            <div class="notice">'.utf8_encode($asunto_newPpto).'</div>
          </div>  
        </tbody>
      </table>
      
    </main>
    <footer>
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
      <hr style="color: #ccc;" />
      <i><p>
      Nieto GranTurismo - Rolls Royce & Bentley - Piezas y recambios <br>
      David Nieto Hernandez, CIF:45653917K C/Costa de la luz N.5 9.A, 41005 Sevilla<br>
      Telefono: 954 091 856 / 656 631 488, email: comercial@nietogranturismo.com, www.nietogranturismo.com <br>
      Datos bancarios.- Caja de Ingenieros: ES95 3025 0007 79 1433213370</p></i>
    </footer>
  </div>
  </body>
</html>';

//instancio un objeto de la clase PHPMailer
$mail = new PHPMailer(); 
$mail->IsSMTP();
$mail->SMTPAuth = true;
$mail->Host = "smtp.nietogranturismo.com"; 
$mail->Username = "paco@nietogranturismo.com";
$mail->Password = "Biturbo5"; 
$mail->Port = 587; 
$mail->From = "paco@nietogranturismo.com";
$mail->FromName = "NietoGranTurismo";
$mail->Timeout=30;
//Indicamos cual es la dirección de destino del correo
$mail->AddAddress($correo);
$mail->AddBCC('pacoriosgalan@gmail.com');
$mail->AddBCC('davidoski@hotmail.com');
$mail->Subject = "Nieto GranTurismo. Presupuesto personalizado";

$body = '<p>Buenas<br>
Adjunto envío el presupuesto solicitado.</p>
<br>
<p>Un cordial saludo,<br>
David<br>
NietoGranTurismo</p>';

$mail->Body = $body;
//Definimos AltBody por si el destinatario del correo no admite email con formato html 
$mail->AltBody = "Mensaje de prueba mandado con phpmailer en formato solo texto";

$dompdf = new DOMPDF();
$dompdf->load_html($html);
$dompdf->render();
$output = $dompdf->output();
$file_to_save= $_SERVER['DOCUMENT_ROOT']."/presupuestos/".$id_ppto.".pdf";
file_put_contents($file_to_save, $output);
$mail->addAttachment("../presupuestos/".$id_ppto.".pdf", 'Presupuesto NietoGranTurismo - '.$cliente_newPpto.'.pdf');
//$mail->addAttachment($path, $name, $encoding, $type);
//file_put_contents($file_to_save, $dompdf->output());


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
  /*echo "Problemas enviando correo electrónico a ".$valor;
  echo "<br/>".$mail->ErrorInfo; */
  ?>
  <script language="javascript">
  console.log('Mensaje NO enviado');
  window.location='http://admin.nietogranturismo.com/';
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