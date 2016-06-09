<!DOCTYPE html>
<html>
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <meta http-equiv="Content-Type" content="text/html; charset=UTF-8" />
        <!--<meta http-equiv="Content-Type" content="text/html">-->
        
        <link href="css/style.css" rel="stylesheet" type="text/css"/> 
        <link href="http://code.jquery.com/ui/1.10.2/themes/smoothness/jquery-ui.css" rel="Stylesheet"></link>
        
        <script src="js/jquery-1.11.2.min.js"></script>
        <script src="js/jquery-ui.min.js"></script>
        <!-- <script src="http://code.jquery.com/ui/1.10.2/jquery-ui.js" ></script> -->

        <!-- esta es la forma en la que se carga en IMF -->
        <!-- <script type="text/javascript" src="http://code.jquery.com/jquery-latest.min.js"></script> -->


        <!--<link href="css/tablas.css" rel="stylesheet" type="text/css"/>--> 
        <link href="css/bootstrap.min.css" rel="stylesheet" media="screen">
        
        <script src="js/bootstrap.min.js"></script>
        <script src="js/fastclick.js" type="text/javascript"></script>
        <!--<script src="js/navegacion.js" type="text/javascript"></script>-->
        <!--<script src="js/table-fixed-header.js"></script>-->
        <!--<script src="js/jquery.fixedheadertable.min"></script>-->
        <script src="js/script.js"></script>
        <!--<script src="js/cabeceras.js"></script>-->
        
        
    </head>
    
    <body>
        <header>
            <div class="menu">
                <div class="col activo" style="background-color: #CFB480"> 
                    Nuevo Clientee
                </div>
                <div class="col" style="background-color: #7F6538">
                    Listado Clientes
                </div>
                <div class="col"  style="background-color: #362B18">
                    Listado Presupuestos
                </div>
                <div class="col" style="background-color: #DBAE18">
                    Nuevo Presupuesto
                </div>
                <div class="col" style="background-color: #FF9717">
                    Listado Pedidos
                </div>
                <div class="col" style="background-color: #E85900">
                    Pedidos anul.
                </div>
                <div class="col" style="background-color: #3A3C42">
                    Base de datos
                </div>
                <div class="col" style="background-color: #E81C00">
                    Pérdidas
                </div>
            </div>
        </header>
        
        <div class="buscadores">
            <div class="col-lg-6">
              <div class="input-group">
                <span class="input-group-btn">
                  <button class="btn btn-default" type="button">Buscar</button>
                </span>
                <input type="text" class="form-control" id="client_id" onkeyup="autocomplet()">
                <ul id="client_list"></ul>
              </div>
            </div>
<!--            <div class="col-lg-6" id="buscador_cli">
              <div class="input-group">
                <span class="input-group-btn">
                  <button class="btn btn-default" type="button">Buscar clientes</button>
                </span>
                <input type="text" class="form-control">
              </div>
            </div>-->
        </div>
                
        <main>
            <div class="contenedor" id="contenedor"><!--Este es el div grande que va al 800%-->
                <div class="page">
<!--                    Nuevo Cliente-->
                    <form class="form-horizontal" role="form" id="form_nuevo_cliente">
                        <div class="center-block">
                            <button class="btn btn-primary center-block" id="guardar_cliente1">Guardar</button>
                        </div> 
                        <fieldset>
                            <legend>Datos del cliente</legend>
                            <div class="form-group">
                                <label class="col-xs-1 control-label">Nombre</label>
                                <div class="col-xs-11">
                                    <input type="text" class="form-control" name="input_nombre" id="input_nombre" placeholder="Nombre cliente">
                                </div>
                            </div>
                            
<!--                            ipputs de Coches-->
                            <div id="coches">
<!--                            Coche ppal-->                        
                                <div class="form-group">
                                    <label class="control-label col-xs-1">Coche principal</label>
                                    <div class="col-xs-7">
                                        <input type="text" name="coche0" id="input_coche0" class="form-control" placeholder="Modelo">
                                    </div>
                                    <div class="col-xs-3">
                                        <input type="text" name="bas0" id="input_bas0" class="form-control" placeholder="Bastidor">
                                    </div>
                                    <div class="col-xs-1">
                                        <input type="text" name="anio0" id="input_anio0" class="form-control" placeholder="Año">
                                    </div>
                                </div>
    <!--                            Coche 2-->                            
                                <div class="form-group">
                                    <label class="control-label col-xs-1">Coche 2</label>
                                    <div class="col-xs-7">
                                        <input type="text" name="coche2" id="input_coche1" class="form-control" placeholder="Modelo">
                                    </div>
                                    <div class="col-xs-3">
                                        <input type="text" name="bas2" id="input_bas1" class="form-control" placeholder="Bastidor">
                                    </div>
                                    <div class="col-xs-1">
                                        <input type="text" name="anio2" id="input_anio1" class="form-control" placeholder="Año">
                                    </div>
                                </div>
    <!--                            Coche 3-->                            
                                <div class="form-group">
                                    <label class="control-label col-xs-1">Coche 3</label>
                                    <div class="col-xs-7">
                                        <input type="text" name="coche3" id="input_coche2" class="form-control" placeholder="Modelo">
                                    </div>
                                    <div class="col-xs-3">
                                        <input type="text" name="bas3" id="input_bas2" class="form-control" placeholder="Bastidor">
                                    </div>
                                    <div class="col-xs-1">
                                        <input type="text" name="anio3" id="input_anio2" class="form-control" placeholder="Año">
                                    </div>
                                </div>
                            </div>
