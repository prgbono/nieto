<?php

header('Content-Type: text/html; charset=utf-8');
// Cargamos la librería dompdf que hemos instalado en la carpeta dompdf
require_once ('../dompdf/dompdf_config.inc.php');
// Cargamos las librerías de base de datos
include '../nietoBack/inc/conexion.php';

extract($_POST); 

/*$canarias_newPpto = isset($_POST['canarias_newPpto']) ? 1 : 0;*/
$iva_newPpto = !($_POST['iva_newPpto'] == '') ? $_POST['iva_newPpto'] : 21;

//Datos de cliente (si viene cliente informado)
if (!$cliente_newPpto==''){
  $pruebas = 'sdsdsdsd';
  $datosCli="SELECT pruebas_clientes.id_cliente, pruebas_clientes.nombre, pruebas_clientes.variado, pruebas_clientes.tlf1, pruebas_clientes.tlf2, pruebas_clientes.email, pruebas_clientes.email2, pruebas_clientes.ciudad, pruebas_coches.modelo, pruebas_coches.bastidor, pruebas_coches.anio FROM pruebas_clientes INNER JOIN pruebas_coches ON pruebas_clientes.id_cliente = pruebas_coches.id_cliente AND pruebas_clientes.id_cliente = '$cliente_newPpto'";
  $result = mysqli_query($link, $datosCli);
  $fila= mysqli_fetch_assoc($result);
  $cliente_newPpto = $fila['nombre'];
  $vehiculo_newPpto = $fila['modelo'];
}


//For de los artículos
$articulos = '';
foreach ($descripcion as $clave=>$valor)
{
  if (!$descripcion[$clave]==''){
    if($pvp[$clave]==''){
      $articulos .= '<tr><td class="ref">'.$ref[$clave].'</td>
      <td class="desc">'.$descripcion[$clave].'</td>
      <td class="pvp">'.$precio[$clave].'</td>
      <td class="uds">'.$uds[$clave].'</td>
      <td class="importe">'.$total[$clave].'</td>
      </tr>';
    }
    else{
      $articulos .= '<tr><td class="ref">'.$ref[$clave].'</td>
      <td class="desc">'.$descripcion[$clave].'</td>
      <td class="pvp">'.$pvp[$clave].'</td>
      <td class="uds">'.$uds[$clave].'</td>
      <td class="importe">'.$total[$clave].'</td>
      </tr>';
    }
  }
}


$html='
<html>
  <head>
    <meta charset="utf-8">
    <title>Example 1</title>
    <link href="../css/presupuesto_style.css" rel="stylesheet" type="text/css"/>  
  </head>
  <body>
  <div class="contenido">
    <header class="clearfix">
      <h1>Presupuesto</h1> 
      <div id="project">
        <div><span>CLIENTE</span>'.$cliente_newPpto.'</div>
        <div><span>VEHÍCULO</span>'.$vehiculo_newPpto.'</div>
        <div><span>FECHA </span>'.$fecha_newPpto.'</div>
      </div>
    </header>
    <main>
      <table>
        <thead>
          <tr>
            <th class="ref">REFERENCIA</th>
            <th class="desc">DESCRIPCIÓN</th>
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
        <div class="notice">'.$asunto_newPpto.'</div>
      </div>
    </main>
    <footer>
      NIETO GRAN TURISMO. TLF - 654 777 777 - comercial@nietogranturismo.com
    </footer>
  </div>
  </body>
</html>';


$pdf = new DOMPDF();
$pdf->set_paper("A4", "portrait");
/*$pdf->set_paper("A4", "landscape");*/
$pdf->load_html(utf8_decode($html)); 
/*$pdf->load_html(utf8_decode($pruebas)); */
$pdf->render();
//ASÍ SE DESCARGA
/*$pdf->stream('NietoPresupuesto.pdf');*/

//ASÍ SE VE EN EL VISOR DEL BROWSER
$pdf->stream('NietoPresupuesto.pdf', array("Attachment" => "0"));

?>