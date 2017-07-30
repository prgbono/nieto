<?php

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
}*/

$canarias_newPpto = isset($_POST['canarias_newPpto']) ? 1 : 0;
$iva_newPpto = !($_POST['iva_newPpto'] == '') ? $_POST['iva_newPpto'] : 21;
$totalTotal = str_replace(',','.',$totalTotal);
$subtotal = str_replace(',','.',$subtotal);
$fecha_newPpto = str_replace('-','/',$fecha_newPpto);
$correo = $_POST['proveedor_address'];

//Con esto tengo en cada array exactamente lo que ha metido el usuario. Independientemente si ha metido alguna descripción y después no unidades. TENGO LOS ARRAYS SIN POSICIONES VACÍAS.
$descripcion=array_filter($descripcion);
$ref=array_filter($ref);
$precio=array_filter($precio);
$uds=array_filter($uds);
$cambio=array_filter($cambio);
$pvp=array_filter($pvp);
$dto=array_filter($dto);
$total=array_filter($total);

//Obtengo las descripciones de los productos en inglés
foreach ($ref as $clave=>$valor)
{
  $query = "SELECT title FROM pruebas_bbdd WHERE part_number = '$ref[$clave]'";
  $result = mysqli_query($link, $query);
  $result= mysqli_fetch_assoc($result);
  $descripcion[$clave] = $result['title'];
}


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


$body = '<p>'.$mailTextGenerarPedido.'<br>This one would be for a '.$coche.', year: '.$anio.', and #: '.$bastidor.':</p>
<table border="1">
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



 

echo $body;