<!--                        form para el caso de añadir otro coche-->
                            <div id="addCocheOculto"><div class="form-group"><label class="control-label col-xs-1">Coche</label><div class="col-xs-7"><input type="text" class="form-control" placeholder="Modelo"></div><div class="col-xs-3"><input type="text" class="form-control" placeholder="Bastidor"></div><div class="col-xs-1"><input type="text" class="form-control" placeholder="Año"></div></div><div class="col-md-1 pull-right"><div style="text-align: center" class="btn-group"><button type="button" class="btn-success btn-xs" title="Agregar coche" id="btn_addCoche"><span class="glyphicon glyphicon-ok"></span></button><button type="button" class="btn-danger btn-xs" id="btn_cancel_coche"  title="Cancelar"><span class="glyphicon glyphicon-remove"></span></button></div></div>
                                    
                            </div>    
                            <div class="form-group">
                                <div class="col-xs-2 col-xs-offset-1">
                                    <button id="addCoche" class="btn btn-primary">Añadir Coche</button>
                                </div>
                            </div> 
                            
                            <div class="form-group">
                                <label class="control-label col-xs-1">Variado</label>
                                <div class="col-xs-11">
                                    <textarea name="input_variado" rows="3" class="form-control" id="input_variado" placeholder="Variado"></textarea>
                                </div>
                            </div>

                            <div class="form-group">
                                <label class="control-label col-xs-1">Tlf principal</label>
                                <div class="col-xs-5">
                                    <input type="text" name="input_tlf1" id="input_tlf1" class="form-control" placeholder="Tlf principal">
                                </div>
                                <label class="control-label col-xs-1">Tlf secundario</label>
                                <div class="col-xs-5">
                                    <input type="text" name="input_tlf2" id="input_tlf2" class="form-control" placeholder="Tlf secundario">
                                </div>
                                <!-- <label class="control-label col-xs-1">Tlf auxiliar</label>
                                <div class="col-xs-3">
                                    <input type="text" name="tlf3" class="form-control" placeholder="Tlf auxiliar">
                                </div> -->
                            </div>

                            <div class="form-group">
                                <label class="control-label col-xs-1">Email 1</label>
                                <div class="col-xs-5">
                                    <div class="input-group">
                                        <span class="input-group-addon">@</span>
                                        <input type="text" name="input_email1" id="input_email1" class="form-control" placeholder="Email 1">
                                    </div>
                                </div>
                                <label class="control-label col-xs-1">Email 2</label>
                                <div class="col-xs-5">
                                    <div class="input-group">
                                        <span class="input-group-addon">@</span>
                                        <input type="text" name="input_email2" id="input_email2" class="form-control" placeholder="Email 2">
                                    </div>
                                </div>
                            </div>
                        </fieldset>
                        <br>
                        <fieldset>
                            <legend>Dirección de envío</legend>
                            <!-- <div class="form-group">
                                <div class="col-xs-1">
                                    <label class="col-xs-1 control-label">Nombre</label>
                                </div>
                                <div class="col-xs-11">
                                    <input type="text" name="envio_nombre" id="envio_nombre" class="form-control" placeholder="Nombre">
                                </div>
                            </div> -->
                            <div class="form-group">
                                <div class="col-xs-1">
                                    <label class="col-xs-1 control-label">Calle</label>
                                </div>
                                <div class="col-xs-11">
                                    <input type="text" name="envio_calle" id="envio_calle" class="form-control" placeholder="Calle">
                                </div>
                            </div>
                            <div class="form-group">  
                                <div class="col-xs-1">
                                    <label class="control-label col-xs-1">Código Postal</label>
                                </div>
                                <div class="col-xs-2">
                                    <input name="envioCP" id="envioCP" type="text" class="form-control" placeholder="CP">
                                </div>
                                <div class="col-xs-2">
                                    <label class="control-label col-xs-2">Ciudad/Población</label>
                                </div>
                                <div class="col-xs-7">
                                    <input type="text" name="envio_ciudad" id="envio_ciudad" class="form-control" placeholder="Ciudad/Población">
                                </div>
                            </div>                            
                        </fieldset>
                        
                        <br>
                        
                        <fieldset>
                            <legend>Datos de facturación</legend>
                            <!-- <div class="form-group">
                                <div class="col-xs-1">
                                    <label class="col-xs-1 control-label">Nombre</label>
                                </div>
                                <div class="col-xs-11">
                                    <input type="text" class="form-control" name="fact_nombre" id="fact_nombre" placeholder="Nombre">
                                </div>
                            </div> -->
                            <div class="form-group">
                                <div class="col-xs-1">
                                    <label class="col-xs-1 control-label">Calle</label>
                                </div>
                                <div class="col-xs-11">
                                    <input type="text" name="fact_calle" id="fact_calle" class="form-control" placeholder="Calle">
                                </div>
                            </div>
                            <div class="form-group">    
                                <div class="col-xs-1">
                                    <label class="control-label col-xs-1">Código Postal</label>
                                </div>
                                <div class="col-xs-2">
                                    <input type="text" name="factCP" id="factCP" class="form-control" placeholder="CP">
                                </div>
                                <div class="col-xs-1">
                                    <label class="control-label col-xs-1">NIF/CIF</label>
                                </div>
                                <div class="col-xs-2">
                                    <input type="text" name="factNIF" id="factNIF" class="form-control" placeholder="NIF/CIF">
                                </div>
                                <div class="col-xs-2">
                                    <label class="control-label col-xs-1">Ciudad/Población</label>
                                </div>
                                <div class="col-xs-4">
                                    <input type="text" name="fact_ciudad" id="fact_ciudad" class="form-control" placeholder="Ciudad/Población">
                                </div>
                            </div>                            
                        </fieldset>
                        
                        <div class="form-group text-center">
                            <div class="btn-group">
                                <button class="btn btn-primary center-block" id="guardar_cliente2">Guardar</button>
<!--                                <button id="btn_limpiar" name="limpiar" class="btn btn-primary center-block">Limpiar</button>-->
                            </div>
                        </div>
                    </form>
                </div>
                <div class="page">
<!--                    Listado Clientes-->
                    <div class="table-responsive">  
                        <table class="table table-condensed table-bordered table-striped cabecera_fija">
                            <thead>
                                <tr>
                                    <th class="col-xs-2">NOMBRE</th>
                                    <th class="col-xs-2">COCHE PRINCIPAL</th>
                                    <th class="col-xs-2">VARIADO</th>
                                    <th class="col-xs-1">TELEFONO 1</th>
                                    <th class="col-xs-1">EMAIL</th>
                                    <th class="col-xs-1">CIUDAD</th>
                                    <th class="col-xs-3">OPCIONES</th>
                                </tr>
                            </thead>
                            <tbody id="listadoClientes">
                                <!--                                <tr>
                                    <td>Antonio Moron Alonso</td>
                                    <td>RR Silver Cloud vin:LSYB222</td>
                                    <td>Bombas de freno</td>
                                    <td>607 151 536</td>
                                    <td>amoron@asemorca.com</td>
                                    <td>Inventada</td>
                                    <td style="text-align: center">
                                        <div class="btn-group center-block">
                                            <button type="button" class="btn-primary btn-sm btn_editar_cliente" title="Editar">
                                                <span class="glyphicon glyphicon-pencil"></span>
                                            </button>
                                            <button type="button" class="btn-primary btn-sm btn_listadoPptosCliente" title="Listado presupuestos">
                                                <span class="glyphicon glyphicon-list-alt"></span>
                                            </button>
                                            <button type="button" class="btn-success btn-sm" id="btn_new_ppto" title="Nuevo presupuesto">
                                                <span class="glyphicon glyphicon-plus"></span>
                                            </button>
                                            <button type="button" class="btn-primary btn-sm btn_listadoPedCliente" title="Listado pedidos">
                                                <span class="glyphicon glyphicon-copy"></span>
                                            </button>
                                            <button type="button" class="btn-danger btn-sm pull-right" title="Eliminar" data-toggle="modal" data-target="#confirm">
                                                <span class="glyphicon glyphicon-trash"></span>
                                            </button>
                                        </div>
                                        
                                    </td>
                                </tr>-->
                            </tbody>
                        </table>
                        <table class="table table-condensed table-bordered table-striped header-fixed"></table>
                    </div>
                </div>
                <div class="page">
<!--                    Listado presupuestos-->
                    <div>
                        <label class="control-label">Presupuestos del cliente: </label>
                            <select id="cliSeleccionadoPpto" onchange="listadoPptos(this.value)">
                            </select>
                        
                    </div>
                    
                    <div class="table-responsive">
                        <table class="table table-condensed table-bordered table-striped cabecera_fija">
                            <thead class='header'>
                                <tr>
                                    <th class="col-xs-1">NUMERO</th>
                                    <th class="col-xs-1">FECHA</th>
                                    <th class="col-xs-2">VEHICULO</th>
                                    <th class="col-xs-1">BASTIDOR</th>
                                    <th class="col-xs-2">CLIENTE</th>
                                    <th class="col-xs-1">TOTAL</th>
                                    <th class="col-xs-1">OPCIONES</th>
                                </tr>
                            </thead>
                            <tbody id="listadoPptos">
                                <!-- <tr>
                                    <td>11074155</td>
                                    <td>2015-11-13</td>
                                    <td>Vehículo</td>
                                    <td>Bastidor</td>
                                    <td>Phillip J Fry</td>
                                    <td>10387.46</td>
                                    <td style="text-align: center">
                                        <div class="btn-group">
                                            <button id="btn_editar_ppto" type="button" class="btn-primary btn-sm" title="Editar">
                                                <span class="glyphicon glyphicon-pencil"></span>
                                            </button>
                                            <button type="button" class="btn-danger btn-sm" title="Eliminar">
                                                <span class="glyphicon glyphicon-trash"></span>
                                            </button>
                                        </div>
                                    </td>
                                </tr> -->
                            </tbody>
                        </table>
                        <table class="table table-condensed table-bordered table-striped header-fixed"></table>
                    </div>
                </div>
                <div class="page">
