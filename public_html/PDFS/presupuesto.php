<?php

header('Content-Type: text/html; charset=utf-8');
// Cargamos la librería dompdf que hemos instalado en la carpeta dompdf
require_once ('../dompdf/dompdf_config.inc.php');
//MAMP
//include ('../../../nietoBack/inc/conexion.php');
//PRODUCCIÓN
include ('../nietoBack/inc/conexion.php');

extract($_POST); 
$iva_newPpto = !($_POST['iva_newPpto'] == '') ? $_POST['iva_newPpto'] : 21;

//Datos de cliente (si viene cliente informado)
if (!$cliente_newPpto==''){
  $datosCli="SELECT pruebas_clientes.id_cliente, pruebas_clientes.nombre, pruebas_clientes.variado, pruebas_clientes.tlf1, pruebas_clientes.tlf2, pruebas_clientes.email, pruebas_clientes.email2, pruebas_clientes.ciudad, pruebas_coches.modelo, pruebas_coches.bastidor, pruebas_coches.anio FROM pruebas_clientes INNER JOIN pruebas_coches ON pruebas_clientes.id_cliente = pruebas_coches.id_cliente AND pruebas_clientes.id_cliente = '$cliente_newPpto'";
  $result = mysqli_query($link, $datosCli);
  $fila= mysqli_fetch_assoc($result);
  $cliente_newPpto = $fila['nombre'];
  $vehiculo_newPpto = $fila['modelo'];
  $vehiculo_bastidor = $fila['bastidor'];
}


//For de los artículos
$articulos = '';
$comentarios = '';
$totales = '';
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

$articulos = $articulos .'<tr><td class="desc" style="width:50%">Embalaje y transporte</td>
  <td class="ref"></td>
  <td class="uds"></td>
  <td class="pvp"></td>
  <td class="importe">'.$transporte_newPpto.'</td>
  </tr>';

$comentarios = '<table style="border-bottom: 1px solid; border-right: 1px solid; border-left: 1px solid;">
        <tbody>
          <tr>
            <td class="desc">
              <strong>Comentarios:</strong><br />'.utf8_encode($asunto_newPpto).'
            </td>
          </tr>
        </tbody>
      </table>';

$totales = '<table style="border:1px solid black; text-align: right">
        <tbody>
          <tr>
            <td>
              <div class="bottom">
                <label>SUBTOTAL   '.$subtotal.'€</label>
                <label>IVA   '.$iva_newPpto.'%</label>
                <label><strong>TOTAL   '.$totalTotal.'€</strong></label>
              </div>
            </td>
          </tr>
        </tbody>
      </table>';

$file_location = $_SERVER['DOCUMENT_ROOT']."/presupuestos/".$id_ppto.".pdf";

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
      <div align="center">
        <img src="../img/logoNGT.png" alt="NietoGranTurismo">
      </div>
      <div align="center">
        <br />
        <em>Teléfono 656 631 488, email: comercial@nietogranturismo.com, www.nietogranturismo.com</em>
      </div>

      <div id="project">
        <table>
          <tbody>
            <tr>
              <th style="text-align: left;"><span><b>CLIENTE:</b></span><span class="aux">'.utf8_encode($cliente_newPpto).'</span></th>
              <th style="text-align: left;"><span><b>Nº Presupuesto:</b></span><span class="aux">'.$id_ppto.'</span></th>
            </tr>
            <tr>
              <th style="text-align: left;"><span><b>VEHÍCULO:</b></span><span class="aux">'.utf8_encode($vehiculo_newPpto).'</span></th>
              <th style="text-align: left;"><span><b>FECHA:</b></span><span class="aux">'.$fecha_newPpto.'</span></th>
            </tr>
            <tr>
              <th style="text-align: left;"><span><b>BASTIDOR:</b></span><span class="aux">'.utf8_encode($vehiculo_bastidor).'</span></th>
              <th style="text-align: left;"></th>
            </tr>
          </tbody>
        </table>
      </div>

    </header>
    <main>
      <table style="margin-bottom:0; border-top: 1px solid; border-right: 1px solid; border-left: 1px solid;">
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
        </tbody>
      </table>';
      
      if (!utf8_encode($asunto_newPpto)=='') {
        $html = $html . $comentarios;
      }
      $html = $html . $totales .'

    </main>
    <footer>
      <i><p>
      Nieto GranTurismo - Rolls Royce & Bentley - Piezas y recambios <br>
      David Nieto Hernandez, CIF:45653917K C/Costa de la luz N.5 9.A, 41005 Sevilla<br>
      Telefono: 954 091 856 / 656 631 488, email: comercial@nietogranturismo.com, www.nietogranturismo.com <br>
      Datos bancarios.- Caja de Ingenieros: ES95 3025 0007 79 1433213370</p></i>
    </footer>
  </div>
  </body>
</html>';


$pdf = new DOMPDF();
$pdf->set_paper("A4", "portrait");
/*$pdf->set_paper("A4", "landscape");*/
$pdf->load_html($html); 
/*$pdf->load_html(utf8_decode($html)); */

$pdf->render();
//ASÍ SE DESCARGA
/*$pdf->stream('NietoPresupuesto.pdf');*/

//ASÍ SE VE EN EL VISOR DEL BROWSER
$pdf->stream('NietoPresupuesto.pdf', array("Attachment" => "0"));



?>