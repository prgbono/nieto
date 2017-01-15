<?php

header('Access-Control-Allow-Origin: *');
//PARA PRODUCCIÓN
//include ('../nietoBack/inc/conexion.php');

//Para localhost (MAMP)
include ('../../../nietoBack/inc/conexion.php');

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

/*$totalTotal = str_replace(',','.',$totalTotal);
$subtotal = str_replace(',','.',$subtotal);*/


/*.-UPDATE EN LA TABLA DE PEDIDOS*/
if (!$id_ppto){
    /*Ppto nuevo*/
    /******************************************/
    //TODO Cojo el último ppto pero puede que no le haya dado a guardar y entonces se lía (se pone generado a un ppto que no es!!!)
    $ppto =  mysqli_query($link, "SELECT MAX(id_ppto) as maxId_ppto FROM pruebas_presupuestos"); 
    $maxPpto = mysqli_fetch_assoc($ppto);
    $id_ppto = $maxPpto['maxId_ppto'];
}


$query= "UPDATE pruebas_pedidos SET generado = 'S' WHERE id_ppto = $id_ppto";
mysqli_query($link, $query);

?>
<script language="javascript">
    console.log('<?php echo $id_ppto; ?>');
	/*console.log('<?php echo $mensaje; ?>');*/
	/*window.location='/index.php';*/
    window.location='/nieto/public_html/index.php';
</script> 
<?php