<!--                    Nuevo ppto-->
                    <form class="form-horizontal" role="form" id="form_newPpto">
                        <fieldset>
                            <legend>Presupuesto</legend>

                            <!-- Input oculto para pasar el id_cliente -->
                            <input type="hidden" name="id_cliente" id="id_cliente">
                            
                            <div class="form-group">
                                <div class="col-xs-1">
                                    <label class="control-label">Fecha</label>
                                </div>
                                <div class="col-xs-2">
                                    <input type="text" name="fecha_newPpto" id="fecha_newPpto" class="form-control">
                                </div>
                                <div class="col-xs-4"></div>
                                <div class="col-xs-2">
                                    <button class="btn btn-primary">Copiar presupuesto</button>
                                </div>
                                <div class="col-xs-3">
                                    <select class="form-control" placeholder="Aquí aparecerán los clientes en una lista" id="selectClientes"></select>
                                </div>
                            </div>
                            <div class="form-group">
                                <div class="col-xs-1">
                                    <label class="control-label">Cliente</label>
                                </div>
                                <div class="col-xs-4">
                                    <input type="text" name="cliente_newPpto" id="cliente_newPpto" class="form-control">
                                </div>
                                <div class="col-xs-1">
                                    <label class="control-label col-xs-1">Vehículo</label>
                                </div>
                                <div class="col-xs-3">
                                    <input type="text" id="vehiculo_newPpto" class="form-control"></input>
                                    <!-- CÓDIGO PARA HACER DROPDOWN DE LOS VEHÍCULOS DEL CLIENTE
                                    En script.js hay que manipular el json para que devuelva además de los
                                    datos del cliente los vehículos del mismo, F(x) nuevoPpto
                                     <select type="text" id="vehiculo_newPpto" class="form-control">
                                      <option class="form-control">Volvo</option>
                                      <option class="form-control">Saab</option>
                                      <option class="form-control">Opel</option>
                                      <option class="form-control">Audi</option>
                                    </select> --> 
                                </div>
                                <div class="col-xs-1">
                                    <label class="control-label col-xs-1">Bastidor</label>
                                </div>
                                <div class="col-xs-2">
                                    <input type="text" id="bastidor_newPpto" class="form-control">
                                </div>
                            </div>
                        </fieldset>
                        <fieldset>
                            <legend>Artículos</legend>    
