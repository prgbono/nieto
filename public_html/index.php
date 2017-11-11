<!DOCTYPE html>
<html>
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <meta http-equiv="Content-Type" content="text/html; charset=UTF-8" />
        <link href="css/style.css" rel="stylesheet" type="text/css"/> 
        <link href="http://code.jquery.com/ui/1.10.2/themes/smoothness/jquery-ui.css" rel="Stylesheet"></link>
        <script src="js/jquery-1.11.2.min.js"></script>
        <script src="js/jquery.numeric.js"></script>
        <script src="js/jquery-ui.min.js"></script>
        <link href="css/bootstrap.min.css" rel="stylesheet" media="screen">
        <script src="js/bootstrap.min.js"></script>
        <script src="js/fastclick.js" type="text/javascript"></script>
        <script src="js/script.js"></script>
        
        <script src="tinymce/tinymce.min.js"></script>
        <!-- <script type="text/javascript" src="tinymce/jquery.tinymce.min.js"></script>-->
        <script>
            tinymce.init({selector:'#message-text'});
            tinymce.init({selector:'#message-textGenerarPedido'});
        </script> 
    </head>
    <body>
        <header>
            <div class="menu">
                <div class="col activo" style="background-color: #CFB480; cursor: pointer"> 
                    Nuevo Cliente
                </div>
                <div class="col" style="background-color: #7F6538; cursor: pointer">
                    Listado Clientes
                </div>
                <div class="col"  style="background-color: #362B18; cursor: pointer">
                    Listado Presupuestos
                </div>
                <div class="col" style="background-color: #DBAE18; cursor: pointer">
                    Nuevo Presupuesto
                </div>
                <div class="col" style="background-color: #FF9717; cursor: pointer">
                    Listado Pedidos
                </div>
                <div class="col" style="background-color: #E85900; cursor: pointer">
                    Pedidos anul.
                </div>
                <div class="col" style="background-color: #3A3C42; cursor: pointer">
                    Base de datos
                </div>
                <div class="col" style="background-color: #E81C00; cursor: pointer">
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
                                    <input type="text" class="form-control" name="input_nombre" id="input_nombre" placeholder="Nombre cliente" onblur="validar_nuevo_cliente();">
                                </div>
                            </div>
                            
<!--                            ipputs de Coches-->
                            <div id="coches">
<!--                            Coche ppal-->                        
                                <div class="form-group">
                                    <label class="control-label col-xs-1">Coche principal</label>
                                    <div class="col-xs-7">
                                        <input type="text" name="coche0" id="input_coche0" class="form-control" placeholder="Modelo" onblur="validar_nuevo_cliente();">
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
                            <div class="center-block">
                                <button class="btn btn-primary btn-sm left" id="addCoche">Añadir Coche</button>
                            </div> 
                            
<!--                        form para el caso de añadir otro coche-->
                            <div id="addCocheOculto"><div class="form-group"><label class="control-label col-xs-1">Coche</label><div class="col-xs-7"><input type="text" name="input_modeloNew" id="input_modeloNew" class="form-control" placeholder="Modelo"></div><div class="col-xs-3"><input type="text" name="input_basNew" id="input_basNew" class="form-control" placeholder="Bastidor"></div><div class="col-xs-1"><input type="text" name="anioNew" id="anioNew" class="form-control" placeholder="Año"></div></div><div class="col-md-1 pull-right"><div style="text-align: center" class="btn-group"><button type="button" class="btn-success btn-xs" title="Agregar coche" id="btn_addCoche"><span class="glyphicon glyphicon-ok"></span></button><button type="button" class="btn-danger btn-xs" id="btn_cancel_coche"  title="Cancelar"><span class="glyphicon glyphicon-remove"></span></button></div></div>
                            </div>    
                            <br />
                            <div class="form-group">
                                <label class="control-label col-xs-1">Variado</label>
                                <div class="col-xs-11">
                                    <textarea name="input_variado" rows="3" class="form-control" id="input_variado" placeholder="Variado"></textarea>
                                </div>
                            </div>

                            <div class="form-group">
                                <label class="control-label col-xs-1">Tlf</label>
                                <div class="col-xs-2">
                                    <input type="text" name="input_tlf1" id="input_tlf1" class="form-control" placeholder="Tlf principal" onblur="validar_nuevo_cliente();">
                                </div>
                                <label class="control-label col-xs-1">Email</label>
                                <div class="col-xs-4">
                                    <div class="input-group">
                                        <span class="input-group-addon">@</span>
                                        <input type="text" name="input_email1" id="input_email1" class="form-control" placeholder="Email 1" onblur="validar_nuevo_cliente();">
                                    </div>
                                </div>
                                <label class="control-label col-xs-1">Ciudad</label>
                                <div class="col-xs-3">
                                    <input type="text" name="input_ciudad" id="input_ciudad" class="form-control" placeholder="Ciudad" onblur="validar_nuevo_cliente();">
                                </div>
                            </div>
                        </fieldset>
                        <br>
                        <fieldset>
                            <legend>Dirección de envío</legend>
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
                                    <th class="col-xs-3">NOMBRE</th>
                                    <th class="col-xs-2">COCHE PRINCIPAL</th>
                                    <th class="col-xs-2">VARIADO</th>
                                    <th class="col-xs-1">TELEFONO 1</th>
                                    <th class="col-xs-1">EMAIL</th>
                                    <!-- <th class="col-xs-1">CIUDAD</th> -->
                                    <th class="col-xs-3">OPCIONES</th>
                                </tr>
                            </thead>
                            <tbody id="listadoClientes">

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
                                    <th class="col-xs-3">CLIENTE</th>
                                    <th class="col-xs-2">VEHICULO</th>
                                    <!-- <th class="col-xs-2">VEHICULO</th>
                                    <th class="col-xs-1">BASTIDOR</th>
                                    <th class="col-xs-2">CLIENTE</th> -->
                                    <th class="col-xs-1">TOTAL</th>
                                    <th class="col-xs-1">OPCIONES</th>
                                </tr>
                            </thead>
                            <tbody id="listadoPptos">
                                
                            </tbody>
                        </table>
                        <table class="table table-condensed table-bordered table-striped header-fixed"></table>
                    </div>
                </div>
                <div class="page">
