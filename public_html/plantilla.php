<?php

header('Content-Type: text/html; charset=utf-8');
// Cargamos la librería dompdf que hemos instalado en la carpeta dompdf
require_once ('dompdf/dompdf_config.inc.php');

// Introducimos HTML de prueba
$html = ' 
    <head>
        <title>Documento de inscripción UCJC - 5</title>
        <META NAME="ROBOTS" CONTENT="NOINDEX, NOFOLLOW">
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0, user-scalable=no">
        <link rel="stylesheet" type="text/css" href="http://www.imf-formacion.com/gestion-matriculas/PDFS/css/style-pdf-ucjc.css">
    </head>
    <body>

        <div class = "contenido">
            <div class = "cabecera8">
                <div style="height:40px"></div>
                <div class = "logo-ucjc-8"></div>
                <img src = "gestion-matriculas/PDFS/img/logo-ucjc-5.png" height = "100" width = "100" />
                <div style="height:10px"></div>
                <div class = "texto-sublogo">
                    <h1>MATRÍCULA</h1>
                    <div class="ul entero">
              
                    <p>CURSO ACADÉMICO <span class="input corto-350">#CURSO-ACAD#</span></p>
               
                    </div>
                </div>
            </div>
            <div class = "caja">
                <div class = "apartado">
                    <h2>1. TITULACIÓN EN QUE SE MATRICULA  </h2>
                    <div class = "ul entero">
                        <div class = "li entero"><p>Titulación<span class = "li input corto-470">#PROGRAMA#</span></p></div>
                    </div>
                    <div class = "ul entero">
                        <div class = "li corto-420"><p>¿Se matricula en el programa para profesionales/semipresencial?</p></div>
                        <div class = "li check" style = "margin-left: 15px;">#a42#</div>
                        <div class = "li corto"><p>SÍ</p></div>
                        <div class = "li check" style = "margin-left: 15px;">#a43#</div>
                        <div class = "li corto"><p>NO</p></div>
                    </div>
                    <div class = "ul entero">
                        <div class = "li corto-120" ><p class="min">Modalidad </p></div>
                        <div class = "li check" style = "margin-left: 15px;">#a11#</div>
                        <div class = "li corto-90" ><p class="min">Presencial</p></div>
                        <div class = "li check" style = "margin-left: 15px;">#a10#</div>
                        <div class = "li corto-200"><p class="min">Semipresencial/Profesionales</p></div>
                        <div class = "li check" style = "margin-left: 15px;">#a9#</div>
                        <div class = "li corto-90"><p class="min">A Distancia</p></div>
                    </div>
                    <div class = "ul entero">
                        <div class = "li entero"><p>Indique los estudios oficiales previos, que dan acceso a la titulación en la que se matricula</p></div>
                    </div>
           <div class = "ul entero">
            <p><span class = "li input entero">#ef-FINALIZADOS#</span></p>
                </div>
                </div>
                <div class = "apartado">
                    <h2>2. DATOS DEL ALUMNO</h2>
                    <div class = "ul entero">
                        <div class = "li corto-70"><p>Nacionalidad</p></div>
                        <div class = "li check" style = "margin-left: 15px;">#a44#</div>
                        <div class = "li corto-100"><p>Española</p></div>
                             <div class = "li corto-240"><p></p></div>
                        <div class = "li corto"><p>Sexo</p></div>
                        <div class = "li check" style = "margin-left: 15px;">#VARON#</div>
                        <div class = "li corto"><p>Varón</p></div>
                    </div>
                    <div class = "ul entero">
                        <div class = "li corto-70"><p></p></div>
                        <div class = "li check" style = "margin-left: 15px;">#a45#</div>
                        <div class = "li corto"><p>Otra</p></div>
                        
                        <div class = "li" style="width:345px"><p>Indique País  <span class="input corto-200">#NACIONALIDAD#</span></p></div>
                        <div class = "li check" style = "margin-left: 15px;">#MUJER#</div>
                        <div class = "li corto"><p>Mujer</p></div>
                    </div>

                    <div class = "ul entero" >
                        <div class = "li entero"><p>D.N.I., NIE o Pasaporte <span class ="input corto-200">#dni#</span></p></div>
                    </div>
                    <div class = "ul entero">
                        <div class = "li mitad"><p >Primer apellido<span class = " input corto-200">#APELLIDO-1#</span></p></div>
                        <div class = "li mitad"><p >Segundo apellido<span class = "input corto-200">#APELLIDO-2#</span></p></div>
                    </div>
                    <div class = "ul entero" >
                        <div class = "li mitad" ><p>Nombre <span class="input corto-240">#NOMBRE#</span></p></div>
                        <div class = "li mitad" ><p>Teléf móvil del alumno <span class="input corto-170">#tm#</span></p></div>

                    </div>
                    <div class = "ul entero">
                         <div class = "li mitad"  ><p >Fecha de nacimiento<span class = "li input corto ">#ND# </span>/<span class="li input  corto"> #NM# </span>/ <span class="li input corto">#NA#</span></p></div>
                         <div class = "li mitad"  ><p  >Localidad de nacimiento<span class = "li input corto-150 ">#BIRTH-LOC#</span></p></div>
                    </div>
                         <div class = "ul entero"><p >Provincia de nacimiento <span class = "li input corto-370 ">#BIRTH-PROV#</span></p></div>
                      <div class = "ul entero"><p  >País de nacimiento<span class = "li input corto-420 ">#BIRTH-PAIS#</span></p></div>


       </div>
                   <div class = "apartado">
                    <h2>3. DOMICILIO FAMILIAR</h2>
                     <div class = "ul entero">
                        <div class = "li entero "><p>Calle/Avda./Plaza, nº, piso, letra <span class = "li input corto-320 ">#DOMICILIO#, #Dn#, #Dp#, #Dl#, #De#</span></p></div>
                      </div>
  <div class = "ul entero">
                        <div class = "li mitad"><p>Localidad <span class = "li input corto-250 ">#LOCALIDAD#</span></p></div>
                        <div class = "li mitad"><p>Provincia <span class = "li input corto-250 ">#PROVINCIA#</span></p></div>
                    </div>
                    
                    <div class = "ul entero">
                        <div class = "li corto-150 "><p>C.P.<span class = "li input corto-100 ">#CP#</span></p></div>
                        <div class = "li dostercios"><p>País <span class = "li input corto-290 ">#PAIS#</span></p></div>
                    </div>
                    <div class = "ul entero">
                        <div class = "li corto-150 "><p>Teléfono fijo<span class = "li input corto-100 ">#tf#</span></p></div>
                        <div class = "li dostercios"><p>Teléfono en caso de emergencia <span class = "li input corto-290 ">#temerg#</span></p></div>
                    </div>
                    <div class = "ul entero">
                        <div class = "li entero "><p>Calle/Avda./Plaza, nº, piso, letra <span class = "li input corto-320 ">#DOMICILIO#, #Dn#, #Dp#, #Dl#, #De#</span></p></div>
                      </div>
                </div>



            </div>

            <div class = "break"></div>
            <div style="height:80px;"></div>

        </div>
    </body>

';

$html = str_replace("#ef-1#", "x", $html);

// Instanciamos un objeto de la clase DOMPDF.
$pdf = new DOMPDF();

// Definimos el tamaño y orientación del papel que queremos.
$pdf->set_paper("A4", "portrait");

// Cargamos el contenido HTML.
$pdf->load_html($html);

// Renderizamos el documento PDF.
$pdf->render();

// Enviamos el fichero PDF al navegador.
$pdf->stream('  Imprimir.pdf ', array("Attachment" => "0"));
?>