<!--                            Artículos -->
                            <div id="articulos">
                                <?php  
                                for ($i = 1; $i <= 10; $i++) { ?>
                                    <div class="form-group">
                                        <div class="col-xs-5">
                                            <input type="text" name="descripcion<?php echo $i;?>" class="descripcion form-control" placeholder="Descripcion" onkeyup="getDescripciones()" onblur="getRefPVP(this.value, <?php echo $i;?>)" >
                                        </div>
                                        <div class="col-xs-1">
                                            <input type="text" name="ref<?php echo $i;?>" id="ref<?php echo $i;?>" class="form-control" placeholder="Ref">
                                        </div>
                                        <div class="col-xs-1">
                                            <input type="text" name="precio<?php echo $i;?>" id="precio<?php echo $i;?>" class="form-control" placeholder="Precio">
                                        </div>
                                        <div class="col-xs-1">
                                            <input type="text" name="uds<?php echo $i;?>" id="uds<?php echo $i;?>" class="form-control" placeholder="UDS">
                                        </div>
                                        <div class="col-xs-1">
                                            <input type="text" name="cambio<?php echo $i;?>" id="cambio<?php echo $i;?>" class="form-control" placeholder="Cambio">
                                        </div>
                                        <div class="col-xs-1">
                                            <input type="text" name="pvp<?php echo $i;?>" id="pvp<?php echo $i;?>" class="form-control" placeholder="PVP">
                                        </div>
                                        <div class="col-xs-1">
                                            <input type="text" name="dto<?php echo $i;?>" dto="dto<?php echo $i;?>" class="form-control" placeholder="DTO">
                                        </div>
                                        <div class="col-xs-1">
                                            <input type="text" name="total<?php echo $i;?>" id="total<?php echo $i;?>" class="form-control" placeholder="Total">
                                        </div>
                                    </div>
                                <?php 
                                } ?>
                            </div>    
                                <div id="addArticuloOculto">
                                    <div class="form-group">
                                        <div class="col-xs-4">
                                            <input type="text" name="descripcion[]" class="form-control" placeholder="Descripcion">
                                        </div>
                                        <div class="col-xs-1">
                                            <input type="text" name="ref[]" class="form-control" placeholder="Ref">
                                        </div>
                                        <!-- <div class="col-xs-1">
                                            <input type="text" name="check[]" class="form-control" placeholder="check">
                                        </div> -->
                                        <div class="col-xs-1">
                                            <input type="text" name="precio[]" class="precio form-control" placeholder="Precio">
                                        </div>
                                        <div class="col-xs-1">
                                            <input type="text" name="uds[]" class="form-control" placeholder="UDS">
                                        </div>
                                        <div class="col-xs-1">
                                            <input type="text" name="cambio[]" class="form-control" placeholder="Cambio">
                                        </div>
                                        <div class="col-xs-1">
                                            <input type="text" name="pvp[]" class="form-control" placeholder="PVP">
                                        </div>
                                        <div class="col-xs-1">
                                            <input type="text" name="dto[]" class="form-control" placeholder="DTO">
                                        </div>
                                        <div class="col-xs-1">
                                            <input type="text" name="total[]" class="form-control" placeholder="Total">
                                        </div>
                                    </div>
                                        <div class="col-md-1 pull-right">
                                        <div style="text-align: center" class="btn-group"><button type="button" class="btn-success btn-xs" title="Agregar" id="btn_addArticulo"><span class="glyphicon glyphicon-ok"></span></button><button type="button" class="btn-danger btn-xs" id="btn_cancelArticulo"  title="Cancelar"><span class="glyphicon glyphicon-remove"></span></button></div></div>
                                </div>        
                                    
                            <div class="form-group pull-left">
                                <div class="col-xs-1">
                                    <button class="btn btn-primary" id="addArticulo">Añadir Artículo</button>
                                </div>
                            </div>
                            
                        </fieldset>
                        <fieldset>
                            <legend>Detalles</legend>
                            <div class="row">
                                <div class="col-md-7">
                                    <textarea rows="3" class="form-control" id="asunto_newPpto" placeholder="Asunto"></textarea>
                                </div>
                                <div class="col-md-2">
                                    <div>
                                        <label><input name="canarias_newPpto" id="canarias_newPpto" type="checkbox">Canarias</label>
                                    </div>
                                    <div>
                                        <input type="text" name="transporte_newPpto" class="form-control" id="transporte_newPpto" placeholder="PVP transporte">
                                    </div>
                                    
                                </div>
                                <div class="col-md-3">
                                    <div class="pull-left col-xs-4">
                                        <label>SUBTOTAL:</label>
                                    </div>
                                    <div class="pull-right col-xs-offset-5">
                                        <label class="subtotal"></label>
                                    </div>
                                    <div class="pull-left col-xs-4">
                                        <label>IVA3:</label>
                                    </div>
                                    <div class="pull-right col-xs-offset-5">
                                        <input type="text" name="iva_newPpto" class="iva_newPpto" class="form-control"></input>
                                    </div>
                                    <div class="pull-left col-xs-4">
                                        <label>TOTAL:</label>
                                    </div>
                                    <div class="pull-right col-xs-offset-5">
                                        <label class="total"></label>
                                    </div>
                                </div>
                            </div>
                        </fieldset>
                        <br>
                        
                        <div class="form-group text-center">
                            <div class="btn-group">
                                <button class="btn btn-primary center-block" id="btn_guardar_newPpto" style="background-color: #CFB480">Guardar</button>
                                <button class="btn btn-primary center-block" style="background-color: #7F6538">Imprimir</button>
                                <button class="btn btn-primary center-block" style="background-color: #362B18">Enviar</button>
                                <button class="btn btn-primary center-block" style="background-color: #DBAE18">Copiar en nuevo</button>
                                <button class="btn btn-primary center-block" id="btn_cancelNewPpto" style="background-color: #E81C00">Cancelar</button>   
                            </div>
                            <div class="btn-group pull-right">
                                <button class="btn btn-primary center-block" style="background-color: #FF9717">Generar pedido</button>
                            </div>
                            
                            
                        </div>
                    </form>
                </div>
                <div class="page">
                    <div>
                        <label class="control-label">Pedidos del cliente: </label>
                            <select id="cliSeleccionadoPed" onchange="listar_pedidos(this.value)">
                            </select>
                        
                    </div>

                    <div id="listPed">
                        <!--Listado pedidos-->
                        <!--1ºTRIMESTRE-->
                        <div class="row">
                            <div class="span* table-responsive altura">
                                <table class="table table-condensed table-bordered table-striped">
                                    <thead class='header'>
                                        <tr>
                                            <th>
                                                <div class="row">
                                                    <div class="col-md-2">
                                                      <div class="row">
                                                        <div class="col-xs-3">
                                                          NÚM
                                                        </div>
                                                        <div class="col-xs-5 col-xs-offset-1">
                                                          FECHA
                                                        </div>
                                                        <div class="col-xs-3">
                                                          FRA
                                                        </div>  
                                                      </div>
                                                    </div>
                                                    <div class="col-md-3">
                                                      <div class="row">
                                                        <div class="col-xs-6">
                                                          VEHÍCULO
                                                        </div>  
                                                        <div class="col-xs-6">
                                                          CLIENTE
                                                        </div> 
                                                      </div>
                                                    </div>
                                                    <div class="col-md-3">
                                                      <div class="row">
                                                        <div class="col-xs-2">
                                                          TOTAL
                                                        </div>  
                                                        <div class="col-xs-3">
                                                          OPCIONES
                                                        </div>  
                                                        <div class="col-xs-3">
                                                          FRA ENV
                                                        </div>  
                                                        <div class="col-xs-2">
                                                          INTER.
                                                        </div>
                                                        <div class="col-xs-2">
                                                          RECOG
                                                        </div>  
                                                      </div>
                                                    </div>
                                                    <div class="col-md-3">
                                                      <div class="row">
                                                        <div class="col-xs-2">
                                                          FIANZA
                                                        </div>
                                                        <div class="col-xs-2">
                                                          PAGADO
                                                        </div>
                                                        <div class="col-xs-2">
                                                          CAMBIO
                                                        </div>
                                                        <div class="col-xs-2">
                                                          PÉRDIDAS
                                                        </div>  
                                                        <div class="col-xs-2">
                                                          BENEF.
                                                        </div>
                                                        <div class="col-xs-2">
                                                          ANUL
                                                        </div>  
                                                      </div>
                                                    </div>
                                                    <div class="col-md-1">
                                                      <div class="row">
                                                        <div class="col-xs-12">
                                                          APLICAR
                                                        </div>
                                                      </div>
                                                    </div>
                                                </div>
                                            </th>
                                        </tr>        
                                    </thead>
                                    <tbody id="listadoPedidos1">
                                        
                                        
                                    </tbody>
                                </table>
                            </div>  
                        </div>    

                        <!--Botón de imprimir todas las facturas del trimestre, beneficio trimestre y separador-->
                        <div class="row entreTrimestres">
                            <div class="col-md-1"> 
                                <button type="button" class="btn btn-primary btn-md">Imprimir Fras</button>
                            </div>
                            <div class="col-md-8">
                                <hr/>
                            </div> 
                            <div class="col-md-3"> 
                                <h4>Beneficio Total Trimestre:<span class="label label-success pull-right" id="total_TRI1" style="font-weight: lighter"></span></h4>
                            </div>
                        </div>

                        <!--2ºTRIMESTRE-->
                        <div class="row">    
                            <div class="span* table-responsive altura"> 
                                <table class="table table-condensed table-bordered table-striped">
                                    <thead class='header'>
                                        <tr>
                                            <th>
                                                <div class="row">
                                                    <div class="col-md-2">
                                                      <div class="row">
                                                        <div class="col-xs-3">
                                                          NÚM
                                                        </div>
                                                        <div class="col-xs-5 col-xs-offset-1">
                                                          FECHA
                                                        </div>
                                                        <div class="col-xs-3">
                                                          FRA
                                                        </div>  
                                                      </div>
                                                    </div>
                                                    <div class="col-md-3">
                                                      <div class="row">
                                                        <div class="col-xs-6">
                                                          VEHÍCULO
                                                        </div>  
        <!--                                                    <div class="col-xs-4">
                                                          BASTIDOR
                                                        </div>-->
                                                        <div class="col-xs-6">
                                                          CLIENTE
                                                        </div> 
                                                      </div>
                                                    </div>
                                                    <div class="col-md-3">
                                                      <div class="row">
                                                        <div class="col-xs-2">
                                                          TOTAL
                                                        </div>  
                                                        <div class="col-xs-3">
                                                          OPCIONES
                                                        </div>  
                                                        <div class="col-xs-3">
                                                          FRA ENV
                                                        </div>  
                                                        <div class="col-xs-2">
                                                          INTER.
                                                        </div>
                                                        <div class="col-xs-2">
                                                          RECOG
                                                        </div>  
                                                      </div>
                                                    </div>
                                                    <div class="col-md-3">
                                                      <div class="row">
                                                        <div class="col-xs-2">
                                                          FIANZA
                                                        </div>
                                                        <div class="col-xs-2">
                                                          PAGADO
                                                        </div>
                                                        <div class="col-xs-2">
                                                          CAMBIO
                                                        </div>
                                                        <div class="col-xs-2">
                                                          PÉRDIDAS
                                                        </div>  
                                                        <div class="col-xs-2">
                                                          BENEF.
                                                        </div>
                                                        <div class="col-xs-2">
                                                          ANUL
                                                        </div>  
                                                      </div>
                                                    </div>
                                                    <div class="col-md-1">
                                                      <div class="row">
                                                        <div class="col-xs-12">
                                                          APLICAR
                                                        </div>
                                                      </div>
                                                    </div>
                                                </div>
                                            </th>
                                        </tr>        
                                    </thead>
                                    <tbody id="listadoPedidos2">
                                        
                                    </tbody>
                                </table>   
                            </div>
                        </div>
                        <!--Botón de imprimir todas las facturas del trimestre, beneficio trimestre y separador-->
                        <div class="row entreTrimestres">
                            <div class="col-md-1"> 
                                <button type="button" class="btn btn-primary btn-md">Imprimir Fras</button>
                            </div>
                            <div class="col-md-8">
                                <hr/>
                            </div> 
                            <div class="col-md-3"> 
                                <h4>Beneficio Total Trimestre:<span class="label label-success pull-right" id="total_TRI2" style="font-weight: lighter"></span></h4>
                            </div>
                        </div>

                        <!--3ºTRIMESTRE-->
                        <div class="row">    
                            <div class="span* table-responsive altura"> 
                                <table class="table table-condensed table-bordered table-striped">
                                    <thead class='header'>
                                        <tr>
                                            <th>
                                                <div class="row">
                                                    <div class="col-md-2">
                                                      <div class="row">
                                                        <div class="col-xs-3">
                                                          NÚM
                                                        </div>
                                                        <div class="col-xs-5 col-xs-offset-1">
                                                          FECHA
                                                        </div>
                                                        <div class="col-xs-3">
                                                          FRA
                                                        </div>  
                                                      </div>
                                                    </div>
                                                    <div class="col-md-3">
                                                      <div class="row">
                                                        <div class="col-xs-6">
                                                          VEHÍCULO
                                                        </div>  
        <!--                                                    <div class="col-xs-4">
                                                          BASTIDOR
                                                        </div>-->
                                                        <div class="col-xs-6">
                                                          CLIENTE
                                                        </div> 
                                                      </div>
                                                    </div>
                                                    <div class="col-md-3">
                                                      <div class="row">
                                                        <div class="col-xs-2">
                                                          TOTAL
                                                        </div>  
                                                        <div class="col-xs-3">
                                                          OPCIONES
                                                        </div>  
                                                        <div class="col-xs-3">
                                                          FRA ENV
                                                        </div>  
                                                        <div class="col-xs-2">
                                                          INTER.
                                                        </div>
                                                        <div class="col-xs-2">
                                                          RECOG
                                                        </div>  
                                                      </div>
                                                    </div>
                                                    <div class="col-md-3">
                                                      <div class="row">
                                                        <div class="col-xs-2">
                                                          FIANZA
                                                        </div>
                                                        <div class="col-xs-2">
                                                          PAGADO
                                                        </div>
                                                        <div class="col-xs-2">
                                                          CAMBIO
                                                        </div>
                                                        <div class="col-xs-2">
                                                          PÉRDIDAS
                                                        </div>  
                                                        <div class="col-xs-2">
                                                          BENEF.
                                                        </div>
                                                        <div class="col-xs-2">
                                                          ANUL
                                                        </div>  
                                                      </div>
                                                    </div>
                                                    <div class="col-md-1">
                                                      <div class="row">
                                                        <div class="col-xs-12">
                                                          APLICAR
                                                        </div>
                                                      </div>
                                                    </div>
                                                </div>
                                            </th>
                                        </tr>        
                                    </thead>
                                    <tbody id="listadoPedidos3">
                                        
                                    </tbody>
                                </table>   
                            </div>
                        </div>
                        <!--Botón de imprimir todas las facturas del trimestre, beneficio trimestre y separador-->
                        <div class="row entreTrimestres">
                            <div class="col-md-1"> 
                                <button type="button" class="btn btn-primary btn-md">Imprimir Fras</button>
                            </div>
                            <div class="col-md-8">
                                <hr/>
                            </div> 
                            <div class="col-md-3"> 
                                <h4>Beneficio Total Trimestre:<span class="label label-success pull-right" id="total_TRI3" style="font-weight: lighter"></span></h4>
                            </div>
                        </div>

                        <!--4ºTRIMESTRE-->
                        <div class="row">    
                            <div class="span* table-responsive altura"> 
                                <table class="table table-condensed table-bordered table-striped">
                                    <thead class='header'>
                                        <tr>
                                            <th>
                                                <div class="row">
                                                    <div class="col-md-2">
                                                      <div class="row">
                                                        <div class="col-xs-3">
                                                          NÚM
                                                        </div>
                                                        <div class="col-xs-5 col-xs-offset-1">
                                                          FECHA
                                                        </div>
                                                        <div class="col-xs-3">
                                                          FRA
                                                        </div>  
                                                      </div>
                                                    </div>
                                                    <div class="col-md-3">
                                                      <div class="row">
                                                        <div class="col-xs-6">
                                                          VEHÍCULO
                                                        </div>  
        <!--                                                    <div class="col-xs-4">
                                                          BASTIDOR
                                                        </div>-->
                                                        <div class="col-xs-6">
                                                          CLIENTE
                                                        </div> 
                                                      </div>
                                                    </div>
                                                    <div class="col-md-3">
                                                      <div class="row">
                                                        <div class="col-xs-2">
                                                          TOTAL
                                                        </div>  
                                                        <div class="col-xs-3">
                                                          OPCIONES
                                                        </div>  
                                                        <div class="col-xs-3">
                                                          FRA ENV
                                                        </div>  
                                                        <div class="col-xs-2">
                                                          INTER.
                                                        </div>
                                                        <div class="col-xs-2">
                                                          RECOG
                                                        </div>  
                                                      </div>
                                                    </div>
                                                    <div class="col-md-3">
                                                      <div class="row">
                                                        <div class="col-xs-2">
                                                          FIANZA
                                                        </div>
                                                        <div class="col-xs-2">
                                                          PAGADO
                                                        </div>
                                                        <div class="col-xs-2">
                                                          CAMBIO
                                                        </div>
                                                        <div class="col-xs-2">
                                                          PÉRDIDAS
                                                        </div>  
                                                        <div class="col-xs-2">
                                                          BENEF.
                                                        </div>
                                                        <div class="col-xs-2">
                                                          ANUL
                                                        </div>  
                                                      </div>
                                                    </div>
                                                    <div class="col-md-1">
                                                      <div class="row">
                                                        <div class="col-xs-12">
                                                          APLICAR
                                                        </div>
                                                      </div>
                                                    </div>
                                                </div>
                                            </th>
                                        </tr>        
                                    </thead>
                                    <tbody id="listadoPedidos4">
                                        
                                    </tbody>
                                </table>   
                            </div>
                        </div>
                        <!--Botón de imprimir todas las facturas del trimestre, beneficio trimestre y separador-->
                        <div class="row entreTrimestres">
                            <div class="col-md-1"> 
                                <button type="button" class="btn btn-primary btn-md">Imprimir Fras</button>
                            </div>
                            <div class="col-md-8">
                                <hr/>
                            </div> 
                            <div class="col-md-3"> 
                                <h4>Beneficio Total Trimestre:<span class="label label-success pull-right" id="total_TRI4" style="font-weight: lighter"></span></h4>
                            </div>
                        </div>  
                        
                        <br>
                        <br>
                        <!--OTROS AÑOS-->
                        <div class="row">    
                            <div class="span* table-responsive altura"> 
                                <table class="table table-condensed table-bordered table-striped">
                                    <thead class='header'>
                                        <tr>
                                            <th>
                                                <div class="row">
                                                    <div class="col-md-2">
                                                      <div class="row">
                                                        <div class="col-xs-3">
                                                          NÚM
                                                        </div>
                                                        <div class="col-xs-5 col-xs-offset-1">
                                                          FECHA
                                                        </div>
                                                        <div class="col-xs-3">
                                                          FRA
                                                        </div>  
                                                      </div>
                                                    </div>
                                                    <div class="col-md-3">
                                                      <div class="row">
                                                        <div class="col-xs-6">
                                                          VEHÍCULO
                                                        </div>  
        <!--                                                    <div class="col-xs-4">
                                                          BASTIDOR
                                                        </div>-->
                                                        <div class="col-xs-6">
                                                          CLIENTE
                                                        </div> 
                                                      </div>
                                                    </div>
                                                    <div class="col-md-3">
                                                      <div class="row">
                                                        <div class="col-xs-2">
                                                          TOTAL
                                                        </div>  
                                                        <div class="col-xs-3">
                                                          OPCIONES
                                                        </div>  
                                                        <div class="col-xs-3">
                                                          FRA ENV
                                                        </div>  
                                                        <div class="col-xs-2">
                                                          INTER.
                                                        </div>
                                                        <div class="col-xs-2">
                                                          RECOG
                                                        </div>  
                                                      </div>
                                                    </div>
                                                    <div class="col-md-3">
                                                      <div class="row">
                                                        <div class="col-xs-2">
                                                          FIANZA
                                                        </div>
                                                        <div class="col-xs-2">
                                                          PAGADO
                                                        </div>
                                                        <div class="col-xs-2">
                                                          CAMBIO
                                                        </div>
                                                        <div class="col-xs-2">
                                                          PÉRDIDAS
                                                        </div>  
                                                        <div class="col-xs-2">
                                                          BENEF.
                                                        </div>
                                                        <div class="col-xs-2">
                                                          ANUL
                                                        </div>  
                                                      </div>
                                                    </div>
                                                    <div class="col-md-1">
                                                      <div class="row">
                                                        <div class="col-xs-12">
                                                          APLICAR
                                                        </div>
                                                      </div>
                                                    </div>
                                                </div>
                                            </th>
                                        </tr>        
                                    </thead>
                                    <tbody id="listadoPedTotal">
                                        
                                    </tbody>
                                </table>   
                            </div>
                        </div>
                        
                        
                    </div>
                    <div id="newPed">
                        <form class="form-horizontal" role="form">
                        <fieldset>
                            <legend>Editar pedido</legend>
                            <div class="form-group">
                                <div class="col-xs-1">
                                    <label class="control-label">Cliente</label>
                                </div>
                                <div class="col-xs-3">
                                    <label class="control-label">Nombre del cliente </label>
                                </div>
                                <div class="col-xs-1">
                                    <label class="control-label">Fecha</label>
                                </div>
                                <div class="col-xs-2">
                                    <input type="text" class="form-control">
                                </div>
                                <div class="col-xs-2"></div>
                                <div class="col-xs-2">
                                    <div id="anulacion">
                                        Anular factura
                                        <div id="anulacion2">
                                            <label><input type="checkbox">Parcial</label>
                                            <label><input type="checkbox">Total</label>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-xs-1"></div>
                            </div>
                            
                            <div class="form-group">
                                <div class="col-xs-1">
                                    <label class="control-label">Vehículo</label>
                                </div>
                                <div class="col-xs-3">
                                    <input type="text" class="form-control">
                                </div>
                                <div class="col-xs-1">
                                    <label class="control-label">Bastidor</label>
                                </div>
                                <div class="col-xs-2">
                                    <input type="text" class="form-control">
                                </div>
                            </div>
                            <div class="form-group">
                                <div class="col-xs-1">
                                    <label class="control-label">Factura</label>
                                </div>
                                <div class="col-xs-3">
                                    <input type="text" class="form-control" placeholder="fecha">
                                </div>
                                <div class="col-xs-1">
                                    <label class="control-label">Núm fra</label>
                                </div>
                                <div class="col-xs-2">
                                    <input type="text" class="form-control" placeholder="núm fra">
                                </div>
                            </div>
                        </fieldset>
                        <fieldset>
                            <legend>Artículos</legend>    