<!--                    Nuevo ppto-->
                    <form class="form-horizontal" role="form" id="form_newPpto" action="codigo/nuevoPpto.php" method="POST">
                        <fieldset>
                            <legend>Presupuesto</legend>
                            <!-- Inputs oculto para pasar el id_cliente y el id_ppto-->
                            <input type="hidden" name="id_cliente" id="id_cliente">
                            <input type="hidden" name="id_ppto" id="id_ppto">
                            <input type="hidden" name="mailText" id="mailText">
                            <input type="hidden" name="mailTextGenerarPedido" id="mailTextGenerarPedido">
                            <input type="hidden" name="vehCopiarPpto" id="vehCopiarPpto">
                            <input type="hidden" name="clienteCopiarPpto" id="clienteCopiarPpto">
                            <input type="hidden" name="cliente_address" id="cliente_address">
                            <input type="hidden" name="proveedor_address" id="proveedor_address">

                            
                            <div class="form-group">
                                <div class="col-xs-1">
                                    <label class="control-label">Fecha</label>
                                </div>
                                <div class="col-xs-2">
                                    <input type="text" name="fecha_newPpto" id="fecha_newPpto" class="form-control">
                                </div>
                                <div class="col-xs-4"></div>
                                <div class="col-xs-2">
                                    <button class="btn btn-primary" id="copiar_presupuesto">Copiar presupuesto</button>
                                </div>
                                <div class="col-xs-3">
                                    <select class="form-control" placeholder="Selecciona cliente..." id="selectClientes"></select>
                                </div>
                            </div>
                            <div class="form-group">
                                <div class="col-xs-1">
                                    <label class="control-label">Cliente</label>
                                </div>
                                <div class="col-xs-4">
                                    <select name="cliente_newPpto" id="cliente_newPpto" class="form-control" onchange="getVehiculos(this.value)">
                                    </select>
                                </div>
                                <div class="col-xs-1">
                                    <label class="control-label col-xs-1">Vehículo</label>
                                </div>
                                <div class="col-xs-3">
                                    <select name="vehiculo_newPpto" id="vehiculo_newPpto" class="form-control" onchange="getBastidor(this.value)">
                                    </select>
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
                            <div id="cabecera">
                                <div class="form-group">
                                    <div class="col-xs-5">
                                        <label class="header">DESCRIPCIÓN</label>
                                    </div>
                                    <div class="col-xs-1">
                                        <label class="header">REF</label>                          
                                    </div>
                                    <div class="col-xs-1">
                                        <label class="header">PRECIO</label>
                                    </div>
                                    <div class="col-xs-1">
                                        <label class="header">UDS</label>
                                    </div>
                                    <div class="col-xs-1">
                                        <label class="header">CAMBIO</label>
                                    </div>
                                    <div class="col-xs-1">
                                        <label class="header">PVP</label>
                                    </div>
                                    <div class="col-xs-1">
                                        <label class="header">DTO(%)</label>
                                    </div>
                                    <div class="col-xs-1">
                                        <label class="header">TOTAL</label>
                                    </div>
                                </div>
                            </div>
