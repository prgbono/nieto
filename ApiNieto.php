<?php
//Importar nietoManager
include 'nietoManager.php';
//Extraer todos los datos get y post que nos envía Android
extract($_REQUEST);
//Instanciar el objeto nietoManager

$nietoManager = new nietoManager();
//Solo con esta instrucción ya hemos conectado con la BBDD
//Switch que dependiendo del valor de la vble petición que viene por GET llamaremos a la función adecuada de la clase MensajesManager
switch ($peticion){
    case "listarClientes": $nietoManager->listarClientes();break;
    
    
    case "crearEmpresa":$nietoManager->crearEmpresa($nombre, $codigo, $gerente, $fecha_creacion, $logo, $LE, $notificaciones);break;
    case "buscarE": $nietoManager->buscarE($nombre);break;
    case "validarCodigo": $nietoManager->validarCodigo($codigo);break;
    case "obtenerNombreE": $nietoManager->obtenerNombreE($codigo);break;
    case "altaUsuario": $nietoManager->altaUsuario($nombreU, $apellidos, $correo, $id_E, $pass);break;
    case "obtenerId": $nietoManager->obtenerId($codigo);break;
    case "obtenerE": $nietoManager->obtenerE();break;
    case "listarPedidos": $nietoManager->listarPedidos($id_E);break;
    case "obtenerNombreCli": $nietoManager->obtenerNombreCli($id_Cli);break;
    case "obtenerClientes": $nietoManager->obtenerClientes($id_E);break;
    case "obtenerCat": $nietoManager->obtenerCat($id_E);break;
    case "obtenerEsp": $nietoManager->obtenerEsp($id_Cat);break;
//    case "insertarPedido": $nietoManager->insertarPedido($id_E, $fecha_entrega, $importe);break;
//    case "insertarDetallePedido": $nietoManager->insertarDetallePedido($id_Cat, $id_Esp, $kg, $cocido, $fecha_detalle, $pvp, $id_E);break;
//    //case "anadirPedido": $nietoManager->anadirPedido($id_E, $id_Cli, $importe, $id_Cat, $id_Esp, $kg, $cocido, $fecha_detalle, $pvp);break;
//    case "obtenerPvp": $nietoManager->obtenerPvp($id_Esp);break;
//    case "obtenerExistencias": $nietoManager->obtenerExistencias($id_Esp);break;
//    case "obtenerIdPedido": $nietoManager->obtenerIdPedido($id_E);break;
//    case "listarAnadidos": $nietoManager->listarAnadidos($id_Cat, $id_Esp, $id_P);break;
//    case "listarAnadidosConIdPedido": $nietoManager->listarAnadidosConIdPedido($id_P);break;
//    case "listarDetallePedido": $nietoManager->listarDetallePedido($id_E, id_Cli);break;
//    case "obtenerNombreCat": $nietoManager->obtenerNombreCat($id_E, $id_Cat);break;
//    case "obtenerNombreEsp": $nietoManager->obtenerNombreEsp($id_Esp);break;
//    case "updatePedido": $nietoManager->updatePedido($id_E, $id_P, $fecha_entrega, $bool_envio, $pagado, $comentarios);break;    
//    case "deletePedido": $nietoManager->deletePedido($id_E, $id_P);break;
//    case "updateExistencias": $nietoManager->updateExistencias($id_Esp, $pvp, $existencias);break;
//    case "deleteDetallesPedido": $nietoManager->deleteDetallesPedido($id_P);break;
//    case "deleteDetallePedido": $nietoManager->deleteDetallePedido($id_DP);break;
//    case "updateExistenciasTrasAnadirArticulo": $nietoManager->updateExistenciasTrasAnadirArticulo($id_Esp, $existencias);break;
//    case "updateClientePedido": $nietoManager->updateClientePedido($id_E, $id_Cli, $id_P);break;
//    case "pedidoVacio": $nietoManager->pedidoVacio($id_P);break;
//    case "updateImportePedido": $nietoManager->updateImportePedido($id_P);break;
//    case "obtenerImporte": $nietoManager->obtenerImporte($id_P);break;
//    case "crearCliente": $nietoManager->crearCliente($id_E, $nombre, $apellidos, $telefono, $correo, $envio, $bar, $ciudad);break;
    //case "listarClientes": $nietoManager->listarClientes($id_E);break;
    
}