<!--                            Artículos-->
                            <div class="form-group" id="articulosPed">
                                <div class="col-xs-3">
                                    <input type="text" class="form-control" placeholder="Descripcion">
                                </div>
                                <div class="col-xs-1">
                                    <input type="text" class="form-control" placeholder="Ref">
                                </div>
                                <div class="col-xs-1">
                                    <input type="text" class="form-control" placeholder="check">
                                </div>
                                <div class="col-xs-1">
                                    <input type="text" class="form-control" placeholder="UDS">
                                </div>
                                <div class="col-xs-1">
                                    <input type="text" class="form-control" placeholder="Precio">
                                </div>
                                <div class="col-xs-1">
                                    <input type="text" class="form-control" placeholder="Cambio">
                                </div>
                                <div class="col-xs-1">
                                    <input type="text" class="form-control" placeholder="PVP">
                                </div>
                                <div class="col-xs-1">
                                    <input type="text" class="form-control" placeholder="DTO">
                                </div>
                                <div class="col-xs-1">
                                    <input type="text" class="form-control" placeholder="Total">
                                </div>
                                <div class="col-xs-1">
                                    <button type="button" class="btn-danger btn-xs" title="Eliminar" data-toggle="modal" data-target="#confirm">
                                        <span class="glyphicon glyphicon-trash"></span>
                                    </button>
                                </div>
                            </div>
                            <div class="articulos form-group">
                                <div class="col-xs-3">
                                    <input type="text" class="form-control" placeholder="Descripcion">
                                </div>
                                <div class="col-xs-1">
                                    <input type="text" class="form-control" placeholder="Ref">
                                </div>
                                <div class="col-xs-1">
                                    <input type="text" class="form-control" placeholder="check">
                                </div>
                                <div class="col-xs-1">
                                    <input type="text" class="form-control" placeholder="UDS">
                                </div>
                                <div class="col-xs-1">
                                    <input type="text" class="form-control" placeholder="Precio">
                                </div>
                                <div class="col-xs-1">
                                    <input type="text" class="form-control" placeholder="Cambio">
                                </div>
                                <div class="col-xs-1">
                                    <input type="text" class="form-control" placeholder="PVP">
                                </div>
                                <div class="col-xs-1">
                                    <input type="text" class="form-control" placeholder="DTO">
                                </div>
                                <div class="col-xs-1">
                                    <input type="text" class="form-control" placeholder="Total">
                                </div>
                                <div class="col-xs-1">
                                    <button type="button" class="btn-danger btn-xs" title="Eliminar" data-toggle="modal" data-target="#confirm">
                                        <span class="glyphicon glyphicon-trash"></span>
                                    </button>
                                </div>
                            </div>

                            
                            
                            <div id="addArticuloOcultoPed">
                                <div class="form-group">
                                    <div class="col-xs-4">
                                        <input type="text" class="form-control" placeholder="Descripcion">
                                    </div>
                                    <div class="col-xs-1">
                                        <input type="text" class="form-control" placeholder="Ref">
                                    </div>
                                    <div class="col-xs-1">
                                        <input type="text" class="form-control" placeholder="check">
                                    </div>
                                    <div class="col-xs-1">
                                        <input type="text" class="form-control" placeholder="UDS">
                                    </div>
                                    <div class="col-xs-1">
                                        <input type="text" class="form-control" placeholder="Precio">
                                    </div>
                                    <div class="col-xs-1">
                                        <input type="text" class="form-control" placeholder="Cambio">
                                    </div>
                                    <div class="col-xs-1">
                                        <input type="text" class="form-control" placeholder="PVP">
                                    </div>
                                    <div class="col-xs-1">
                                        <input type="text" class="form-control" placeholder="DTO">
                                    </div>
                                    <div class="col-xs-1">
                                        <input type="text" class="form-control" placeholder="Total">
                                    </div> 
                                </div>
                                    <div class="col-md-1 pull-right"><div style="text-align: center" class="btn-group"><button type="button" class="btn-success btn-xs" title="Agregar" id="btn_addArticuloPed"><span class="glyphicon glyphicon-ok"></span></button><button type="button" class="btn-danger btn-xs" id="btn_cancelArticuloPed"  title="Cancelar"><span class="glyphicon glyphicon-remove"></span></button></div></div></div>

                            <div class="form-group">
                                <div class="col-xs-1">
                                    <button class="btn btn-primary" id="addArticuloPed">Añadir Artículo</button>
                                </div>
                            </div>
                            

                            <div class="row">
                                <div class="col-md-7">
                                    <textarea rows="3" class="form-control" placeholder="Embalaje y transporte"></textarea>
                                </div>
                                <div class="col-md-2">
                                    <div>
                                        <input type="text" class="form-control" placeholder="PVP transporte">
                                    </div>
                                </div>
                                <div class="col-md-3">
                                    <div class="pull-left col-xs-4">
                                        <label>SUBTOTAL:</label>
                                    </div>
                                    <div class="pull-right col-xs-offset-5">
                                        <label>0.00</label>
                                    </div>
                                    <div class="pull-left col-xs-4">
                                        <label>IVA1:</label>
                                    </div>
                                    <div class="pull-right col-xs-offset-5">
                                        <label>0.00</label>
                                    </div>
                                    <div class="pull-left col-xs-4">
                                        <label>TOTAL:</label>
                                    </div>
                                    <div class="pull-right col-xs-offset-5">
                                        <label>0.00</label>
                                    </div>
                                </div>
                            </div>
                        </fieldset>
                        <br>
                        
                        <div class="form-group text-center">
                            <div class="btn-group">
                                <button class="btn btn-primary center-block">Guardar</button>
                                <button class="btn btn-primary center-block">Imprimir</button>
                                <button class="btn btn-primary center-block">Enviar Proveedor</button>
                                <button class="btn btn-primary center-block">Enviar Cliente</button>
                                <button class="btn btn-primary center-block" id="btn_cancelNewPed">Cancelar</button>
                            </div>
                        </div>
                    </form>
                    </div>
                </div>
                <div class="page">
                    <!--Pedidos anul-->
                    <div class="table-responsive" id="listAnul">
                        <table class="table table-condensed table-bordered table-striped cabecera_fija">
                            <thead class='header'>
                                <tr>
                                    <th class="col-md-1">NUMERO</th>
                                    <th class="col-md-1">FECHA FRA</th>
                                    <th class="col-md-1">NÚM FRA</th>
                                    <th class="col-md-2">VEHICULO</th>
                                    <th class="col-md-2">CLIENTE</th>
                                    <th class="col-md-1">TOTAL</th>
                                    <th class="col-md-1">OPCIONES</th>
                                    <th class="col-md-1">FRA ENVIADA</th>
                                    <th class="col-md-1">TRIMESTRE</th>
                                    <th class="col-md-1">APLICAR</th>
                                </tr>
                            </thead>
                            <tbody>
                                <tr>
                                    <td>11074155</td>
                                    <td>2015-11-13</td>
                                    <td>2345</td>
                                    <td>Bentley 2000</td>
                                    <td>Phillip J Fry</td>
                                    <td>10387.46</td>
                                    <td style="text-align: center">
                                        <div class="btn-group">
                                            <button type="button" class="btn-primary btn-xs" title="Editar" id="btn_editar_anul">
                                                <span class="glyphicon glyphicon-pencil"></span>
                                            </button>
                                            <!-- <button type="button" class="btn-danger btn-xs" title="Eliminar" data-toggle="modal" data-target="#confirm"> -->
                                            <button type="button" class="btn-danger btn-xs" title="Eliminar" onClick="confirmar(6,'esto es ejemplo')">
                                                <span class="glyphicon glyphicon-trash"></span>
                                            </button>
                                        </div>
                                    </td>
                                    <td>
                                        <div style="text-align: center">
                                            <label><input id="checkbox" type="checkbox" value=""></label>
                                        </div>  
                                    </td>
                                    <td>
                                        <div><input type="text" id="input_trimestre"></div>  
                                    </td>
                                    <td>
                                        <div class="col-md-1">
                                            <button type="button" class="btn-primary btn-xs">APLICAR</button>
                                        </div>
                                    </td>
                                  </div>
                                </tr>
                            </tbody>
                        </table>
                        <table class="table table-condensed table-bordered table-striped header-fixed"></table>
                    </div>
                    <div id="editAnul">
                        <form class="form-horizontal" role="form">
                        <fieldset>
                            <legend>Editar anulación</legend>
                            <div class="pull-left col-xs-8">
                                <div class="row">
                                    <div class="col-xs-2">
                                        <label class="control-label">Cliente</label>
                                    </div>
                                    <div class="col-xs-10">
                                        <label class="control-label">Jose Pérez de la Rosa Fernández</label>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-xs-2">
                                        <label class="control-label">CIF</label>
                                    </div>
                                    <div class="col-xs-10">
                                        <label class="control-label">X-123456789</label>
                                    </div>
                                </div>    
                                <div class="row">
                                    <div class="col-xs-2">
                                        <label class="control-label">Dirección</label>
                                    </div>
                                    <div class="col-xs-10">
                                        <label class="control-label">Calle Juan de Juanes s/n. Villanueva de los Castillejos</label>
                                    </div>
                                </div>
                            </div>
                            <div class="col-xs-1"></div>
                            <div class="col-xs-3">
                                <div class="row">
                                    <div class="col-xs-6">
                                        <label class="control-label">Núm Fra</label>
                                    </div>
                                    <div class="col-xs-6">
                                        <input type="text" class="form-control">
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-xs-6">
                                        <label class="control-label">Fecha emisión</label>
                                    </div>
                                    <div class="col-xs-6">
                                        <input type="text" class="form-control">
                                    </div>
                                </div>   
                            </div>   
                        </fieldset>
                            <br>
                        <fieldset>
                            <legend>Artículos</legend>    