<!--                            Artículos -->
                            <div id="articulos">
                                <?php  
                                for ($i = 0; $i <= 9; $i++) { ?>
                                    <div class="form-group">
                                        <div class="col-xs-5">
                                            <input type="text" name="descripcion[]" id="descripcion<?php echo $i;?>" class="descripcion form-control" placeholder="Descripcion" onkeyup="getDescripciones(<?php echo $i;?>)" onblur="getRefPVP(this.value, <?php echo $i;?>)" >
                                        </div>
                                        <div class="col-xs-1">
                                            <input type="text" name="ref[]" id="ref<?php echo $i;?>" class="form-control" placeholder="Ref" readonly>
                                        </div>
                                        <div class="col-xs-1">
                                            <input type="text" name="precio[]" id="precio<?php echo $i;?>" class="form-control" placeholder="Precio" onblur="calcularPVP(this.value, <?php echo $i;?>); calcularTotal(this.value, <?php echo $i;?>); calcularSubtotal();">
                                        </div>
                                        <div class="col-xs-1">
                                            <input type="text" name="uds[]" id="uds<?php echo $i;?>" onblur="calcularTotal(this.value, <?php echo $i;?>); calcularSubtotal();" class="form-control" placeholder="UDS">
                                        </div>
                                        <div class="col-xs-1">
                                            <input type="text" name="cambio[]" id="cambio<?php echo $i;?>" onblur="calcularPVP(this.value, <?php echo $i;?>); calcularTotal(this.value, <?php echo $i;?>); calcularSubtotal();" class="form-control" placeholder="Cambio">
                                        </div>
                                        <div class="col-xs-1">
                                            <input type="text" name="pvp[]" id="pvp<?php echo $i;?>" onblur="calcularTotal(this.value, <?php echo $i;?>); calcularSubtotal();" class="form-control" placeholder="PVP">
                                        </div>
                                        <div class="col-xs-1">
                                            <input type="text" name="dto[]" id="dto<?php echo $i;?>" onblur="calcularTotal(this.value, <?php echo $i;?>); calcularSubtotal();" class="form-control" placeholder="DTO">
                                        </div>
                                        <div class="col-xs-1">
                                            <input type="number" name="total[]" id="total<?php echo $i;?>" class="form-control" placeholder="Total" readonly>
                                        </div>
                                    </div>
                                <?php 
                                } ?>
                                    
                            </div>    
                                <!-- <div id="addArticuloOculto">
                                    <div class="form-group">
                                        <div class="col-xs-4">
                                            <input type="text" name="descripcion[]" class="form-control" placeholder="Descripcion">
                                        </div>
                                        <div class="col-xs-1">
                                            <input type="text" name="ref[]" class="form-control" placeholder="Ref">
                                        </div>
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
                            </div>--> 
                            
                        </fieldset>
                        <fieldset>
                            <legend>Detalles</legend>
                            <div class="row">
                                <div class="col-md-7">
                                    <textarea rows="3" class="form-control" name="asunto_newPpto" id="asunto_newPpto" placeholder="Comentarios / Embalaje y transoporte"></textarea>
                                </div>
                                <div class="col-md-2">
                                    <div>
                                        <label><input type="checkbox" name="canarias_newPpto" id="canarias_newPpto" type="checkbox">Canarias</label>
                                    </div>
                                    <div>
                                        <label><input type="checkbox" name="inter_newPpto" id="inter_newPpto" type="checkbox">INTER</label>
                                    </div>
                                    <div>
                                        <input type="text" name="transporte_newPpto" class="form-control" id="transporte_newPpto" placeholder="PVP transporte" onblur="calcularSubtotal()">
                                    </div>
                                    
                                </div>
                                <div class="col-md-3">
                                        <div class="pull-left col-xs-7 col-sm-7 col-md-7 col-lg-7 sep">
                                            <label>SUBTOTAL:</label>
                                        </div>
                                        <div class="pull-right col-xs-5 col-sm-5 col-md-5 col-lg-5">
                                            <input name="subtotal" id="subtotal" class="form-control" readonly>
                                        </div>
                                        <div class="pull-left col-xs-7 col-sm-7 col-md-7 col-lg-7 sep">
                                            <label>IVA(%):</label>
                                        </div>
                                        <div class="pull-right col-xs-5 col-sm-5 col-md-5 col-lg-5">
                                            <label><input type="text" name="iva_newPpto" id="iva_newPpto" class="form-control" placeholder="21" onblur="calcularTotalTotal($('#subtotal').val())"></label>
                                        </div>
                                        <div class="pull-left col-xs-7 col-sm-7 col-md-7 col-lg-7 sep">
                                            <label>TOTAL:</label>
                                        </div>
                                        <div class="pull-right col-xs-5 col-sm-5 col-md-5 col-lg-5">
                                            <input name="totalTotal" id="totalTotal" class="form-control" readonly>
                                        </div>
                                </div>
                            </div>
                        </fieldset>
                        <br>
                        
                        <div class="form-group text-center">
                            <div class="btn-group">
                                <button class="btn btn-primary center-block" id="btn_guardar_newPpto" style="background-color: #CFB480">Guardar</button>
                                <button class="btn btn-primary center-block" id="btn_imprimir" style="background-color: #7F6538">Imprimir</button>
                                <button class="btn btn-primary center-block" id="btn_enviar" style="background-color: #362B18" data-toggle="modal" data-target="#mailModal">Enviar</button>
                                <button class="btn btn-primary center-block" id="btn_copiar_en_nuevo" style="background-color: #DBAE18">Copiar en nuevo</button>
                                <!--<button class="btn btn-primary center-block" id="btn_cancelNewPpto" style="background-color: #E81C00">Cancelar</button>   -->
                            </div>
                            <div class="btn-group pull-right">
                                <button class="btn btn-primary center-block" id="btn_generarPedido" style="background-color: #FF9717" data-toggle="modal" data-target="#mailModalGenerarPedido">Generar pedido</button>
                            </div>
                            
                            
                        </div>
                    </form>
                </div>
                <div class="page">
                    <!-- Apartado Listado de Pedidos, desplegable de clientes. DAvid me dijo que sobraba estando arriba el buscador
                    <div>
                        <label class="control-label">Pedidos del cliente: </label>
                            <select id="cliSeleccionadoPed" onchange="listar_pedidos(this.value)">
                            </select>
                    </div>-->

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
                                    <label class="control-label" id="cliente_ped">Nombre del cliente </label>
                                    <!-- <input type="text" class="form-control"> -->
                                </div>
                                <div class="col-xs-1">
                                    <label class="control-label">Fecha</label>
                                </div>
                                <div class="col-xs-2">
                                    <input type="text" class="form-control" id="fecha_ped" readonly>
                                </div>
                                <div class="col-xs-2"></div>
                                <div class="col-xs-2">
                                    <!-- <div id="anulacion"> -->
                                    <div>
                                        Anulaciones / Pérdidas
                                        <!-- <div id="anulacion2"> -->
                                        <div>
                                            <button class="btn btn-primary" id="btn_anular">Anular</button>
                                            <button class="btn btn-primary" id="btn_perdida">Pérdida</button>
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
                                    <input type="text" class="form-control" id="vehiculo_ped" readonly>
                                </div>
                                <div class="col-xs-1">
                                    <label class="control-label">Bastidor</label>
                                </div>
                                <div class="col-xs-2">
                                    <input type="text" class="form-control" id="bas_ped" readonly>
                                </div>
                            </div>
                            <div class="form-group">
                                <div class="col-xs-1">
                                    <label class="control-label">Factura</label>
                                </div>
                                <div class="col-xs-3">
                                    <input type="text" class="form-control" placeholder="fecha" id="fra_ped" readonly>
                                </div>
                                <div class="col-xs-1">
                                    <label class="control-label">Núm fra</label>
                                </div>
                                <div class="col-xs-2">
                                    <input type="text" class="form-control" placeholder="núm fra" id="nfra_ped" readonly>
                                    <!-- <input type="hidden" name="id_ppto_en_ped" id="id_ppto_en_ped"> -->
                                    <input type="hidden" class="form-control" id="id_ppto_en_ped" readonly>
                                </div>
                            </div>
                        </fieldset>

                        <fieldset>
                            <legend>Artículos</legend>  
                            <div class="form-group" id="articulosPed">
                                <?php  
                                for ($i = 0; $i <= 9; $i++) { ?>
                                    <div class="form-group">
                                        <div class="col-xs-4">
                                            <input type="text" name="descripcionPed[]" id="descripcionPed<?php echo $i;?>" class="descripcion form-control" placeholder="Descripcion" readonly>
                                        </div>
                                        <div class="col-xs-2">
                                            <input type="text" name="refPed[]" id="refPed<?php echo $i;?>" class="form-control" placeholder="Ref" readonly>
                                        </div>
                                        <div class="col-xs-1">
                                            <input type="text" name="precioPed[]" id="precioPed<?php echo $i;?>" class="form-control" placeholder="Precio" readonly>
                                        </div>
                                        <div class="col-xs-1">
                                            <input type="text" name="udsPed[]" id="udsPed<?php echo $i;?>" class="form-control" placeholder="UDS" readonly>
                                        </div>
                                        <div class="col-xs-1">
                                            <input type="text" name="cambioPed[]" id="cambioPed<?php echo $i;?>" class="form-control" placeholder="Cambio" readonly>
                                        </div>
                                        <div class="col-xs-1">
                                            <input type="text" name="pvpPed[]" id="pvpPed<?php echo $i;?>" class="form-control" placeholder="PVP" readonly>
                                        </div>
                                        <div class="col-xs-1">
                                            <input type="text" name="dtoPed[]" id="dtoPed<?php echo $i;?>" class="form-control" placeholder="DTO" readonly>
                                        </div>
                                        <div class="col-xs-1">
                                            <input type="text" name="totalPed[]" id="totalPed<?php echo $i;?>" class="form-control" placeholder="Total" readonly>
                                        </div>
                                        <!-- <div class="col-xs-1">
                                            <button type="button" class="btn-danger btn-xs" title="Eliminar" data-toggle="modal" data-target="#confirm">
                                                <span class="glyphicon glyphicon-trash"></span>
                                            </button>
                                        </div> -->
                                    </div>
                                <?php 
                                } ?>
                                    
                            </div>        

                            <div class="row">
                                <div class="col-md-7">
                                    <textarea rows="3" class="form-control" placeholder="Embalaje y transporte" id="eyt_ped" readonly></textarea>
                                </div>
                                <div class="col-md-2">
                                    <div>
                                        <input type="text" class="form-control" id="pvptrans_ped" placeholder="PVP transporte" readonly>
                                    </div>
                                </div>
                                <div class="col-md-3">
                                    <div class="pull-left col-xs-4">
                                        <label>SUBTOTAL:</label>
                                    </div>
                                    <div class="pull-right col-xs-offset-5">
                                        <label id="subtotal_ped">0.00</label>
                                    </div>
                                    <div class="pull-left col-xs-4">
                                        <label>IVA:</label>
                                    </div>
                                    <div class="pull-right col-xs-offset-5">
                                        <label id="iva_ped">0.00</label>
                                    </div>
                                    <div class="pull-left col-xs-4">
                                        <label>TOTAL:</label>
                                    </div>
                                    <div class="pull-right col-xs-offset-5">
                                        <label id="total_ped">0.00</label>
                                    </div>
                                </div>
                            </div>
                        </fieldset>
                        <br>
                        
                        <div class="form-group text-center">
                            <div class="btn-group">
                                <!-- <button class="btn btn-primary center-block">Guardar</button>
                                <button class="btn btn-primary center-block">Imprimir</button>
                                <button class="btn btn-primary center-block">Enviar Proveedor</button>
                                <button class="btn btn-primary center-block">Enviar Cliente</button> -->
                                <button class="btn btn-primary center-block" id="btn_cancelNewPed">Volver al listado de pedidos</button>
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
                            <tbody id='listadoAnulaciones'>
                                <!-- <tr>
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
                                </tr> -->
                            </tbody>
                        </table>
                        <table class="table table-condensed table-bordered table-striped header-fixed"></table>
                    </div>

                    <div id="editAnul">
                        <form class="form-horizontal" role="form" id="form_anul" method="POST">
                        <fieldset>
                            <legend>Anulación</legend>
                            
                            <div class="form-group">
                                <div class="col-xs-1">
                                    <label class="control-label">Fecha</label>
                                </div>
                                <div class="col-xs-2">
                                    <input type="text" name="fecha_anul" id="fecha_anul" class="form-control" readonly>
                                </div>
                                <div class="col-xs-1">
                                    <label class="control-label">Cliente</label>
                                </div>
                                <div class="col-xs-4">
                                    <input name="cliente_anul" id="cliente_anul" class="form-control" readonly>
                                </div>
                                <div class="col-xs-1">
                                    <label class="control-label col-xs-1">Vehículo</label>
                                </div>
                                <div class="col-xs-3">
                                    <input name="vehiculo_anul" id="vehiculo_anul" class="form-control" readonly>
                                </div>
                                <!-- <div class="col-xs-1">
                                    <label class="control-label col-xs-1">Bastidor</label>
                                </div>
                                <div class="col-xs-2">
                                    <input type="text" id="bastidor_anul" class="form-control">
                                </div> -->
                            </div>
                        </fieldset>
                        <fieldset>
                            <legend>Artículos</legend>    
                            <div id="cabecera">
                                <div class="form-group">
                                    <div class="col-xs-4">
                                        <label class="header">DESCRIPCIÓN</label>
                                    </div>
                                    <div class="col-xs-1">
                                        <label class="header">REF</label>                          
                                    </div>
                                    <div class="col-xs-1">
                                        <label class="header">PRECIO</label>
                                    </div>
                                    <div class="col-xs-1">
                                        <label class="header">UDS</label>
                                    </div>
                                    <div class="col-xs-1">
                                        <label class="header">CAMBIO</label>
                                    </div>
                                    <div class="col-xs-1">
                                        <label class="header">PVP</label>
                                    </div>
                                    <div class="col-xs-1">
                                        <label class="header">DTO(%)</label>
                                    </div>
                                    <div class="col-xs-1">
                                        <label class="header">TOTAL</label>
                                    </div>
                                    <div class="col-xs-1">
                                        <label class="header">ANULAR</label>
                                    </div>
                                </div>
                            </div>
