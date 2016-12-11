<?php

header('Content-Type: text/html; charset=utf-8');
// Cargamos la librería dompdf que hemos instalado en la carpeta dompdf
require_once ('../dompdf/dompdf_config.inc.php');
// Cargamos las librerías de base de datos
/*require_once('../../librerias/db_mysql.inc.php');
require_once('../../librerias/db.php');
require_once('../../librerias/util.php');*/

/*$ut = new util;*/
/*$ut->seguridadLimpiarArray($_POST);
$ut->seguridadLimpiarArray($_GET);*/

/*$doc = isset($_REQUEST['doc']) ? $_REQUEST['doc'] : '';
$id_venta = isset($_REQUEST['id_venta']) ? $_REQUEST['id_venta'] : '';
$id_alumno = isset($_REQUEST['id_alumno']) ? $_REQUEST['id_alumno'] : '';
$json_consulta = json_decode(file_get_contents("http://localhost:8888/IMF/gestion-matriculas/ajax/buscar-venta.php?id_venta=" . $id_venta),true);

$fecha_inicio_convocatoria = $json_consulta[1]["fecha_inicio_convocatoria"];
$fecha_fin_convocatoria = $json_consulta[1]["fecha_fin_convocatoria"]=="0000-00-00" ? "" : $json_consulta[1]["fecha_fin_convocatoria"];
$nombre = mb_strtoupper($json_consulta[1]["nombre"]);
$apellido1 = mb_strtoupper($json_consulta[1]["apellido1"]);
$apellido2 = mb_strtoupper($json_consulta[1]["apellido2"]);
$telefono = mb_strtoupper($json_consulta[1]["telefono"]);
$arr_telefono = str_split($telefono);
$resto_telefono = substr($telefono, 9);
$movil = mb_strtoupper($json_consulta[1]["movil"]);
$arr_movil = str_split($movil);
$resto_movil = substr($movil, 9);
$dir_calle = mb_strtoupper($json_consulta[1]["dir_calle"]);
$dir_numero = mb_strtoupper($json_consulta[1]["dir_numero"]);
$dir_esc = mb_strtoupper($json_consulta[1]["dir_esc"]);
$dir_piso = mb_strtoupper($json_consulta[1]["dir_piso"]);
$dir_puerta = mb_strtoupper($json_consulta[1]["dir_puerta"]);
$documento = mb_strtoupper($json_consulta[1]["documento"]);
$email = mb_strtoupper($json_consulta[1]["email"]);
$arr_email = explode("@", $email);
$pre_arroba_email = $arr_email[0];
$post_arroba_email = $arr_email[1];
$arr_pre_arroba_email = str_split($pre_arroba_email);
$resto_pre_arroba_email = substr($pre_arroba_email, 16);
$dir_codigo_postal = mb_strtoupper($json_consulta[1]["dir_codigo_postal"]);
$dir_provincia = mb_strtoupper($json_consulta[1]["dir_provincia"]);
$dir_pais = mb_strtoupper($json_consulta[1]["dir_pais"]);
$municipio = mb_strtoupper($json_consulta[1]["dir_localidad"]);
$twitter = " ";//mb_strtoupper($json_consulta[1]["twitter"]);
$estudios_realizados = mb_strtoupper($json_consulta[1]["carrera"]);
$nivel_estudios = $json_consulta[1]["tipo_estudios"];
$id_tipo_centro = $json_consulta[1]["id_tipo_centro"];
$nombre_centro = mb_strtoupper($json_consulta[1]["nombre_centro"]);
$situacion_laboral = $json_consulta[1]["situacion_laboral"];
$libros = $json_consulta[1]["libros"];
$id_nacionalidad = $json_consulta[1]["id_nacionalidad"];
$nacionalidad = mb_strtoupper($json_consulta[1]["pais_nacionalidad"]);
$id_genero = $json_consulta[1]["id_genero"];
$fecha_nacimiento = $json_consulta[1]["fecha_nacimiento"];
$localidad_nacimiento = mb_strtoupper($json_consulta[1]["localidad_nacimiento"]);
$provincia_nacimiento = mb_strtoupper($json_consulta[1]["provincia_nacimiento"]);
$pais_nacimiento = mb_strtoupper($json_consulta[1]["pais_nacimiento"]);
$telefono_emergencia = mb_strtoupper($json_consulta[1]["telefono_emergencia"]);
$residencia_universidad = $json_consulta[1]["residencia_universidad"];
$pais_prov = mb_strtoupper($json_consulta[1]["pais_prov"]);
$provincia_prov = mb_strtoupper($json_consulta[1]["provincia_prov"]);
$localidad_prov = mb_strtoupper($json_consulta["localidad_prov"]);
$codigo_postal_prov = mb_strtoupper($json_consulta[1]["codigo_postal_prov"]);
$calle_prov = mb_strtoupper($json_consulta[1]["dir_calle_prov"]);
$numero_prov = mb_strtoupper($json_consulta[1]["dir_numero_prov"]);
$esc_prov = mb_strtoupper($json_consulta[1]["dir_esc_prov"]);
$piso_prov = mb_strtoupper($json_consulta[1]["dir_piso_prov"]);
$puerta_prov = mb_strtoupper($json_consulta[1]["dir_puerta_prov"]);
$telefono_prov = " ";//mb_strtoupper($json_consulta[1]["telefono_prov"]);

//razón social
$empresa = mb_strtoupper($json_consulta[1]["empresa"]);
$dir_calle_empresa = mb_strtoupper($json_consulta[1]["dir_calle_empresa"]);
$dir_numero_empresa = mb_strtoupper($json_consulta[1]["dir_numero_empresa"]);
$dir_puerta_empresa = mb_strtoupper($json_consulta[1]["dir_puerta_empresa"]);
$dir_piso_empresa = mb_strtoupper($json_consulta[1]["dir_piso_empresa"]);
$cif_empresa = mb_strtoupper($json_consulta[1]["cif_empresa"]);
$municipio_empresa = mb_strtoupper($json_consulta[1]["municipio_empresa"]);
$dir_codigo_postal_empresa = $json_consulta[1]["dir_codigo_postal_empresa"];
$dir_provincia_empresa = mb_strtoupper($json_consulta[1]["provincia_empresa"]);
$tlf_empresa = $json_consulta[1]["tlf_empresa"];
$plantilla_media_empresa = $json_consulta[1]["plantilla_media_empresa"];
$email_empresa = mb_strtoupper($json_consulta[1]["email_empresa"]);
$cargo_contacto_empresa = mb_strtoupper($json_consulta[1]["cargo_contacto_empresa"]);
$actividad_empresa = mb_strtoupper($json_consulta[1]["actividad_empresa"]);

//datos curso (doc 2)
$nombrecurso = mb_strtoupper($json_consulta[1]["nombrecurso"]);
$id_modalidad = $json_consulta[1]["id_modalidad"]; 
$id_cualificacion = $json_consulta[1]["id_cualificacion"]; 
//dirección envío material 
$tipo_domicilio_envio = mb_strtoupper($json_consulta[1]["tipo_domicilio_envio"]);
//$envio_manana_tarde = mb_strtoupper($json_consulta[1]["envio_manana_tarde"]);
$dir_nombre_envio = mb_strtoupper($json_consulta[1]["dir_nombre_envio"]);
$dir_apellido1_envio = mb_strtoupper($json_consulta[1]["dir_apellido1_envio"]);
$dir_apellido2_envio = mb_strtoupper($json_consulta[1]["dir_apellido2_envio"]);
$domicilio_envio = mb_strtoupper($json_consulta[1]["domicilio_envio"]);

$dir_calle_envio = mb_strtoupper($json_consulta[1]["dir_calle_envio"]);
$dir_numero_envio = $json_consulta[1]["dir_numero_envio"];
$dir_esc_envio = mb_strtoupper($json_consulta[1]["dir_esc_envio"]);
$dir_piso_envio = mb_strtoupper($json_consulta[1]["dir_piso_envio"]);
$dir_puerta_envio = mb_strtoupper($json_consulta[1]["dir_puerta_envio"]);
$dir_codigo_postal_envio = mb_strtoupper($json_consulta[1]["dir_codigo_postal_envio"]);
$dir_pais_envio = mb_strtoupper($json_consulta[1]["pais_envio"]);
$dir_provincia_envio = mb_strtoupper($json_consulta[1]["provincia_envio"]);
$dir_localidad_envio = mb_strtoupper($json_consulta[1]["localidad_envio"]);

//Precio y forma de pago (doc2)
$facturar_a = $json_consulta[1]["facturar_a"]; 
$preciocurso = $json_consulta[1]["preciocurso"];
$id_tipo_pago = $json_consulta[1]["id_tipo_pago"];
$forma_primer_pago = $json_consulta[1]["forma_primer_pago"];
$importe_primer_pago = $json_consulta[1]["importe_primer_pago"];
$num_pagos = $json_consulta[1]["num_pagos"]=="1" ? " " : $json_consulta[1]["num_pagos"] ;
$importe_mensualidad = $json_consulta[1]["importe_mensualidad"]=="0" ? " " : $json_consulta[1]["importe_mensualidad"]." €";
$iban_cuenta = mb_strtoupper($json_consulta[1]["iban_cuenta"]);
$bic_cuenta = mb_strtoupper($json_consulta[1]["bic_cuenta"]);
$titular_cuenta = mb_strtoupper($json_consulta[1]["titular_cuenta"]);
*/