<!--                            Artículos-->
                            <div class="form-group" id="articulosAnul">
                                <div class="col-xs-3">
                                    <input type="text" class="form-control" placeholder="Descripcion">
                                </div>
                                <div class="col-xs-1">
                                    <input type="text" class="form-control" placeholder="Ref">
                                </div>
                                <div class="col-xs-1">
                                    <input type="text" class="form-control" placeholder="check">
                                </div>
                                <div class="col-xs-1">
                                    <input type="text" class="form-control" placeholder="UDS">
                                </div>
                                <div class="col-xs-1">
                                    <input type="text" class="form-control" placeholder="Precio">
                                </div>
                                <div class="col-xs-1">
                                    <input type="text" class="form-control" placeholder="Cambio">
                                </div>
                                <div class="col-xs-1">
                                    <input type="text" class="form-control" placeholder="PVP">
                                </div>
                                <div class="col-xs-1">
                                    <input type="text" class="form-control" placeholder="DTO">
                                </div>
                                <div class="col-xs-1">
                                    <input type="text" class="form-control" placeholder="Total">
                                </div>
                                <div class="col-xs-1">
                                    <button type="button" class="btn-danger btn-xs" title="Eliminar" data-toggle="modal" data-target="#confirm">
                                        <span class="glyphicon glyphicon-trash"></span>
                                    </button>
                                </div>
                            </div>
                            <div class="articulos form-group">
                                <div class="col-xs-3">
                                    <input type="text" class="form-control" placeholder="Descripcion">
                                </div>
                                <div class="col-xs-1">
                                    <input type="text" class="form-control" placeholder="Ref">
                                </div>
                                <div class="col-xs-1">
                                    <input type="text" class="form-control" placeholder="check">
                                </div>
                                <div class="col-xs-1">
                                    <input type="text" class="form-control" placeholder="UDS">
                                </div>
                                <div class="col-xs-1">
                                    <input type="text" class="form-control" placeholder="Precio">
                                </div>
                                <div class="col-xs-1">
                                    <input type="text" class="form-control" placeholder="Cambio">
                                </div>
                                <div class="col-xs-1">
                                    <input type="text" class="form-control" placeholder="PVP">
                                </div>
                                <div class="col-xs-1">
                                    <input type="text" class="form-control" placeholder="DTO">
                                </div>
                                <div class="col-xs-1">
                                    <input type="text" class="form-control" placeholder="Total">
                                </div>
                                <div class="col-xs-1">
                                    <button type="button" class="btn-danger btn-xs" title="Eliminar" data-toggle="modal" data-target="#confirm">
                                        <span class="glyphicon glyphicon-trash"></span>
                                    </button>
                                </div>
                            </div>
                            
                            <div id="addArticuloOcultoAnul">
                                <div class="form-group">
                                    <div class="col-xs-4">
                                        <input type="text" class="form-control" placeholder="Descripcion">
                                    </div>
                                    <div class="col-xs-1">
                                        <input type="text" class="form-control" placeholder="Ref">
                                    </div>
                                    <div class="col-xs-1">
                                        <input type="text" class="form-control" placeholder="check">
                                    </div>
                                    <div class="col-xs-1">
                                        <input type="text" class="form-control" placeholder="UDS">
                                    </div>
                                    <div class="col-xs-1">
                                        <input type="text" class="form-control" placeholder="Precio">
                                    </div>
                                    <div class="col-xs-1">
                                        <input type="text" class="form-control" placeholder="Cambio">
                                    </div>
                                    <div class="col-xs-1">
                                        <input type="text" class="form-control" placeholder="PVP">
                                    </div>
                                    <div class="col-xs-1">
                                        <input type="text" class="form-control" placeholder="DTO">
                                    </div>
                                    <div class="col-xs-1">
                                        <input type="text" class="form-control" placeholder="Total">
                                    </div> 
                                </div>
                                    <div class="col-md-1 pull-right"><div style="text-align: center" class="btn-group"><button type="button" class="btn-success btn-xs" title="Agregar" id="btn_addArticuloAnul"><span class="glyphicon glyphicon-ok"></span></button><button type="button" class="btn-danger btn-xs" id="btn_cancelArticuloAnul"  title="Cancelar"><span class="glyphicon glyphicon-remove"></span></button></div></div></div>

                            <div class="form-group">
                                <div class="col-xs-1">
                                    <button class="btn btn-primary" id="addArticuloAnul">Añadir Artículo</button>
                                </div>
                            </div>
                            

                            <div class="row">
                                <div class="col-md-7">
                                    <textarea rows="3" class="form-control" placeholder="Embalaje y transporte"></textarea>
                                </div>
                                <div class="col-md-2">
                                    <div>
                                        <input type="text" class="form-control" placeholder="PVP transporte">
                                    </div>
                                </div>
                                <div class="col-md-3">
                                    <div class="pull-left col-xs-4">
                                        <label>SUBTOTAL:</label>
                                    </div>
                                    <div class="pull-right col-xs-offset-5">
                                        <label>0.00</label>
                                    </div>
                                    <div class="pull-left col-xs-4">
                                        <label>IVA2:</label>
                                    </div>
                                    <div class="pull-right col-xs-offset-5">
                                        <label>0.00</label>
                                    </div>
                                    <div class="pull-left col-xs-4">
                                        <label>TOTAL:</label>
                                    </div>
                                    <div class="pull-right col-xs-offset-5">
                                        <label>0.00</label>
                                    </div>
                                </div>
                            </div>
                        </fieldset>
                        <br>
                        
                        <div class="form-group text-center">
                            <div class="btn-group">
                                <button class="btn btn-primary center-block">Guardar</button>
                                <button class="btn btn-primary center-block">Imprimir</button>
                                <button class="btn btn-primary center-block" id="btn_cancelEditAnul">Cancelar</button>
                            </div>
                        </div>
                    </form>
                    </div>
                </div>
                <div class="page">