<!--                            Artículos -->
                            <div id="articulos_anul">
                                <?php  
                                for ($i = 0; $i <= 9; $i++) { ?>
                                    <div class="form-group">
                                        <div class="col-xs-4">
                                            <input type="text" name="descripcion_anul[]" id="descripcion_anul<?php echo $i;?>" class="descripcion form-control" readonly>
                                        </div>
                                        <div class="col-xs-1">
                                            <input type="text" name="ref_anul[]" id="ref_anul<?php echo $i;?>" class="form-control" readonly>
                                        </div>
                                        <div class="col-xs-1">
                                            <input type="text" name="precio_anul[]" id="precio_anul<?php echo $i;?>" class="form-control" readonly>
                                        </div>
                                        <div class="col-xs-1">
                                            <input type="text" name="uds_anul[]" id="uds_anul<?php echo $i;?>" class="form-control" readonly>
                                        </div>
                                        <div class="col-xs-1">
                                            <input type="text" name="cambio_anul[]" id="cambio_anul<?php echo $i;?>" class="form-control" readonly>
                                        </div>
                                        <div class="col-xs-1">
                                            <input type="text" name="pvp_anul[]" id="pvp_anul<?php echo $i;?>" class="form-control" readonly>
                                        </div>
                                        <div class="col-xs-1">
                                            <input type="text" name="dto_anul[]" id="dto_anul<?php echo $i;?>" class="form-control" readonly>
                                        </div>
                                        <div class="col-xs-1">
                                            <input type="number" name="total_anul[]" id="total_anul<?php echo $i;?>" class="form-control" readonly>
                                        </div>
                                        <div class="col-xs-1" style="text-align: center">
                                            <input type="checkbox" name="check_anul[]" id="check_anul<?php echo $i;?>" onClick="checkAnular(<?php echo $i;?>)">
                                        </div>
                                    </div>
                                <?php 
                                } ?>
                                    
                            </div>    
                        </fieldset>
                        <!-- <fieldset>
                            <legend>Detalles</legend>
                            <div class="row">
                                <div class="col-md-7">
                                    <textarea rows="3" class="form-control" name="asunto_newPpto" id="asunto_newPpto" placeholder="Comentarios / Embalaje y transoporte"></textarea>
                                </div>
                                <div class="col-md-2">
                                    <div>
                                        <label><input type="checkbox" name="canarias_newPpto" id="canarias_newPpto" type="checkbox">Canarias</label>
                                    </div>
                                    <div>
                                        <input type="text" name="transporte_newPpto" class="form-control" id="transporte_newPpto" placeholder="PVP transporte" onblur="calcularSubtotal()">
                                    </div>
                                    
                                </div>
                                <div class="col-md-3">
                                        <div class="pull-left col-xs-7 col-sm-7 col-md-7 col-lg-7 sep">
                                            <label>SUBTOTAL:</label>
                                        </div>
                                        <div class="pull-right col-xs-5 col-sm-5 col-md-5 col-lg-5">
                                            <input name="subtotal" id="subtotal" class="form-control" readonly>
                                        </div>
                                        <div class="pull-left col-xs-7 col-sm-7 col-md-7 col-lg-7 sep">
                                            <label>IVA(%):</label>
                                        </div>
                                        <div class="pull-right col-xs-5 col-sm-5 col-md-5 col-lg-5">
                                            <label><input type="text" name="iva_newPpto" id="iva_newPpto" class="form-control" placeholder="21" onblur="calcularTotalTotal($('#subtotal').val())"></label>
                                        </div>
                                        <div class="pull-left col-xs-7 col-sm-7 col-md-7 col-lg-7 sep">
                                            <label>TOTAL:</label>
                                        </div>
                                        <div class="pull-right col-xs-5 col-sm-5 col-md-5 col-lg-5">
                                            <input name="totalTotal" id="totalTotal" class="form-control" readonly>
                                        </div>
                                </div>
                            </div>
                        </fieldset> -->
                        <fieldset> 
                            <div class="row">
                                <div class="col-md-7">
                                    <textarea rows="3" class="form-control" placeholder="Embalaje y transporte" id="eyt_anul" readonly></textarea>
                                </div>
                                <div class="col-md-2">
                                    <div>
                                        <input type="text" class="form-control" id="pvptrans_anul" placeholder="PVP transporte" readonly>
                                    </div>
                                </div>
                                <div class="col-md-3">
                                    <div class="pull-left col-xs-4">
                                        <label>SUBTOTAL:</label>
                                    </div>
                                    <div class="pull-right col-xs-offset-5">
                                        <label id="subtotal_anul">0.00</label>
                                    </div>
                                    <div class="pull-left col-xs-4">
                                        <label>IVA:</label>
                                    </div>
                                    <div class="pull-right col-xs-offset-5">
                                        <label id="iva_anul">0.00</label>
                                    </div>
                                    <div class="pull-left col-xs-4">
                                        <label>TOTAL:</label>
                                    </div>
                                    <div class="pull-right col-xs-offset-5">
                                        <label id="totaltotal_anul">0.00</label>
                                    </div>
                                </div>
                            </div>
                        </fieldset> 
                        <br>
                        
                        <div class="form-group text-center">
                            <div class="btn-group">
                                <button class="btn btn-primary center-block" id="btn_cancelAnul">Volver al listado de anulaciones</button>
                            </div>
                        </div>
                        </form>
                    </div>

                    <!-- <div id="editAnul">
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
                                        <input type="text" class="form-control" placeholder="Cuál es este form?">
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
                    </div>-->
                </div> 
                <div class="page">