// Obtenemos HTML 
/*
if ($html = file_get_contents($doc)) {
	$html = str_replace("#SOLIC-NUM#", "&nbsp;", $html);
	$html = str_replace("#SOLIC-CENTRO#", "&nbsp;", $html);
	$html = str_replace("#SOLIC-FCH#", "&nbsp;", $html);
	$html = str_replace("#CURSO-ACAD#", substr($fecha_inicio_convocatoria, 0, 4) . "-" . substr($fecha_fin_convocatoria, 0, 4), $html);
	if ($id_nacionalidad=="724") {
		$html = str_replace("#a44#", "X", $html);
		$html = str_replace("#a45#", "", $html);
		$html = str_replace("#NACIONALIDAD#", " ", $html);
	} else {
		$html = str_replace("#a44#", "", $html);
		$html = str_replace("#a45#", "X", $html);
		$html = str_replace("#NACIONALIDAD#", $nacionalidad, $html);
	}
	if ($id_genero=="1") {
		$html = str_replace("#VARON#", "X", $html);
		$html = str_replace("#MUJER#", "", $html);
	} elseif ($id_genero=="2") {
		$html = str_replace("#VARON#", "", $html);
		$html = str_replace("#MUJER#", "X", $html);
	}
	$html = str_replace("#APELLIDO-1#", $apellido1, $html);
	$html = str_replace("#APELLIDO-2#", ($apellido2!="" ? $apellido2 : " "), $html);
	$html = str_replace("#NOMBRE#", $nombre, $html);
	$html = str_replace("#tf#", $telefono, $html);
	for ($i=0; $i<count($arr_telefono) && $i<9; $i++) {
		$html = str_replace("#tf-".($i+1)."#", $arr_telefono[$i], $html);
	}
	for ($i=1; $i<=9; $i++) {
		$html = str_replace("#tf-".$i."#", "", $html);
	}
	$html = str_replace("#tfr#", $resto_telefono, $html);
	$html = str_replace("#tm#", $movil, $html);
	for ($i=0; $i<count($arr_movil) && $i<9; $i++) {
		$html = str_replace("#tm-".($i+1)."#", $arr_movil[$i], $html);
	}
	for ($i=1; $i<=9; $i++) {
		$html = str_replace("#tm-".$i."#", "", $html);
	}
	$html = str_replace("#tmr#", $resto_telefono, $html);
	$html = str_replace("#DOMICILIO#", $dir_calle, $html);
	$html = str_replace("#Dn#", $dir_numero, $html);
	$html = str_replace("#Dp#", $dir_piso, $html);
	$html = str_replace("#Dl#", $dir_puerta, $html);
	$html = str_replace("#De#", $dir_esc, $html);
	$html = str_replace("#dni#", $documento, $html);
	$html = str_replace("#m#", $email, $html);
	for ($i=0; $i<count($arr_pre_arroba_email) && $i<16; $i++) {
		$html = str_replace("#m-".($i+1)."#", $arr_pre_arroba_email[$i], $html);
	}
	for ($i=1; $i<=16; $i++) {
		$html = str_replace("#m-".$i."#", "", $html);
	}
	$html = str_replace("#m-r#", $resto_pre_arroba_email, $html);	
	$html = str_replace("#rest-mail#", $post_arroba_email, $html);
	$html = str_replace("#niktwit#", $twitter, $html);
	$html = str_replace("#CP#", $dir_codigo_postal, $html);
	$html = str_replace("#PAIS#", $dir_pais, $html);
	$html = str_replace("#NA#", substr($fecha_nacimiento, 0, 4), $html);
	$html = str_replace("#NM#", substr($fecha_nacimiento, 5, 2), $html);
	$html = str_replace("#ND#", substr($fecha_nacimiento, 8, 2), $html);
	$html = str_replace("#LOCALIDAD#", $municipio, $html);
	$html = str_replace("#PROVINCIA#", $dir_provincia, $html);
	$html = str_replace("#BIRTH-LOC#", $localidad_nacimiento, $html);
	$html = str_replace("#BIRTH-PROV#", $provincia_nacimiento, $html);
	$html = str_replace("#BIRTH-PAIS#", $pais_nacimiento, $html);
	$html = str_replace("#ef-FINALIZADOS#", $estudios_realizados, $html);
	$html = str_replace("#temerg#", $telefono_emergencia, $html);
	if ($residencia_universidad=="1") {
		$html = str_replace("#a46#", "X", $html);
		$html = str_replace("#a47#", "", $html);
		$html = str_replace("#DOMICILIO-CURSO#, #DCn#, #DCe#, #DCp#, #DCl#", " ", $html);
		$html = str_replace("#C-LOCALIDAD#", " ", $html);
		$html = str_replace("#C-PROVINCIA#", " ", $html);
		$html = str_replace("#CCP#", " ", $html);
		$html = str_replace("#C-PAIS#", " ", $html);
		$html = str_replace("#Ctf#", " ", $html);
	} elseif ($residencia_universidad=="0") {
		$html = str_replace("#a46#", "", $html);
		$html = str_replace("#a47#", "X", $html);
		$html = str_replace("#DOMICILIO-CURSO#", $calle_prov, $html);
		$html = str_replace("#DCn#", $numero_prov, $html);
		$html = str_replace("#DCe#", $esc_prov, $html);
		$html = str_replace("#DCp#", $piso_prov, $html);
		$html = str_replace("#DCl#", $puerta_prov, $html);
		$html = str_replace("#C-LOCALIDAD#", $localidad_prov, $html);
		$html = str_replace("#C-PROVINCIA#", $provincia_prov, $html);
		$html = str_replace("#CCP#", $codigo_postal_prov, $html);
		$html = str_replace("#C-PAIS#", $pais_prov, $html);
		$html = str_replace("#Ctf#", $telefono_prov, $html);
	} else {
		$html = str_replace("#a46#", "", $html);
		$html = str_replace("#a47#", "X", $html);
		$html = str_replace("#DOMICILIO-CURSO#, #DCn#, #DCe#, #DCp#, #DCl#", " ", $html);		
		$html = str_replace("#C-LOCALIDAD#", " ", $html);
		$html = str_replace("#C-PROVINCIA#", " ", $html);
		$html = str_replace("#CCP#", " ", $html);
		$html = str_replace("#C-PAIS#", " ", $html);
		$html = str_replace("#Ctf#", " ", $html);
	}
	$html = str_replace("#FECH-INIC#", substr($fecha_inicio_convocatoria, 5, 2) . "-" . substr($fecha_inicio_convocatoria, 0, 4), $html);
	$html = str_replace("#FECH-FIN#", substr($fecha_fin_convocatoria, 5, 2) . "-" . substr($fecha_fin_convocatoria, 0, 4), $html);
	if ($nivel_estudios=="31" || $nivel_estudios=="18") {	// Licenciatura/Ingeniería Superior ó Arquitecto e Ingeniero superior o licenciado
		$html = str_replace("#a36#", "", $html);
		$html = str_replace("#a37#", "", $html);
		$html = str_replace("#a38#", "", $html);
		$html = str_replace("#a40#", "", $html);
		$html = str_replace("#a1#", "X", $html);
		$html = str_replace("#a2#", "", $html);
		$html = str_replace("#a3#", "", $html);
		$html = str_replace("#a26#", "", $html);
	} elseif ($nivel_estudios=="30" || $nivel_estudios=="16") {	// Diplomatura/Ingeniería Técnica ó Arquitecto Técnico o Ingeniero Técnico, Diplomado
		$html = str_replace("#a36#", "", $html);
		$html = str_replace("#a37#", "", $html);
		$html = str_replace("#a38#", "", $html);
		$html = str_replace("#a40#", "", $html);
		$html = str_replace("#a1#", "", $html);
		$html = str_replace("#a2#", "X", $html);
		$html = str_replace("#a3#", "", $html);
		$html = str_replace("#a26#", "", $html);
	} elseif ($nivel_estudios=="29") {	// Bachillerato + PAU
		$html = str_replace("#a36#", "X", $html);
		$html = str_replace("#a37#", "", $html);
		$html = str_replace("#a38#", "", $html);
		$html = str_replace("#a40#", "", $html);
		$html = str_replace("#a1#", "", $html);
		$html = str_replace("#a2#", "", $html);
		$html = str_replace("#a3#", "", $html);
		$html = str_replace("#a26#", "", $html);
	} elseif ($nivel_estudios=="21") {	// Selectividad
		$html = str_replace("#a36#", "", $html);
		$html = str_replace("#a37#", "X", $html);
		$html = str_replace("#a38#", "", $html);
		$html = str_replace("#a40#", "", $html);
		$html = str_replace("#a1#", "", $html);
		$html = str_replace("#a2#", "", $html);
		$html = str_replace("#a3#", "", $html);
		$html = str_replace("#a26#", "", $html);
	} elseif ($nivel_estudios=="27") {	// Titulación Universitaria
		$html = str_replace("#a36#", "", $html);
		$html = str_replace("#a37#", "", $html);
		$html = str_replace("#a38#", "X", $html);
		$html = str_replace("#a40#", "", $html);
		$html = str_replace("#a1#", "", $html);
		$html = str_replace("#a2#", "", $html);
		$html = str_replace("#a3#", "", $html);
		$html = str_replace("#a26#", "", $html);
	} elseif ($nivel_estudios=="19") {	// Acceso mayores 25 años
		$html = str_replace("#a36#", "", $html);
		$html = str_replace("#a37#", "", $html);
		$html = str_replace("#a38#", "", $html);
		$html = str_replace("#a40#", "X", $html);
		$html = str_replace("#a1#", "", $html);
		$html = str_replace("#a2#", "", $html);
		$html = str_replace("#a3#", "", $html);
		$html = str_replace("#a26#", "", $html);
	} elseif ($nivel_estudios=="26" || $nivel_estudios=="28" || $nivel_estudios=="14") {	// Otras titulaciones
		$html = str_replace("#a36#", "", $html);
		$html = str_replace("#a37#", "", $html);
		$html = str_replace("#a38#", "", $html);
		$html = str_replace("#a40#", "", $html);
		$html = str_replace("#a1#", "", $html);
		$html = str_replace("#a2#", "", $html);
		$html = str_replace("#a3#", "X", $html);
		$html = str_replace("#a26#", "", $html);
	} elseif ($nivel_estudios=="20") {	// Titulación Extranjera
		$html = str_replace("#a36#", "", $html);
		$html = str_replace("#a37#", "", $html);
		$html = str_replace("#a38#", "", $html);
		$html = str_replace("#a40#", "", $html);
		$html = str_replace("#a1#", "", $html);
		$html = str_replace("#a2#", "", $html);
		$html = str_replace("#a3#", "", $html);
		$html = str_replace("#a26#", "X", $html);
	}
	$html = str_replace("#ef-c#", $nombre_centro, $html);
	switch ($id_tipo_centro) {
		case "1": 	// UNIVERSIDAD PÚBLICA
			$html = str_replace("#a27#", "X", $html);	
			$html = str_replace("#a28#", "", $html);	
			$html = str_replace("#a29#", "", $html);	
			break;
		case "2": 	// UNIVERSIDAD PRIVADA
			$html = str_replace("#a27#", "", $html);	
			$html = str_replace("#a28#", "X", $html);	
			$html = str_replace("#a29#", "", $html);	
			break;
		case "3": 	// UNIVERSIDAD EXTRANJERA
			$html = str_replace("#a27#", "", $html);	
			$html = str_replace("#a28#", "", $html);	
			$html = str_replace("#a29#", "X", $html);	
			break;
		default: 
			$html = str_replace("#a27#", "", $html);	
			$html = str_replace("#a28#", "", $html);	
			$html = str_replace("#a29#", "", $html);	
			break;
	}
	switch ($situacion_laboral) {
		case "15": 
			$html = str_replace("#a4#", "X", $html);	
			$html = str_replace("#a5#", "", $html);	
			$html = str_replace("#a6#", "", $html);	
			$html = str_replace("#a7#", "", $html);	
			break;
		case "13": 
			$html = str_replace("#a4#", "", $html);	
			$html = str_replace("#a5#", "X", $html);	
			$html = str_replace("#a6#", "", $html);	
			$html = str_replace("#a7#", "", $html);	
			break;
		case "14": 
			$html = str_replace("#a4#", "", $html);	
			$html = str_replace("#a5#", "", $html);	
			$html = str_replace("#a6#", "X", $html);	
			$html = str_replace("#a7#", "", $html);	
			break;
		case "12": 
			$html = str_replace("#a4#", "", $html);	
			$html = str_replace("#a5#", "", $html);	
			$html = str_replace("#a6#", "", $html);	
			$html = str_replace("#a7#", "X", $html);	
			break;
	}
		
	//razón social
	$html = str_replace("#EMPR-RS#", $empresa, $html);
	$html = str_replace("#EMPR-D#", $dir_calle_empresa . " " . $dir_numero_empresa . " " . $dir_piso_empresa . " " . $dir_puerta_empresa, $html);
	$html = str_replace("#EMPR-PROV#", $dir_provincia_empresa, $html);
	$html = str_replace("#EMPR-CIF#", $cif_empresa, $html);
	$html = str_replace("#EMPR-LOC#", $municipio_empresa, $html);
	$html = str_replace("#EMPR-CP#", $dir_codigo_postal_empresa, $html);
	//prov empresa
	$html = str_replace("#EMPR-TF#", $tlf_empresa, $html);
	$html = str_replace("#EMPR-PLANT#", $plantilla_media_empresa, $html);
	$html = str_replace("#EMPR-MAIL#", $email_empresa, $html);
	$html = str_replace("#EMPR-DEP#", $cargo_contacto_empresa, $html);
	$html = str_replace("#EMPR-SECTOR#", $actividad_empresa, $html);

	if ($id_modalidad=="2" && $libros=="0") {	// ONLINE
		$html = str_replace("#a8#", "X", $html);
		$html = str_replace("#a9#", "", $html);
		$html = str_replace("#a10#", "", $html);
		$html = str_replace("#a11#", "", $html);
		$html = str_replace("#a42#", "", $html);
		$html = str_replace("#a43#", "X", $html);
	} elseif ($id_modalidad=="2" && $libros!="0") {	// DISTANCIA
		$html = str_replace("#a8#", "", $html);
		$html = str_replace("#a9#", "X", $html);
		$html = str_replace("#a10#", "", $html);
		$html = str_replace("#a11#", "", $html);
		$html = str_replace("#a42#", "", $html);
		$html = str_replace("#a43#", "X", $html);
	} elseif ($id_modalidad=="3") {				// SEMIPRESENCIAL
		$html = str_replace("#a8#", "", $html);
		$html = str_replace("#a9#", "", $html);
		$html = str_replace("#a10#", "X", $html);
		$html = str_replace("#a11#", "", $html);
		$html = str_replace("#a42#", "X", $html);
		$html = str_replace("#a43#", "", $html);
	} elseif ($id_modalidad=="4") {				// PRESENCIAL
		$html = str_replace("#a8#", "", $html);
		$html = str_replace("#a9#", "", $html);
		$html = str_replace("#a10#", "", $html);
		$html = str_replace("#a11#", "X", $html);
		$html = str_replace("#a42#", "", $html);
		$html = str_replace("#a43#", "X", $html);
	} else {
		$html = str_replace("#a8#", "", $html);
		$html = str_replace("#a9#", "", $html);
		$html = str_replace("#a10#", "", $html);
		$html = str_replace("#a11#", "", $html);
		$html = str_replace("#a42#", "", $html);
		$html = str_replace("#a43#", "", $html);
	}
	
	//datos curso
	$html = str_replace("#PROGRAMA#", $nombrecurso, $html);
	switch ($id_cualificacion) {
		case "4": 
			$html = str_replace("#a33#", "X", $html);	
			$html = str_replace("#a34#", "", $html);	
			$html = str_replace("#a35#", "", $html);	
			break;
		case "3": 
			$html = str_replace("#a33#", "", $html);	
			$html = str_replace("#a34#", "X", $html);	
			$html = str_replace("#a35#", "", $html);	
			break;
		default: 
			$html = str_replace("#a33#", "", $html);	
			$html = str_replace("#a34#", "", $html);	
			$html = str_replace("#a35#", "", $html);	
			break;
	}
	
	if (($residencia_universidad=="1" && $domicilio_envio=="PROVISIONAL") || $tipo_domicilio_envio=="OTRO") {	// OTRA DIRECCIÓN
		$html = str_replace("#a12#", "", $html);
		$html = str_replace("#a13#", "", $html);
		$html = str_replace("#a14#", "X", $html);
	} elseif ($domicilio_envio=="HABITUAL" || $tipo_domicilio_envio=="PART") { // DOMICILIO PARTICULAR
		$html = str_replace("#a12#", "X", $html);
		$html = str_replace("#a13#", "", $html);
		$html = str_replace("#a14#", "", $html);
	} elseif ($tipo_domicilio_envio=="EMP") {		// DOMICILIO EMPRESA
		$html = str_replace("#a12#", "", $html);
		$html = str_replace("#a13#", "X", $html);
		$html = str_replace("#a14#", "", $html);
	} else {
		$html = str_replace("#a12#", "", $html);
		$html = str_replace("#a13#", "", $html);
		$html = str_replace("#a14#", "", $html);
	}

	$html = str_replace("#a15#", "", $html);	// ENTREGA POR LA MAÑANA
	$html = str_replace("#a16#", "", $html);	// ENTREGA POR LA TARDE
	
	$html = str_replace("#ENVIO-NOMBRE#", $dir_nombre_envio." ".$dir_apellido1_envio." ".$dir_apellido2_envio, $html);
	$html = str_replace("#ENVIO-DIRECCION#", $dir_calle_envio." ".$dir_numero_envio." ".$dir_esc_envio." ".$dir_piso_envio." ".$dir_puerta_envio, $html);
	$html = str_replace("#ENVIO-CP#", $dir_codigo_postal_envio, $html);
	$html = str_replace("#ENVIO-POBL#", $dir_localidad_envio, $html);
	$html = str_replace("#ENVIO-PRO#", $dir_provincia_envio, $html);

	//Precio y forma de pago (doc2)
	if ($facturar_a=="0") {	//PARTICULAR
		$html = str_replace("#a17#", "X", $html);
		$html = str_replace("#a18#", "", $html);
	} elseif ($facturar_a=="1") {	//EMPRESA
		$html = str_replace("#a17#", "", $html);
		$html = str_replace("#a18#", "X", $html);
	}
	if ($id_tipo_pago=="1") {	// ÚNICO
		$html = str_replace("#a19#", "X", $html);
		$html = str_replace("#a20#", "", $html);
	} elseif ($id_tipo_pago=="2") {	//FRACCIONADO
		$html = str_replace("#a19#", "", $html);
		$html = str_replace("#a20#", "X", $html);
	}
	$html = str_replace("#PRECIO-PAGO#", $preciocurso, $html);
	$html = str_replace("#PAGO-PR#", $importe_primer_pago, $html); 
	$html = str_replace("#Pm#", $num_pagos, $html);
	$html = str_replace("#PAGO-MS#", $importe_mensualidad, $html);
	if ($forma_primer_pago=="4") {			// efectivo
		$html = str_replace("#a21#", "X", $html);
		$html = str_replace("#a22#", "", $html);
		$html = str_replace("#a23#", "", $html);
	} elseif ($forma_primer_pago=="2") {	// transferencia
		$html = str_replace("#a21#", "", $html);
		$html = str_replace("#a22#", "X", $html);
		$html = str_replace("#a23#", "", $html);
	} elseif ($forma_primer_pago=="6") {	// ingreso en cuenta
		$html = str_replace("#a21#", "", $html);
		$html = str_replace("#a22#", "", $html);
		$html = str_replace("#a23#", "X", $html);
	} else {
		$html = str_replace("#a21#", "", $html);
		$html = str_replace("#a22#", "", $html);
		$html = str_replace("#a23#", "", $html);
	}
	$html = str_replace("#RECIB-N#", " ", $html);
	$html = str_replace("#RECIB-I#", " ", $html);
	$html = str_replace("#TITULAR#", $titular_cuenta, $html);
	$html = str_replace("#IBAN#", $iban_cuenta, $html);
	$html = str_replace("#BIC#", $bic_cuenta, $html);
	
	$html = str_replace("#titulo-fin-1#", " ", $html);
	$html = str_replace("#titulo-fin-2#", " ", $html);
	$html = str_replace("#titulo-fin-3#", " ", $html);
	$html = str_replace("#titulo-fin-4#", " ", $html);
	$html = str_replace("#titulo-in-1#", " ", $html);
	$html = str_replace("#titulo-in-2#", " ", $html);
	$html = str_replace("#titulo-in-3#", " ", $html);
	$html = str_replace("#titulo-in-4#", " ", $html);



	
	// Instanciamos un objeto de la clase DOMPDF.
	$pdf = new DOMPDF();
	// Definimos el tamaño y orientación del papel que queremos.
	$pdf->set_paper("A4", "portrait");
	// Cargamos el contenido HTML.
	 $pdf->load_html($html);
	// Renderizamos el documento PDF.
	$pdf->render();
	// Enviamos el fichero PDF al navegador.
	if ($doc=='doc1.html') {
		$nombre_doc = "Documento Matrícula Camilo José Cela";
	} else if ($doc=='doc2.html') {
		$nombre_doc = "Documento Inscripción Master IMF";
	} else if ($doc=='doc3.html') {
		$nombre_doc = "Documento Inscripción Curso IMF";
	} else if ($doc=='doc4.html') {
		$nombre_doc = "Documento Inscripción Grado IMF";
	} else if ($doc=='doc5.html') {
		$nombre_doc = "Impreso Matrícula nuevo alumno UCJC";
	} else if ($doc=='doc6.html') {
		$nombre_doc = "Documento Inscripción Grado UCJC";
	} else if ($doc=='doc7.html') {
		$nombre_doc = "Hoja Ministerio Educación Master UCJC";
	} else if ($doc=='doc8.html') {
		$nombre_doc = "Solicitud de Admisión - Masters, Postgrados y Doctorados UCJC";
	} else if ($doc=='doc9.html') {
		$nombre_doc = "Hoja Ministerio Educación Grado UCJC";
	}	
	// $pdf->stream($nombre_doc . '.pdf', array("Attachment" => "0"));
}
*/ 


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
      <h1>Presupuesto núm: ###</h1> 
      <div id="project">
        <div><span>CLIENTE</span>John Doe</div>
        <div><span>DIRECCIÓN</span>796 Silver Harbour, TX 79273, US</div>
        <div><span>VEHÍCULO</span>VEHÍCULO CLIENTE</div>
        <div><span>FECHA </span>PONER AQUÍ NOW()</div>
        <div><span>VÁLIDO</span>PONER AQUÍ NOW() + X DÍAS</div>
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
        <tbody>
          <tr>
            <td class="ref">UR14011</td>
            <td class="desc">Air Conditioning Condenser (from Vin 1001 To 11000 Approx) (ur14011)</td>
            <td class="pvp">$40.00</td>
            <td class="uds">26</td>
            <td class="importe">$1,040.00</td>
          </tr>
          <tr>
            <td class="ref">UR14011</td>
            <td class="desc">Air Conditioning Condenser (from Vin 1001 To 11000 Approx) (ur14011)</td>
            <td class="pvp">$40.00</td>
            <td class="uds">26</td>
            <td class="importe">$1,040.00</td>
          </tr>
          <tr>
            <td colspan="4" class="grand total">SUBTOTAL</td>
            <td class="grand">$5,200.00</td>
          </tr>
          <tr>
            <td colspan="4">IVA 21%</td>
            <td>$1,300.00</td>
          </tr>
          <tr>
            <td colspan="4">TOTAL</td>
            <td>$6,500.00</td>
          </tr>
        </tbody>
      </table>
      <div id="notices">
        <div>Comentarios:</div>
        <div class="notice">ALGÚN TEXTO A REMARCAR. ¿ASUNTO DEL PRESUPUESTO?.</div>
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
$pdf->render();
$pdf->stream('NietoPresupuesto.pdf');