<!--                    Base de datos-->
                    <div class="center-block">
                        <button id="addBBDD" name="addBBDD" class="btn btn-primary">Agregar</button>
                    </div> 
                    <form class="form-horizontal form_addBBDD" role="form" id="formBBDD">
                        <div class="form-group">
<!--                            <label class="control-label col-xs-1">Part Number</label>-->
                            <div class="col-md-2">
                                <input type="text" name="partNumber" class="form-control" placeholder="Part Number">
                            </div>
<!--                            <label class="control-label col-xs-1">Title</label>-->
                            <div class="col-md-4">
                                <input type="textarea" name="title" class="form-control" placeholder="Title">
                            </div>
<!--                            <label class="control-label col-xs-1">Título</label>-->
                            <div class="col-md-4">
                                <input type="textarea" name="titulo" class="form-control" placeholder="Título">
                            </div>
                            <!--  <label class="control-label col-xs-1">GBP</label>-->
                            <div class="col-md-1">
                                <input type="text" name="gbp" class="form-control" placeholder="GBP Price">
                            </div>    
                            <div class="col-md-1">
                                <div style="text-align: center" class="btn-group">
                                    <button type="button" class="btn-success btn-xs" id="btn_addBBDD" title="Agregar">
                                        <span class="glyphicon glyphicon-ok"></span>
                                    </button>
                                    <button type="button" class="btn-danger btn-xs" id="cancelar_addBBDD"  title="Cancelar">
                                        <span class="glyphicon glyphicon-remove"></span>
                                    </button>
                                </div>              
                            </div>
                        </div>
                    </form>
                    <div class="table-responsive" style="padding-top: 10px">
                        <table class="table table-condensed table-bordered table-striped cabecera_fija">
                            <thead class='header'>
                                <tr>
                                    <th class="col-md-2">PART NUMBER</th>
                                    <th class="col-md-4">TITLE</th>
                                    <th class="col-md-4">TÍTULO</th>
                                    <th class="col-md-1">GBP PRICE (Exc VAT)</th>
                                    <th class="col-md-1">OPCIONES</th>
                                </tr>
                            </thead>
                            <tbody id="listadoBbdd">
                                <!--                                <tr>
                                    <td>1667CWP</td>
                                    <td>LH FRONT A PILLAR MOULDING (RGHJKDR78)</td>
                                    <td>FARO FRONTAL IZQUIERDO</td>
                                    <td>52,11</td>
                                    <td style="text-align: center">
                                        <div class="btn-group">
                                            <button type="button" class="btn-primary btn-xs" title="Editar">
                                                <span class="glyphicon glyphicon-pencil"></span>
                                            </button>
                                            <button type="button" class="btn-danger btn-xs" title="Eliminar" data-toggle="modal" data-target="#confirm">
                                                <span class="glyphicon glyphicon-trash"></span>
                                            </button>
                                        </div>
                                    </td>
                                </tr>-->
                            </tbody>
                        </table>
                        <table class="table table-condensed table-bordered table-striped header-fixed"></table>
                    </div>
                </div>
                <div class="page">
                    <!--Pérdidas-->
                    <div class="center-block">
                        <button id="addPerdida" name="addPerdida" class="btn btn-primary">Agregar</button>
                    </div> 
                    <form class="form-horizontal form_addPerdida" role="form">
                        <div class="form-group">