<!--                    Base de datos-->
                    <!-- Con opciones de Edición
                    <div class="row center-block">
                        <div class="col-md-1">
                            <button id="addBBDD" name="addBBDD" class="btn btn-primary">Agregar</button>
                        </div>
                        <div class="col-md-11">
                            <form enctype="multipart/form-data" name="excel" id="excel" method="post" action="codigo/actualizarBBDD.php">
                                <div class="row">
                                    <div class="col-md-11">
                                        <input type="file" name="CSVdoc" class="pull-right">
                                    </div>
                                    <div class="col-md-1">
                                        <button id="excelBBDD" class="btn btn-primary">Actualizar</button>
                                    </div>
                                </div>
                            </form>
                        </div>
                    </div>  -->
                    <!-- Sin opciones de Edición -->
                    <div class="row center-block">
                        <div>
                            <form enctype="multipart/form-data" name="excel" id="excel" method="post" action="codigo/actualizarBBDD.php">
                                <div class="row">
                                    <div class="col-md-11">
                                        <input type="file" name="CSVdoc" class="pull-right">
                                    </div>
                                    <div class="col-md-1">
                                        <button id="excelBBDD" class="btn btn-primary">Actualizar</button>
                                    </div>
                                </div>
                            </form>
                        </div>
                    </div> 
                    <!-- Con opciones de edición
                    <form class="form-horizontal form_addBBDD" role="form" id="formBBDD">
                        <div class="form-group">
                            <div class="col-md-2">
                                <input type="text" id="partNumber" name="partNumber" class="form-control" placeholder="Part Number">
                            </div>
                            <div class="col-md-4">
                                <input type="textarea" id="title" name="title" class="form-control" placeholder="Title">
                            </div>
                            <div class="col-md-4">
                                <input type="textarea" id="titulo" name="titulo" class="form-control" placeholder="Título">
                            </div>
                            <div class="col-md-1">
                                <input type="text" name="gbp" id="gbp" class="form-control" placeholder="GBP Price">
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
                    </form> -->
                    <!-- Sin opciones de edición -->
                    <form class="form-horizontal form_addBBDD" role="form" id="formBBDD">
                        <div class="form-group">
                            <div class="col-md-1">
                                <input type="text" id="partNumber" name="partNumber" class="form-control" placeholder="Part Number">
                            </div>
                            <div class="col-md-5">
                                <input type="textarea" id="title" name="title" class="form-control" placeholder="Title">
                            </div>
                            <div class="col-md-5">
                                <input type="textarea" id="titulo" name="titulo" class="form-control" placeholder="Título">
                            </div>
                            <div class="col-md-1">
                                <input type="text" name="gbp" id="gbp" class="form-control" placeholder="GBP Price">
                            </div>    
                        </div>
                    </form>
                    <div class="table-responsive" style="padding-top: 10px">
                        <table class="table table-condensed table-bordered table-striped cabecera_fija">
                            <thead class='header'>
                                <tr>
                                    <!-- <th class="col-md-2">PART NUMBER</th>
                                    <th class="col-md-4">TITLE</th>
                                    <th class="col-md-4">TÍTULO</th>
                                    <th class="col-md-1">GBP PRICE (Exc VAT)</th>
                                    <th class="col-md-1">OPCIONES</th> -->
                                    <th class="col-md-1">PART NUMBER</th>
                                    <th class="col-md-5">TITLE</th>
                                    <th class="col-md-5">TÍTULO</th>
                                    <th class="col-md-1">GBP PRICE (Exc VAT)</th>
                                </tr>
                            </thead>
                            <tbody id="listadoBbdd">
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
                    <form class="form-horizontal form_addPerdida" role="form" id="form_addPerdida">
                        <div class="form-group">
                            <div class="col-md-2">
                                <input type="text"  id="pedido" name="pedido" class="form-control" placeholder="Nº pedido">
                            </div>
                            <div class="col-md-6">
                                <input type="textarea" id="concepto" name="concepto" class="form-control" placeholder="Concepto">
                            </div>
                            <div class="col-md-1">
                                <input type="textarea" id="coste" name="coste" class="form-control" placeholder="Coste">
                            </div>
                            <div class="col-md-2">
                                <input type="text" id="fecha" name="fecha" class="form-control" placeholder="fecha">
                            </div>    
                            <div class="col-md-1">
                                <div style="text-align: center" class="btn-group">
                                    <button type="button" class="btn-success btn-xs" id="insertar_perdida" title="Agregar">
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
                            <tbody id="listadoPerdidas">
                            </tbody>
                        </table>
                        <table class="table table-condensed table-bordered table-striped header-fixed"></table>
                    </div>
                </div>
            </div>

            <div id="confirm2" title="Eliminar" style="display: none">
              <p><span class="ui-icon ui-icon-alert" style="float:left; margin:0 7px 20px 0;"></span>No se podrá recuperar. <br>¿Estás seguro?</p>
            </div>
            <div id="confirm3" title="Pedido modificado" style="display: none">
              <p><span class="ui-icon ui-icon-info" style="float:left; margin:0 7px 20px 0;"></span>Cambios aplicados</p>
            </div>

            <!-- Modal -->
            <div class="modal fade" id="mailModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" style="display: none">
              <div class="modal-dialog" role="document">
                <div class="modal-content">
                  <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                    <h4 class="modal-title" id="exampleModalLabel">Correo electrónico a cliente</h4>
                  </div>
                  <div class="modal-body">
                    <form>
                      <div class="form-group">
                        <label for="mail-address" class="control-label">Dirección email:</label>
                        <input name="mail" id="mail" class="form-control">
                        <label for="message-text" class="control-label" style="margin-top:10px">Mensaje:</label>
                        <textarea class="form-control" id="message-text" name="message-text" style="height: 10em"></textarea>
                      </div>
                      <p>* Se adjuntará el documento PDF del presupuesto</p>
                    </form>
                  </div>
                  <div class="modal-footer" target="_blank">
                    <button type="button" class="btn btn-default" data-dismiss="modal">Cancelar</button>
                    <button type="button" class="btn btn-primary" id="enviarCorreo">Enviar correo</button>
                  </div>
                </div>
              </div>
            </div>

            <!-- Modal Generar Pedido-->
            <div class="modal fade" id="mailModalGenerarPedido" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" style="display: none">
              <div class="modal-dialog" role="document">
                <div class="modal-content">
                  <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                    <h4 class="modal-title" id="exampleModalLabelGenerarPedido">Correo electrónico a proveedor</h4>
                  </div>
                  <div class="modal-body">
                    <form>
                      <div class="form-group">
                        <label for="mail-proveedor-address" class="control-label">Dirección email:</label>
                        <input name="mail-proveedor" id="mail-proveedor" class="form-control">
                        <label for="message-texttextGenerarPedido" class="control-label" style="margin-top:10px">Mensaje:</label>
                        <textarea class="form-control" id="message-textGenerarPedido" name="message-textGenerarPedido" style="height: 10em"></textarea>
                      </div>
                      <p>* Irá incluído en el correo la tabla de artículos</p>
                    </form>
                  </div>
                  <div class="modal-footer" target="_blank">
                    <button type="button" class="btn btn-default" data-dismiss="modal">Cancelar</button>
                    <button type="button" class="btn btn-primary" id="enviarCorreoGenerarPedido">Enviar correo</button>
                  </div>
                </div>
              </div>
            </div>
        </main>  
        
    </body>
    
    <!-- <script>
        $("#fecha_newPpto").datepicker();
        $("#fecha_newPpto").datepicker("option", "dateFormat", "dd/mm/yy");
    </script> -->
    
</html>

  