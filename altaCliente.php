<?php

//Esta instrucción es para que funcione entre servidores, incluido si lo piruebas en el Chrome
header('Access-Control-Allow-Origin: *');

//1.Incluir el fichero de conexión para conectar con la BBDD
include 'inc/conexion.php';

//2. Obtener los datos que nos envía jquery 
extract($_REQUEST); //A partir de esta línea tenemos disponibles unas variables que se llaman igual que el atributo name de los inputs del formulario. 

//UTF-8 -- TRAERLO Y DECODIFICARLO EN UN ARRAY PQ NO SÉ LAS VARIABLES QUE VA A TRAER!!!
$nombre = utf8_decode(trim($nombre));
$coche0 = utf8_decode(trim($coche0));
$coche1 = utf8_decode(trim($coche1));
$coche2 = utf8_decode(trim($coche2));
$variado = utf8_decode(trim($variado));
$tlf0 = utf8_decode(trim($tlf0));
$email1 = utf8_decode(trim($email1));
$ciudad = utf8_decode(trim($ciudad));
$ppal = utf8_decode(trim($ppal));
$bas0 = utf8_decode(trim($bas0));
$bas1 = utf8_decode(trim($bas1));
$bas2 = utf8_decode(trim($bas2));
$anio0 = utf8_decode(trim($anio0));
$anio1 = utf8_decode(trim($anio1));
$anio2 = utf8_decode(trim($anio2));
$envio_nombre = utf8_decode(trim($envio_nombre));
$envio_calle = utf8_decode(trim($envio_calle));
$envioCP = utf8_decode(trim($envioCP));
$envio_ciudad = utf8_decode(trim($envio_ciudad));
$fact_nombre = utf8_decode(trim($fact_nombre));
$fact_calle = utf8_decode(trim($fact_calle));
$factCP = utf8_decode(trim($factCP));
$factNIF = utf8_decode(trim($factNIF));
$fact_ciudad = utf8_decode(trim($fact_ciudad));

//3. Comprobar que el cliente no exista!
$query = "SELECT * FROM pruebas_clientes WHERE nombre='$nombre'";

//4. Ejecutar sentencia. link es la conexión con la BD.
$result = mysqli_query($link, $query);

if (mysqli_num_rows($result)>0){
    //Ya existe
    echo -1;
}
else {
    if (empty($coche0)){
        //No ha insertado coche_ppal
        echo -2;
    }
    else{
        //Inserción en tablas clientes y coches
        $query= "INSERT INTO pruebas_clientes (nombre, coche, variado, tlf1, email, ciudad) VALUES ('$nombre', '0', '$variado', '$tlf0', '$email1', '$ciudad')";
        //$result = mysqli_query($link, $query);
        mysqli_query($link, $query);

        //Último id de cliente generado
        $clientes =  mysqli_query($link, "SELECT MAX(id_cliente) as maxCli FROM pruebas_clientes"); 
        $Cli = mysqli_fetch_assoc($clientes);
        $max_cli = $Cli['maxCli'];

        $query= "INSERT INTO pruebas_coches (id_cliente, ppal, modelo, bastidor, anio) VALUES ('$max_cli', '1', '$coche0', '$bas0', '$anio0')";
        //$result=  mysqli_query($link, $query2);
        mysqli_query($link, $query);

        //Actualizar id's de clientes y coches. Esto es pq los registros en estas tablas pueden borrarse y no se gestionan bien los id's
        $query = "UPDATE pruebas_clientes SET coche =(SELECT MAX(id_coche) FROM pruebas_coches) WHERE nombre='$nombre'";
        mysqli_query($link, $query);
        
        //Coche 2 si se ha informado
        if (!empty($coche1)) {
            $query= "INSERT INTO pruebas_coches (id_cliente, ppal, modelo, bastidor, anio) VALUES ('$max_cli', '0', '$coche1', '$bas1', '$anio1')";
            //$result=  mysqli_query($link, $query2);
            mysqli_query($link, $query);
        }

        //Coche 3 si se ha informado
        if (!empty($coche2)) {
            $query= "INSERT INTO pruebas_coches (id_cliente, ppal, modelo, bastidor, anio) VALUES ('$max_cli', '0', '$coche2', '$bas2', '$anio2')";
            //$result=  mysqli_query($link, $query2);
            mysqli_query($link, $query);
        }

        //Inserción en tabla de direcciones si se ha informado la dirección
        if (!empty($envio_calle)) {
            $query= "INSERT INTO pruebas_direcciones (id_cliente, calle, cp, ciudad, nif, E_F) VALUES ('$max_cli', '$envio_calle', '$envioCP', '$envio_ciudad', '', 'E')";
            mysqli_query($link, $query);    
        }
        
        if (!empty($fact_calle)) {
            $query= "INSERT INTO pruebas_direcciones (id_cliente, calle, cp, ciudad, nif, E_F) VALUES ('$max_cli', '$fact_calle', '$factCP', '$fact_ciudad', '$factNIF', 'F')";
            mysqli_query($link, $query);    
        }

        echo 1;
    }
}