<!--                            <label class="control-label col-xs-1">Part Number</label>-->
                            <div class="col-md-2">
                                <input type="text"  id="pedido" class="form-control" placeholder="Nº pedido">
                            </div>
<!--                            <label class="control-label col-xs-1">Title</label>-->
                            <div class="col-md-6">
                                <input type="textarea" id="concepto" class="form-control" placeholder="Concepto">
                            </div>
<!--                            <label class="control-label col-xs-1">Título</label>-->
                            <div class="col-md-1">
                                <input type="textarea" id="coste" class="form-control" placeholder="Coste">
                            </div>
                            <!--  <label class="control-label col-xs-1">GBP</label>-->
                            <div class="col-md-2">
                                <input type="text" id="fecha" class="form-control" placeholder="fecha">
                            </div>    
                            <div class="col-md-1">
                                <div style="text-align: center" class="btn-group">
                                    <button type="button" class="btn-success btn-xs" title="Agregar">
                                        <span class="glyphicon glyphicon-ok"></span>
                                    </button>
                                    <button type="button" class="btn-danger btn-xs" id="cancelar_addPerdida"  title="Cancelar">
                                        <span class="glyphicon glyphicon-remove"></span>
                                    </button>
                                </div>              
                            </div>
                        </div>
                    </form>
                    <div class="table-responsive" style="padding-top: 10px">
                        <table class="table table-condensed table-bordered table-striped cabecera_fija">
                            <thead class='header'>
                                <tr>
                                    <th class="col-md-2">PEDIDO</th>
                                    <th class="col-md-6">CONCEPTO</th>
                                    <th class="col-md-1">COSTE</th>
                                    <th class="col-md-1">FECHA</th>
                                    <th class="col-md-1">OPCIONES</th>
                                </tr>
                            </thead>
                            <tbody>
                                <tr>
                                    <td>1667</td>
                                    <td>LH FRONT A PILLAR MOULDING (RGHJKDR78)</td>
                                    <td>52,11</td>
                                    <td>11/11/15</td>
                                    <td style="text-align: center">
                                        <div class="btn-group">
                                            <button type="button" class="btn-primary btn-xs" title="Editar">
                                                <span class="glyphicon glyphicon-pencil"></span>
                                            </button>
                                            <button type="button" class="btn-danger btn-xs" title="Eliminar" onClick="confirmar(9,'esto es ejemplo')">
                                                <span class="glyphicon glyphicon-trash"></span>
                                            </button>
                                        </div>
                                    </td>
                                </tr>
                            </tbody>
                        </table>
                        <table class="table table-condensed table-bordered table-striped header-fixed"></table>
                    </div>
                </div>
            </div>
            
            <!--Modal de confirmación-->
            <!-- <div class="modal fade" id="confirm" tabindex="-1" role="dialog">
                <div class="modal-dialog modal-sm">  
                  <div class="modal-content">
                    <div class="modal-header">
                      <h4 class="modal-title">Eliminar</h4>
                    </div>
                    <div class="modal-body">
                      ¿Seguro?
                    </div>
                    <div class="modal-footer">
                      <button type="button" class="btn btn-default" data-dismiss="modal">Cancelar</button>
                      <button type="button" class="btn btn-danger">Eliminar</button>
                    </div>
                  </div>
                </div>
            </div> -->


            <div id="confirm2" title="Eliminar" style="display: none">
              <p><span class="ui-icon ui-icon-alert" style="float:left; margin:0 7px 20px 0;"></span>No se podrá recuperar. <br>¿Estás seguro?</p>
            </div>
        </main>  
        
    </body>
    
    <script>
        $("#fecha_newPpto").datepicker();
        $("#fecha_newPpto").datepicker("option", "dateFormat", "dd/mm/yy");
    </script>
    
</html>

  