/*$id_pais_nacimiento = mb_strtoupper($json_consulta[1]["id_pais_nacimiento"]);
$id_venta = ($json_consulta[1]["id_venta"]);
$id_curso_crm = mb_strtoupper($json_consulta[1]["id_curso_crm"]);
$fecha_alta = mb_strtoupper($json_consulta[1]["fecha_alta"]);
$fecha_ultima_modificacion = mb_strtoupper($json_consulta[1]["fecha_ultima_modificacion"]);
$id_estado_venta = mb_strtoupper($json_consulta[1]["id_estado_venta"]);
$codigo_sdi = mb_strtoupper($json_consulta[1]["codigo_sdi"]);
$baja_info_comercial = mb_strtoupper($json_consulta[1]["baja_info_comercial"]);
$baja_lopd = mb_strtoupper($json_consulta[1]["baja_lopd"]);
$baja_datos_terceros = mb_strtoupper($json_consulta[1]["baja_datos_terceros"]);
$fecha_primer_pago = mb_strtoupper($json_consulta[1]["fecha_primer_pago"]);
$forma_pago_sucesivos = mb_strtoupper($json_consulta[1]["forma_pago_sucesivos"]);
$fecha_doc_ok = mb_strtoupper($json_consulta[1]["fecha_doc_ok"]);
$apostilla = mb_strtoupper($json_consulta[1]["apostilla"]);
$cesion_bluebottlebiz = mb_strtoupper($json_consulta[1]["cesion_bluebottlebiz"]);
$id_alumno = mb_strtoupper($json_consulta[1]["id_alumno"]);
$id_provincia_nacimiento = mb_strtoupper($json_consulta[1]["id_provincia_nacimiento"]);
$id_nacionalidad = mb_strtoupper($json_consulta[1]["id_nacionalidad"]);

$id_nacionalidad = mb_strtoupper($json_consulta[1]["id_nacionalidad"]);
$tipo_documento = mb_strtoupper($json_consulta[1]["tipo_documento"]);
$tipo_estudios = mb_strtoupper($json_consulta[1]["tipo_estudios"]);
$id_carrera = mb_strtoupper($json_consulta[1]["id_carrera"]);
$nombre_centro = mb_strtoupper($json_consulta[1]["nombre_centro"]);

$contacto_empresa = mb_strtoupper($json_consulta[1]["contacto_empresa"]);
$estado_venta = mb_strtoupper($json_consulta[1]["estado_venta"]);
$autorizado_por = mb_strtoupper($json_consulta[1]["autorizado_por"]);
$materias_a_convalidar = mb_strtoupper($json_consulta[1]["materias_a_convalidar"]);
$curso_imf = mb_strtoupper($json_consulta[1]["curso_imf"]);
$curso_ceu = mb_strtoupper($json_consulta[1]["curso_ceu"]);
$curso_cela = mb_strtoupper($json_consulta[1]["curso_cela"]);
$comentarios = mb_strtoupper($json_consulta[1]["comentarios"]);
$id_reserva = mb_strtoupper($json_consulta[1]["id_reserva"]);
$estado_reserva = mb_strtoupper($json_consulta[1]["estado_reserva"]);*/
?>