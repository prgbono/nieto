$(document).ready(main);
  
//Vbles globales
//URL's
//LOCALHOST
//var url = "http://localhost:8888/nietoBack/";
//rios.esy.es
var url = "http://www.rios.esy.es/nietoBack/";
//
//PRODUCCIÓN

var pantalla = 1;
var id_cliente = 0;
var id_coches = [];
var id_direcciones = [];
var contenedor;
var posXinicial; //posición inicial al hacer touch
var submenu = document.getElementsByClassName('col');


function main(){
    navegacion();
    setEvents();
}    


function setEvents(){
    $("#addBBDD").on("click", addBBDD);
    $("#cancelar_addBBDD").on("click", hideBBDD);
    $("#addPerdida").on("click", addPerdida);
    $("#cancelar_addPerdida").on("click", hidePerdida);
    $("#addCoche").on("click", mostrarAddCoche);
    $("#addArticulo").on("click", mostrarAddArticulo);
    $("#addArticuloPed").on("click", mostrarAddArticuloPed);
    $("#btn_addCoche").on("click", addCoche);
    $("#btn_addArticulo").on("click", addArticulo);
    $("#btn_addArticuloPed").on("click", addArticuloPed);
    $("#btn_cancel_coche").on("click", cancelAddCoche);
    $(".btn_editar_cliente").on("click", nuevoCliente);
    $("#btn_cancelArticulo").on("click", cancelAddArticulo);
    $("#btn_cancelArticuloPed").on("click", cancelAddArticuloPed);
    $("#btn_new_ppto").on("click", nuevoPpto);
    $("#btn_editar_ppto").on("click", editarPpto);
    $("#btn_editar_pedido").on("click", editarPedido);
    $("#btn_cancelNewPed").on("click", cancelNewPed);
//    $("#btn_limpiar").on("click", resetFormNuevoCliente);
    $(".btn_listadoPptosCliente").on("click", listadoPptos(id_cliente));
    $(".btn_listadoPedCliente").on("click", listadoPed(id_cliente));
    $("#btn_cancelNewPpto").on("click", listadoPptos(id_cliente));
    $("#btn_editar_anul").on("click", editarAnul);
    $("#btn_cancelEditAnul").on("click", cancelEditAnul);
    $("#btn_addArticuloAnul").on("click", addArticuloAnul);
    $("#btn_cancelArticuloAnul").on("click", cancelAddArticuloAnul);
    $("#addArticuloAnul").on("click", mostrarAddArticuloAnul);
    $(".buscadores").hide();
    $("#guardar_cliente1").on("click", altaCliente);
    $("#guardar_cliente2").on("click", altaCliente);
    $("#btn_addBBDD").on("click", agregarBBDD);
    $("#btn_guardar_newPpto").on("click", insertar_nuevoPpto);    
    //$(".descripcion").on("blur", getRefPVP);
    
}



function addBBDD(){
    $(".form_addBBDD").show();
}

function addPerdida(){
    $(".form_addPerdida").show();
}

function hideBBDD(){
    $(".form_addBBDD").hide();
}


function hidePerdida(){
    $(".form_addPerdida").hide();
}

function mostrarAddCoche(){
    event.preventDefault();
    $("#addCocheOculto").show();
}

function mostrarAddArticulo(){
    event.preventDefault();
    $("#addArticuloOculto").show();
}

function mostrarAddArticuloPed(){
    event.preventDefault();
    $("#addArticuloOcultoPed").show();
}

function mostrarAddArticuloAnul(){
    event.preventDefault();
    $("#addArticuloOcultoAnul").show();
}


function addCoche(){
    //Si se pulsa el tic de añadir coche
    $("#coches").append('<div class="form-group"><label class="control-label col-xs-1">Coche</label><div class="col-xs-7"><input type="text" class="form-control" placeholder="Modelo"></div><div class="col-xs-3"><input type="text" class="form-control" placeholder="Bastidor"></div><div class="col-xs-1"><input type="text" class="form-control" placeholder="Año"></div></div>');
    $("#addCocheOculto").hide();
}

function cancelAddCoche(){
    $("#addCocheOculto").hide();
}

function addArticulo(){
    $("#articulos").append('<div class="col-xs-3"><input type="text" class="form-control" placeholder="Descripcion"></div><div class="col-xs-1"><input type="text" class="form-control" placeholder="Ref"></div><div class="col-xs-1"><input type="text" class="form-control" placeholder="check"></div><div class="col-xs-1"><input type="text" class="form-control" placeholder="UDS"></div><div class="col-xs-1"><input type="text" class="form-control" placeholder="Precio"></div><div class="col-xs-1"><input type="text" class="form-control" placeholder="Cambio"></div><div class="col-xs-1"><input type="text" class="form-control" placeholder="PVP"></div><div class="col-xs-1"><input type="text" class="form-control" placeholder="DTO"></div><div class="col-xs-1"><input type="text" class="form-control" placeholder="Total"></div><div class="col-xs-1"><button type="button" class="btn-danger btn-sm" title="Eliminar" onClick="confirmar(3,'+cliente.id_cliente+')"><span class="glyphicon glyphicon-trash"></span></button></div></div>');
    $("#addArticuloOculto").hide();
}

function addArticuloPed(){
    $("#articulosPed").append('<div class="col-xs-3"><input type="text" class="form-control" placeholder="Descripcion"></div><div class="col-xs-1"><input type="text" class="form-control" placeholder="Ref"></div><div class="col-xs-1"><input type="text" class="form-control" placeholder="check"></div><div class="col-xs-1"><input type="text" class="form-control" placeholder="UDS"></div><div class="col-xs-1"><input type="text" class="form-control" placeholder="Precio"></div><div class="col-xs-1"><input type="text" class="form-control" placeholder="Cambio"></div><div class="col-xs-1"><input type="text" class="form-control" placeholder="PVP"></div><div class="col-xs-1"><input type="text" class="form-control" placeholder="DTO"></div><div class="col-xs-1"><input type="text" class="form-control" placeholder="Total"></div><div class="col-xs-1"><button type="button" class="btn-danger btn-xs" title="Eliminar" onClick="confirmar(5,'+cliente.id_cliente+')"><span class="glyphicon glyphicon-trash"></span></button></div></div>');
    $("#addArticuloOcultoPed").hide();
}

function addArticuloAnul(){
    $("#articulosAnul").append('<div class="col-xs-3"><input type="text" class="form-control" placeholder="Descripcion"></div><div class="col-xs-1"><input type="text" class="form-control" placeholder="Ref"></div><div class="col-xs-1"><input type="text" class="form-control" placeholder="check"></div><div class="col-xs-1"><input type="text" class="form-control" placeholder="UDS"></div><div class="col-xs-1"><input type="text" class="form-control" placeholder="Precio"></div><div class="col-xs-1"><input type="text" class="form-control" placeholder="Cambio"></div><div class="col-xs-1"><input type="text" class="form-control" placeholder="PVP"></div><div class="col-xs-1"><input type="text" class="form-control" placeholder="DTO"></div><div class="col-xs-1"><input type="text" class="form-control" placeholder="Total"></div><div class="col-xs-1"><button type="button" class="btn-danger btn-xs" title="Eliminar" onClick="confirmar(7,'+cliente.id_cliente+')"><span class="glyphicon glyphicon-trash"></span></button></div></div>');
    $("#addArticuloOcultoAnul").hide();
}

function cancelAddArticulo(){
    $("#addArticuloOculto").hide();
}

function cancelAddArticuloPed(){
    $("#addArticuloOcultoPed").hide();
}

function cancelAddArticuloAnul(){
    $("#addArticuloOcultoAnul").hide();
}


function nuevoCliente(){
    //console.log("En nuevoCliente");
    contenedor.style.left = "0";
    $(".buscadores").hide();
    submenu[0].className="col activo";
    submenu[1].className="col";
    submenu[2].className="col";
    submenu[3].className="col";
    submenu[4].className="col";
    submenu[5].className="col";
    submenu[6].className="col";
    submenu[7].className="col";
//    ocultarNewPed();
}


function nuevoPpto(cliente){
    id_cliente = cliente;
    contenedor.style.left = "-300%";
    $(".buscadores").hide();
    submenu[0].className="col";
    submenu[1].className="col";
    submenu[2].className="col";
    submenu[3].className="col activo";
    submenu[4].className="col";
    submenu[5].className="col";
    submenu[6].className="col";
    submenu[7].className="col";
    if (!(cliente === undefined || cliente === null)) {
        //console.log("Aquí viene de listado: "+cliente);
        var urlDatosCliente = url.concat('datosCliente.php');
        $.ajax({
            url: urlDatosCliente,
            type: 'GET',
            data: {cliente: cliente},
            dataType: 'json',
            success:function(json){
                var now = new Date();
                var today = now.getDate()  + '-' + (now.getMonth() + 1) + '-' + now.getFullYear();
                $('#fecha_newPpto').val(today);
                $('#cliente_newPpto').val(json.nombre);
                $('#vehiculo_newPpto').val(json.modelo);
                $('#bastidor_newPpto').val(json.bastidor);

                /*id_cliente seleccionado para pasarlo a nuevo presupuesto. Btn '+'*/
                $('#id_cliente').val(cliente);
            }
        });
    }
    
//    ocultarNewPed();
}

//Hay qye traerse a esta función los datos del presupuesto seleccionado, de momento es igual que la función anterior
function editarPpto(){
//    console.log('editarPresupuesto');
    contenedor.style.left = "-300%";
    $(".buscadores").show();
    submenu[0].className="col";
    submenu[1].className="col";
    submenu[2].className="col";
    submenu[3].className="col activo";
    submenu[4].className="col";
    submenu[5].className="col";
    submenu[6].className="col";
    submenu[7].className="col";
//    ocultarNewPed();
}

function listadoPptos(cliente){
    contenedor.style.left = "-200%";
    $(".buscadores").show();
    submenu[0].className="col";
    submenu[1].className="col";
    submenu[2].className="col activo";
    submenu[3].className="col";
    submenu[4].className="col";
    submenu[5].className="col";
    submenu[6].className="col";
    submenu[7].className="col";
//    ocultarNewPed();
    //alert('En listadoPptos. cliente: '+cliente);
    //console.log('valor del parámetro cliente en la f(x) listadoPptos: ', cliente);
    listar_pptos(cliente);
    
}

function listadoPed(cliente){
    contenedor.style.left = "-400%";
    $(".buscadores").show();
    submenu[0].className="col";
    submenu[1].className="col";
    submenu[2].className="col";
    submenu[3].className="col";
    submenu[4].className="col activo";
    submenu[5].className="col";
    submenu[6].className="col";
    submenu[7].className="col";
//    ocultarNewPed();
    //console.log('En listadoPed, cliente: ', cliente);
    listar_pedidos(cliente);
}

function mostrarNewPed(){
    $("#listPed").hide();
    $("#newPed").show();
}

function ocultarNewPed(){
    $("#listPed").show();
    $("#newPed").hide();
}

function mostrarEditAnul(){
    $("#listAnul").hide();
    $("#editAnul").show();
}

function ocultarEditAnul(){
    $("#listAnul").show();
    $("#editAnul").hide();
}
    

function editarPedido(){
    mostrarNewPed();
}

function editarAnul(){
    mostrarEditAnul();
}

function cancelNewPed(){
    event.preventDefault();
    ocultarNewPed();
}

function cancelEditAnul(){
    event.preventDefault();
    ocultarEditAnul();
}

//function resetFormNuevoCliente(){
//    event.preventDefault();
//    $("#form_nuevo_cliente")[0].reset();    
//}

function listar_clientes(){
    var urlListarClientes = url.concat('listarClientes.php');
    var tablaClientes = '';
    $.getJSON(urlListarClientes, function(json){
        $.each(json.Clientes, function(i, cliente){
        //Meter el JSON en la tabla de 'listado Clientes'
           /*tablaClientes += '<tr><td>' + cliente.nombre + '</td><td>' + cliente.coche + '</td><td>' + cliente.variado + '</td><td>' + cliente.tlf1 + '</td><td>' + cliente.email + '</td><td>' + cliente.ciudad + '</td><td style="text-align: center"><div class="btn-group center-block"><button type="button" class="btn-primary btn-sm btn_editar_cliente" onClick="editarCliente('+cliente.id_cliente+')" title="Editar"><span class="glyphicon glyphicon-pencil"></span></button><button type="button" class="btn-primary btn-sm btn_listadoPptosCliente" onClick="listadoPptos('+cliente.id_cliente+')" title="Listado presupuestos"><span class="glyphicon glyphicon-list-alt"></span></button><button type="button" class="btn-success btn-sm" id="btn_new_ppto" onClick="nuevoPpto('+cliente.id_cliente+')" title="Nuevo presupuesto"><span class="glyphicon glyphicon-plus"></span></button><button type="button" class="btn-primary btn-sm btn_listadoPedCliente" onClick="listadoPed('+cliente.id_cliente+')" title="Listado pedidos"><span class="glyphicon glyphicon-copy"></span></button><button type="button" class="btn-danger btn-sm pull-right" title="Eliminar" onClick="confirmar(1,'+cliente.id_cliente+')"><span class="glyphicon glyphicon-trash"></span></button></div></td></tr>';*/

           tablaClientes += '<tr><td>' + cliente.nombre + '</td><td>' + cliente.coche + '</td><td>' + cliente.variado + '</td><td>' + cliente.tlf1 + '</td><td>' + cliente.email + '</td><td>' + cliente.ciudad + '</td><td style="text-align: center"><div class="btn-group center-block"><button type="button" class="btn-primary btn-sm btn_editar_cliente" onClick="editarCliente('+cliente.id_cliente+')" title="Editar"><span class="glyphicon glyphicon-pencil"></span></button><button type="button" class="btn-primary btn-sm btn_listadoPptosCliente" onClick="listadoPptos('+cliente.id_cliente+')" title="Listado presupuestos"><span class="glyphicon glyphicon-list-alt"></span></button><button type="button" class="btn-success btn-sm" id="btn_new_ppto" onClick="nuevoPpto('+cliente.id_cliente+')" title="Nuevo presupuesto"><span class="glyphicon glyphicon-plus"></span></button><button type="button" class="btn-primary btn-sm btn_listadoPedCliente" onClick="listadoPed('+cliente.id_cliente+')" title="Listado pedidos"><span class="glyphicon glyphicon-copy"></span></button><button type="button" class="btn-danger btn-sm pull-right" title="Eliminar" onClick="confirmar(1,'+cliente.id_cliente+')"><span class="glyphicon glyphicon-trash"></span></button></div></td></tr>';
        });
        $('#listadoClientes').html(tablaClientes);
    });  
}

function editarCliente (cliente){
    //console.log('cliente.id_cliente:' + cliente);
    id_cliente = cliente;
    nuevoCliente();
    //Cambiarle el texto al botón de guardar por actualizar y cargar datos
    $('#guardar_cliente1').text('Actualizar');
    $('#guardar_cliente2').text('Actualizar');
    
    //Traerse los datos, coches y direcciones del cliente con id cliente y cargarlos en la interfaz (3 Ajax)
    var urlDatosCliente = url.concat('datosCliente.php');
    $.ajax({
        url: urlDatosCliente,
        type: 'GET',
        data: {cliente: cliente},
        dataType: 'json',
        success:function(json){
            $('#input_nombre').val(json.nombre);
            $('#input_variado').val(json.variado);
            $('#input_tlf1').val(json.tlf1);
            $('#input_email1').val(json.email);
            $('#envio_nombre').val(json.nombre);
            $('#fact_nombre').val(json.nombre);
            //meter el id_cliente (cliente) en vble global para pasarlo por ajax a actualizarCliente
        }
    });
    
    var urlCochesCliente = url.concat('cochesCliente.php');
    $.ajax({
        url: urlCochesCliente,
        type: 'GET',
        data: {cliente: cliente},
        dataType: 'json',
        success:function(json){
            //Comprobar que venga algún coche o no. Si vienen más de 3 coches tengo que añadir a partir del 4to al div 'coches'
            //console.log('Tamaño JSON: '+ Object.keys(json.Coches).length);
            var cochesHtml = '';
            $.each(json.Coches, function(i, coche){
                cochesHtml += '<div class="form-group"><label class="control-label col-xs-1">Coche principal</label><div class="col-xs-7"><input type="text" name="coche'+i+'" id="input_coche'+i+'" class="form-control" value="'+coche.modelo+'"></div><div class="col-xs-3"><input type="text" name="bas'+i+'" id="input_bas'+i+'" class="form-control" value="'+coche.bastidor+'"></div><div class="col-xs-1"><input type="text" name="anio'+i+'" id="input_anio'+i+'" class="form-control" value="'+coche.anio+'"></div></div>';
                //meter el id_coche en array vble global para pasarlo por ajax a actualizarCliente
                id_coches.push(coche.id_coche);
            });
            $('#coches').html(cochesHtml);
        }
    });
    
    var urlDireccionesCliente = url.concat('direccionesCliente.php');
    console.log('En direcciones cliente, cliente: ', cliente);
    $.ajax({
        url: urlDireccionesCliente,
        type: 'GET',
        data: {cliente: cliente},
        dataType: 'json',
        success:function(json){
            $.each(json.Direcciones, function(i, direccion){
                //meter el id_dirección en array vble global para pasarlo por ajax a actualizarCliente
                if (direccion.E_F === 'E'){
                    //console.log('En E');
                    $('#envio_calle').val(direccion.calle);
                    $('#envioCP').val(direccion.cp);
                    $('#envio_ciudad').val(direccion.ciudad);
                }
                else{
                    //console.log('En F');
                    $('#fact_calle').val(direccion.calle);
                    $('#factCP').val(direccion.cp);
                    $('#factNIF').val(direccion.nif);
                    $('#fact_ciudad').val(direccion.ciudad);
                }
                id_direcciones.push(direccion.id_direccion);
            });
        }
    });
    
}

//Autocompletar en buscador, en cada cambio del texto del buscador
function autocomplet() {
    //console.log('En autocomplet: '+pantalla);
    var urlPantalla='';
    var min = 2; // min caracteres para buscar
    var keyword = $('#client_id').val();
    switch (pantalla) {    
        case 1:
            break;
        case 2:
            urlPantalla = url.concat('autocompletar.php');
            if (keyword.length >= min) {
                    $.ajax({
                        url: urlPantalla,
                        type: 'POST',
                        data: {keyword: keyword},
                        dataType: 'json',
                        success:function(json){
                            var tablaClientes = '';
                            $.each(json.Clientes, function(i, cliente){
                                tablaClientes += '<tr><td>' + cliente.nombre + '</td><td>' + cliente.coche + '</td><td>' + cliente.variado + '</td><td>' + cliente.tlf1 + '</td><td>' + cliente.email + '</td><td>' + cliente.ciudad + '</td><td style="text-align: center"><div class="btn-group center-block"><button type="button" class="btn-primary btn-sm btn_editar_cliente" onClick="editarCliente('+cliente.id_cliente+')" title="Editar"><span class="glyphicon glyphicon-pencil"></span></button><button type="button" class="btn-primary btn-sm btn_listadoPptosCliente" onClick="listadoPptos('+cliente.id_cliente+')" title="Listado presupuestos"><span class="glyphicon glyphicon-list-alt"></span></button><button type="button" class="btn-success btn-sm" id="btn_new_ppto" onClick="nuevoPpto('+cliente.id_cliente+')" title="Nuevo presupuesto"><span class="glyphicon glyphicon-plus"></span></button><button type="button" class="btn-primary btn-sm btn_listadoPedCliente" onClick="listadoPed('+cliente.id_cliente+')" title="Listado pedidos"><span class="glyphicon glyphicon-copy"></span></button><button type="button" class="btn-danger btn-sm pull-right" title="Eliminar" onClick="confirmar(1,'+cliente.id_cliente+')"><span class="glyphicon glyphicon-trash"></span></button></div></td></tr>';
                                });
                            $('#listadoClientes').html(tablaClientes);
                        }
                    });
            }
            break;
            
        case 3:
            urlPantalla = url.concat('listarPresupuestos.php');
            if (keyword.length >= min) {
                $.ajax({
                    url: urlPantalla,
                    type: 'POST',
                    data: {keyword: keyword},
                    dataType: 'json',
                    success:function(json){
                        console.log ('En el success del jason de listar Presupuestos, url', urlPantalla);
                        var tablaPptos = '';
                        $.each(json.Presupuestos, function(i, ppto){
                            tablaPptos += '<tr><td>'+ppto.id_ppto+'</td><td>'+ppto.fecha+'</td><td>'+ppto.id_coche+'</td><td>'+ppto.id_coche+'</td><td>'+ppto.id_cliente+'</td><td>'+ppto.total+'</td><td style="text-align: center"><div class="btn-group"><button id="btn_editar_ppto" type="button" class="btn-primary btn-sm" title="Editar"><span class="glyphicon glyphicon-pencil"></span></button><button type="button" class="btn-danger btn-sm" title="Eliminar" onClick="confirmar(2,'+ppto.id_ppto+','+ppto.id_cliente+')"><span class="glyphicon glyphicon-trash"></span></button></div></td></tr>';
                        });
                        $('#listadoPptos').html(tablaPptos);
                    }
                });
            }
            break;
            
        case 4:
            //alert('En pantalla = 4');
            break;
        case 5:
            urlPantalla = url.concat('listarPedidos.php');
            if (keyword.length >= min) {
                $.ajax({
                    url: urlPantalla,
                    type: 'POST',
                    data: {keyword: keyword},
                    dataType: 'json',
                    success:function(json){
                        var tablaPedidos1 = '';
                        var tablaPedidos2 = '';
                        var tablaPedidos3 = '';
                        var tablaPedidos4 = '';
                        var tablaPedTotal = '';
                        var total=0;
                        $.each(json.Pedidos[0], function(i, ped){
            //Meter el JSON en la tabla de 'listado Pedidos'       
            tablaPedidos1 += '<tr><td><div class="row"><div class="col-md-2"><div class="row"><div class="col-xs-3">'+ped.id_pedido+'</div><div class="col-xs-5 col-xs-offset-1">'+ped.fecha+'</div><div class="col-xs-3">'+ped.id_fra+'</div></div></div><div class="col-md-3"><div class="row"><div class="col-xs-6">'+ped.id_coche+'</div><div class="col-xs-6">'+ped.id_cliente+'</div></div></div><div class="col-md-3"><div class="row"><div class="col-xs-2">'+ped.total+'</div><div class="col-xs-4"><div style="text-align: center" class="btn-group"><button id="btn_editar_pedido" onClick="editarPedido()" type="button" class="btn-primary btn-xs" title="Editar"><span class="glyphicon glyphicon-pencil"></span></button><button type="button" class="btn-danger btn-xs" title="Eliminar" onClick="confirmar(4,'+ped.id_pedido+','+ped.id_cliente+')"><span class="glyphicon glyphicon-trash"></span></button></div></div><div class="col-xs-2"><div><label><input type="checkbox" value="'+ped.inter+'"></label></div></div><div class="col-xs-2"><input type="text" value="'+ped.inter+'"id="inter"></div><div class="col-xs-2"><input type="text" value="'+ped.recog+'" id="recog"></div></div></div><div class="col-md-3"><div class="row"><div class="col-xs-2"><input type="text" value="'+ped.fianza+'" id="fianza"></div><div class="col-xs-2"><input type="text" value="'+ped.pagado+'" id="pagado"></div><div class="col-xs-2"><input type="text"  value="'+ped.cambio+'" id="cambio"></div><div class="col-xs-2"><input type="text" value="1" id="pe"></div><div class="col-xs-2"><input type="text" value="'+ped.beneficio+'" id="benef"></div><div class="col-xs-2"><input type="text" value="'+ped.anul+'" id="anul"></div></div></div><div class="col-md-1"><div class="row"><div class="col-xs-12"><button type="button" class="btn-primary btn-xs">APLICAR</button></div></div></div></div></td></tr>';
            total+=parseInt(ped.total);
        });
                        $('#total_TRI1').text(total +' €');
                        $('#listadoPedidos1').html(tablaPedidos1);
        
                        //PEDIDOS 2do TRIMESTRE
                        total=0;
                        $.each(json.Pedidos[1], function(i, ped){
                        //Meter el JSON en la tabla de 'listado Presupuestos'       
                            tablaPedidos2 += '<tr><td><div class="row"><div class="col-md-2"><div class="row"><div class="col-xs-3">'+ped.id_pedido+'</div><div class="col-xs-5 col-xs-offset-1">'+ped.fecha+'</div><div class="col-xs-3">'+ped.id_fra+'</div></div></div><div class="col-md-3"><div class="row"><div class="col-xs-6">'+ped.id_coche+'</div><div class="col-xs-6">'+ped.id_cliente+'</div></div></div><div class="col-md-3"><div class="row"><div class="col-xs-2">'+ped.total+'</div><div class="col-xs-4"><div style="text-align: center" class="btn-group"><button id="btn_editar_pedido" onClick="editarPedido()" type="button" class="btn-primary btn-xs" title="Editar"><span class="glyphicon glyphicon-pencil"></span></button><button type="button" class="btn-danger btn-xs" title="Eliminar" onClick="confirmar(4,'+ped.id_pedido+','+ped.id_cliente+')"><span class="glyphicon glyphicon-trash"></span></button></div></div><div class="col-xs-2"><div><label><input type="checkbox" value="'+ped.inter+'"></label></div></div><div class="col-xs-2"><input type="text" value="'+ped.inter+'"id="inter"></div><div class="col-xs-2"><input type="text" value="'+ped.recog+'" id="recog"></div></div></div><div class="col-md-3"><div class="row"><div class="col-xs-2"><input type="text" value="'+ped.fianza+'" id="fianza"></div><div class="col-xs-2"><input type="text" value="'+ped.pagado+'" id="pagado"></div><div class="col-xs-2"><input type="text"  value="'+ped.cambio+'" id="cambio"></div><div class="col-xs-2"><input type="text" value="1" id="pe"></div><div class="col-xs-2"><input type="text" value="'+ped.beneficio+'" id="benef"></div><div class="col-xs-2"><input type="text" value="'+ped.anul+'" id="anul"></div></div></div><div class="col-md-1"><div class="row"><div class="col-xs-12"><button type="button" class="btn-primary btn-xs">APLICAR</button></div></div></div></div></td></tr>';
                            total+=parseInt(ped.total);
                        });
                        $('#total_TRI2').text(total +' €');
                        $('#listadoPedidos2').html(tablaPedidos2);

                        //PEDIDOS 3er TRIMESTRE
                        total=0;
                        $.each(json.Pedidos[2], function(i, ped){
                        //Meter el JSON en la tabla de 'listado Presupuestos'       
                            tablaPedidos3 += '<tr><td><div class="row"><div class="col-md-2"><div class="row"><div class="col-xs-3">'+ped.id_pedido+'</div><div class="col-xs-5 col-xs-offset-1">'+ped.fecha+'</div><div class="col-xs-3">'+ped.id_fra+'</div></div></div><div class="col-md-3"><div class="row"><div class="col-xs-6">'+ped.id_coche+'</div><div class="col-xs-6">'+ped.id_cliente+'</div></div></div><div class="col-md-3"><div class="row"><div class="col-xs-2">'+ped.total+'</div><div class="col-xs-4"><div style="text-align: center" class="btn-group"><button id="btn_editar_pedido" onClick="editarPedido()" type="button" class="btn-primary btn-xs" title="Editar"><span class="glyphicon glyphicon-pencil"></span></button><button type="button" class="btn-danger btn-xs" title="Eliminar" onClick="confirmar(4,'+ped.id_pedido+','+ped.id_cliente+')"><span class="glyphicon glyphicon-trash"></span></button></div></div><div class="col-xs-2"><div><label><input type="checkbox" value="'+ped.inter+'"></label></div></div><div class="col-xs-2"><input type="text" value="'+ped.inter+'"id="inter"></div><div class="col-xs-2"><input type="text" value="'+ped.recog+'" id="recog"></div></div></div><div class="col-md-3"><div class="row"><div class="col-xs-2"><input type="text" value="'+ped.fianza+'" id="fianza"></div><div class="col-xs-2"><input type="text" value="'+ped.pagado+'" id="pagado"></div><div class="col-xs-2"><input type="text"  value="'+ped.cambio+'" id="cambio"></div><div class="col-xs-2"><input type="text" value="1" id="pe"></div><div class="col-xs-2"><input type="text" value="'+ped.beneficio+'" id="benef"></div><div class="col-xs-2"><input type="text" value="'+ped.anul+'" id="anul"></div></div></div><div class="col-md-1"><div class="row"><div class="col-xs-12"><button type="button" class="btn-primary btn-xs">APLICAR</button></div></div></div></div></td></tr>';
                            total+=parseInt(ped.total);
                        });
                        $('#total_TRI3').text(total +' €');
                        $('#listadoPedidos3').html(tablaPedidos3);

                        //PEDIDOS 4to TRIMESTRE
                        total=0;
                        $.each(json.Pedidos[3], function(i, ped){
                        //Meter el JSON en la tabla de 'listado Presupuestos'       
                            tablaPedidos4 += '<tr><td><div class="row"><div class="col-md-2"><div class="row"><div class="col-xs-3">'+ped.id_pedido+'</div><div class="col-xs-5 col-xs-offset-1">'+ped.fecha+'</div><div class="col-xs-3">'+ped.id_fra+'</div></div></div><div class="col-md-3"><div class="row"><div class="col-xs-6">'+ped.id_coche+'</div><div class="col-xs-6">'+ped.id_cliente+'</div></div></div><div class="col-md-3"><div class="row"><div class="col-xs-2">'+ped.total+'</div><div class="col-xs-4"><div style="text-align: center" class="btn-group"><button id="btn_editar_pedido" onClick="editarPedido()" type="button" class="btn-primary btn-xs" title="Editar"><span class="glyphicon glyphicon-pencil"></span></button><button type="button" class="btn-danger btn-xs" title="Eliminar" onClick="confirmar(4,'+ped.id_pedido+','+ped.id_cliente+')"><span class="glyphicon glyphicon-trash"></span></button></div></div><div class="col-xs-2"><div><label><input type="checkbox" value="'+ped.inter+'"></label></div></div><div class="col-xs-2"><input type="text" value="'+ped.inter+'"id="inter"></div><div class="col-xs-2"><input type="text" value="'+ped.recog+'" id="recog"></div></div></div><div class="col-md-3"><div class="row"><div class="col-xs-2"><input type="text" value="'+ped.fianza+'" id="fianza"></div><div class="col-xs-2"><input type="text" value="'+ped.pagado+'" id="pagado"></div><div class="col-xs-2"><input type="text"  value="'+ped.cambio+'" id="cambio"></div><div class="col-xs-2"><input type="text" value="1" id="pe"></div><div class="col-xs-2"><input type="text" value="'+ped.beneficio+'" id="benef"></div><div class="col-xs-2"><input type="text" value="'+ped.anul+'" id="anul"></div></div></div><div class="col-md-1"><div class="row"><div class="col-xs-12"><button type="button" class="btn-primary btn-xs">APLICAR</button></div></div></div></div></td></tr>';
                            total+=parseInt(ped.total);
                        });
                        $('#total_TRI4').text(total +' €');
                        $('#listadoPedidos4').html(tablaPedidos4);

                        //PEDIDOS DE AÑOS NO EN CURSO
                        $.each(json.Pedidos[4], function(i, ped){
                        //Meter el JSON en la tabla de 'listado Presupuestos'       
                            tablaPedTotal += '<tr><td><div class="row"><div class="col-md-2"><div class="row"><div class="col-xs-3">'+ped.id_pedido+'</div><div class="col-xs-5 col-xs-offset-1">'+ped.fecha+'</div><div class="col-xs-3">'+ped.id_fra+'</div></div></div><div class="col-md-3"><div class="row"><div class="col-xs-6">'+ped.id_coche+'</div><div class="col-xs-6">'+ped.id_cliente+'</div></div></div><div class="col-md-3"><div class="row"><div class="col-xs-2">'+ped.total+'</div><div class="col-xs-4"><div style="text-align: center" class="btn-group"><button id="btn_editar_pedido" onClick="editarPedido()" type="button" class="btn-primary btn-xs" title="Editar"><span class="glyphicon glyphicon-pencil"></span></button><button type="button" class="btn-danger btn-xs" title="Eliminar" onClick="confirmar(4,'+ped.id_pedido+','+ped.id_cliente+')"><span class="glyphicon glyphicon-trash"></span></button></div></div><div class="col-xs-2"><div><label><input type="checkbox" value="'+ped.inter+'"></label></div></div><div class="col-xs-2"><input type="text" value="'+ped.inter+'"id="inter"></div><div class="col-xs-2"><input type="text" value="'+ped.recog+'" id="recog"></div></div></div><div class="col-md-3"><div class="row"><div class="col-xs-2"><input type="text" value="'+ped.fianza+'" id="fianza"></div><div class="col-xs-2"><input type="text" value="'+ped.pagado+'" id="pagado"></div><div class="col-xs-2"><input type="text"  value="'+ped.cambio+'" id="cambio"></div><div class="col-xs-2"><input type="text" value="1" id="pe"></div><div class="col-xs-2"><input type="text" value="'+ped.beneficio+'" id="benef"></div><div class="col-xs-2"><input type="text" value="'+ped.anul+'" id="anul"></div></div></div><div class="col-md-1"><div class="row"><div class="col-xs-12"><button type="button" class="btn-primary btn-xs">APLICAR</button></div></div></div></div></td></tr>';

                        });
                        $('#listadoPedTotal').html(tablaPedTotal); 
                    }
                });
            }
            break;
        case 6:
            break;
        case 7:
            console.log('En apartado BBDD');
            urlPantalla = url.concat('bbdd.php');
            
            if (keyword.length >= min) {
                $.ajax({
                    url: urlPantalla,
                    type: 'POST',
                    data: {keyword: keyword},
                    dataType: 'json',
                    success:function(json){
                        var tablaBbdd = '';
                        $.each(json.Piezas, function(i, pieza){
                            tablaBbdd += '<tr><td>' + pieza.part_number + '</td><td>' + pieza.title + '</td><td>' + pieza.sp_title+ '</td><td>' + pieza.gbp + '</td><td style="text-align: center"><div class="btn-group"><button type="button" class="btn-primary btn-xs" title="Editar"><span class="glyphicon glyphicon-pencil"></span></button><button type="button" class="btn-danger btn-xs" title="Eliminar" onClick="confirmar(8,'+pieza.id_bbdd+')"><span class="glyphicon glyphicon-trash"></span></button></div></td></tr>';
                            });
                        $('#listadoBbdd').html(tablaBbdd);
                     }
                });
            }
            break;
        case 8:
            break;
    }
}


function listar_pedidos(cliente){
    var urlListarPedidos = url.concat('listarPedidos.php');
    var tablaPedidos1 = '';
    var tablaPedidos2 = '';
    var tablaPedidos3 = '';
    var tablaPedidos4 = '';
    var tablaPedTotal = '';
    var total=0;
    console.log('En listar_pedidos');
    //total = parseInt(total);
    //id_cliente = cliente;
    console.log('Cliente id: ',cliente);
    $.ajax({
        url: urlListarPedidos,
        type: 'GET',
        data: {cliente: cliente},
        dataType: 'json',
        success:function(json){
            //console.log(json);
            //PEDIDOS 1ER TRIMESTRE
            $.each(json.Pedidos[0], function(i, ped){
                //Meter el JSON en la tabla de 'listado Presupuestos'       
                tablaPedidos1 += '<tr><td><div class="row"><div class="col-md-2"><div class="row"><div class="col-xs-3">'+ped.id_pedido+'</div><div class="col-xs-5 col-xs-offset-1">'+ped.fecha+'</div><div class="col-xs-3">'+ped.id_fra+'</div></div></div><div class="col-md-3"><div class="row"><div class="col-xs-6">'+ped.id_coche+'</div><div class="col-xs-6">'+ped.id_cliente+'</div></div></div><div class="col-md-3"><div class="row"><div class="col-xs-2">'+ped.total+'</div><div class="col-xs-4"><div style="text-align: center" class="btn-group"><button id="btn_editar_pedido" onClick="editarPedido()" type="button" class="btn-primary btn-xs" title="Editar"><span class="glyphicon glyphicon-pencil"></span></button><button type="button" class="btn-danger btn-xs" title="Eliminar" onClick="confirmar(4,'+ped.id_pedido+','+ped.id_cliente+')"><span class="glyphicon glyphicon-trash"></span></button></div></div><div class="col-xs-2"><div><label><input type="checkbox" value="'+ped.inter+'"></label></div></div><div class="col-xs-2"><input type="text" value="'+ped.inter+'"id="inter"></div><div class="col-xs-2"><input type="text" value="'+ped.recog+'" id="recog"></div></div></div><div class="col-md-3"><div class="row"><div class="col-xs-2"><input type="text" value="'+ped.fianza+'" id="fianza"></div><div class="col-xs-2"><input type="text" value="'+ped.pagado+'" id="pagado"></div><div class="col-xs-2"><input type="text"  value="'+ped.cambio+'" id="cambio"></div><div class="col-xs-2"><input type="text" value="1" id="pe"></div><div class="col-xs-2"><input type="text" value="'+ped.beneficio+'" id="benef"></div><div class="col-xs-2"><input type="text" value="'+ped.anul+'" id="anul"></div></div></div><div class="col-md-1"><div class="row"><div class="col-xs-12"><button type="button" class="btn-primary btn-xs">APLICAR</button></div></div></div></div></td></tr>';
                total+=parseInt(ped.total);
            });
            $('#total_TRI1').text(total +' €');
            $('#listadoPedidos1').html(tablaPedidos1);
            
            //PEDIDOS 2do TRIMESTRE
            total=0;
            $.each(json.Pedidos[1], function(i, ped){
            //Meter el JSON en la tabla de 'listado Presupuestos'       
                tablaPedidos2 += '<tr><td><div class="row"><div class="col-md-2"><div class="row"><div class="col-xs-3">'+ped.id_pedido+'</div><div class="col-xs-5 col-xs-offset-1">'+ped.fecha+'</div><div class="col-xs-3">'+ped.id_fra+'</div></div></div><div class="col-md-3"><div class="row"><div class="col-xs-6">'+ped.id_coche+'</div><div class="col-xs-6">'+ped.id_cliente+'</div></div></div><div class="col-md-3"><div class="row"><div class="col-xs-2">'+ped.total+'</div><div class="col-xs-4"><div style="text-align: center" class="btn-group"><button id="btn_editar_pedido" onClick="editarPedido()" type="button" class="btn-primary btn-xs" title="Editar"><span class="glyphicon glyphicon-pencil"></span></button><button type="button" class="btn-danger btn-xs" title="Eliminar" onClick="confirmar(4,'+ped.id_pedido+','+ped.id_cliente+')"><span class="glyphicon glyphicon-trash"></span></button></div></div><div class="col-xs-2"><div><label><input type="checkbox" value="'+ped.inter+'"></label></div></div><div class="col-xs-2"><input type="text" value="'+ped.inter+'"id="inter"></div><div class="col-xs-2"><input type="text" value="'+ped.recog+'" id="recog"></div></div></div><div class="col-md-3"><div class="row"><div class="col-xs-2"><input type="text" value="'+ped.fianza+'" id="fianza"></div><div class="col-xs-2"><input type="text" value="'+ped.pagado+'" id="pagado"></div><div class="col-xs-2"><input type="text"  value="'+ped.cambio+'" id="cambio"></div><div class="col-xs-2"><input type="text" value="1" id="pe"></div><div class="col-xs-2"><input type="text" value="'+ped.beneficio+'" id="benef"></div><div class="col-xs-2"><input type="text" value="'+ped.anul+'" id="anul"></div></div></div><div class="col-md-1"><div class="row"><div class="col-xs-12"><button type="button" class="btn-primary btn-xs">APLICAR</button></div></div></div></div></td></tr>';
                total+=parseInt(ped.total);
            });
            $('#total_TRI2').text(total +' €');
            $('#listadoPedidos2').html(tablaPedidos2);
            
            //PEDIDOS 3er TRIMESTRE
            total=0;
            $.each(json.Pedidos[2], function(i, ped){
            //Meter el JSON en la tabla de 'listado Presupuestos'       
                tablaPedidos3 += '<tr><td><div class="row"><div class="col-md-2"><div class="row"><div class="col-xs-3">'+ped.id_pedido+'</div><div class="col-xs-5 col-xs-offset-1">'+ped.fecha+'</div><div class="col-xs-3">'+ped.id_fra+'</div></div></div><div class="col-md-3"><div class="row"><div class="col-xs-6">'+ped.id_coche+'</div><div class="col-xs-6">'+ped.id_cliente+'</div></div></div><div class="col-md-3"><div class="row"><div class="col-xs-2">'+ped.total+'</div><div class="col-xs-4"><div style="text-align: center" class="btn-group"><button id="btn_editar_pedido" onClick="editarPedido()" type="button" class="btn-primary btn-xs" title="Editar"><span class="glyphicon glyphicon-pencil"></span></button><button type="button" class="btn-danger btn-xs" title="Eliminar" onClick="confirmar(4,'+ped.id_pedido+','+ped.id_cliente+')"><span class="glyphicon glyphicon-trash"></span></button></div></div><div class="col-xs-2"><div><label><input type="checkbox" value="'+ped.inter+'"></label></div></div><div class="col-xs-2"><input type="text" value="'+ped.inter+'"id="inter"></div><div class="col-xs-2"><input type="text" value="'+ped.recog+'" id="recog"></div></div></div><div class="col-md-3"><div class="row"><div class="col-xs-2"><input type="text" value="'+ped.fianza+'" id="fianza"></div><div class="col-xs-2"><input type="text" value="'+ped.pagado+'" id="pagado"></div><div class="col-xs-2"><input type="text"  value="'+ped.cambio+'" id="cambio"></div><div class="col-xs-2"><input type="text" value="1" id="pe"></div><div class="col-xs-2"><input type="text" value="'+ped.beneficio+'" id="benef"></div><div class="col-xs-2"><input type="text" value="'+ped.anul+'" id="anul"></div></div></div><div class="col-md-1"><div class="row"><div class="col-xs-12"><button type="button" class="btn-primary btn-xs">APLICAR</button></div></div></div></div></td></tr>';
                total+=parseInt(ped.total);
            });
            $('#total_TRI3').text(total +' €');
            $('#listadoPedidos3').html(tablaPedidos3);
            
            //PEDIDOS 4to TRIMESTRE
            total=0;
            $.each(json.Pedidos[3], function(i, ped){
            //Meter el JSON en la tabla de 'listado Presupuestos'       
                tablaPedidos4 += '<tr><td><div class="row"><div class="col-md-2"><div class="row"><div class="col-xs-3">'+ped.id_pedido+'</div><div class="col-xs-5 col-xs-offset-1">'+ped.fecha+'</div><div class="col-xs-3">'+ped.id_fra+'</div></div></div><div class="col-md-3"><div class="row"><div class="col-xs-6">'+ped.id_coche+'</div><div class="col-xs-6">'+ped.id_cliente+'</div></div></div><div class="col-md-3"><div class="row"><div class="col-xs-2">'+ped.total+'</div><div class="col-xs-4"><div style="text-align: center" class="btn-group"><button id="btn_editar_pedido" onClick="editarPedido()" type="button" class="btn-primary btn-xs" title="Editar"><span class="glyphicon glyphicon-pencil"></span></button><button type="button" class="btn-danger btn-xs" title="Eliminar" onClick="confirmar(4,'+ped.id_pedido+','+ped.id_cliente+')"><span class="glyphicon glyphicon-trash"></span></button></div></div><div class="col-xs-2"><div><label><input type="checkbox" value="'+ped.inter+'"></label></div></div><div class="col-xs-2"><input type="text" value="'+ped.inter+'"id="inter"></div><div class="col-xs-2"><input type="text" value="'+ped.recog+'" id="recog"></div></div></div><div class="col-md-3"><div class="row"><div class="col-xs-2"><input type="text" value="'+ped.fianza+'" id="fianza"></div><div class="col-xs-2"><input type="text" value="'+ped.pagado+'" id="pagado"></div><div class="col-xs-2"><input type="text"  value="'+ped.cambio+'" id="cambio"></div><div class="col-xs-2"><input type="text" value="1" id="pe"></div><div class="col-xs-2"><input type="text" value="'+ped.beneficio+'" id="benef"></div><div class="col-xs-2"><input type="text" value="'+ped.anul+'" id="anul"></div></div></div><div class="col-md-1"><div class="row"><div class="col-xs-12"><button type="button" class="btn-primary btn-xs">APLICAR</button></div></div></div></div></td></tr>';
                total+=parseInt(ped.total);
            });
            $('#total_TRI4').text(total +' €');
            $('#listadoPedidos4').html(tablaPedidos4);
            
            //PEDIDOS DE AÑOS NO EN CURSO
            $.each(json.Pedidos[4], function(i, ped){
            //Meter el JSON en la tabla de 'listado Presupuestos'       
                tablaPedTotal += '<tr><td><div class="row"><div class="col-md-2"><div class="row"><div class="col-xs-3">'+ped.id_pedido+'</div><div class="col-xs-5 col-xs-offset-1">'+ped.fecha+'</div><div class="col-xs-3">'+ped.id_fra+'</div></div></div><div class="col-md-3"><div class="row"><div class="col-xs-6">'+ped.id_coche+'</div><div class="col-xs-6">'+ped.id_cliente+'</div></div></div><div class="col-md-3"><div class="row"><div class="col-xs-2">'+ped.total+'</div><div class="col-xs-4"><div style="text-align: center" class="btn-group"><button id="btn_editar_pedido" onClick="editarPedido()" type="button" class="btn-primary btn-xs" title="Editar"><span class="glyphicon glyphicon-pencil"></span></button><button type="button" class="btn-danger btn-xs" title="Eliminar" onClick="confirmar(4,'+ped.id_pedido+','+ped.id_cliente+')"><span class="glyphicon glyphicon-trash"></span></button></div></div><div class="col-xs-2"><div><label><input type="checkbox" value="'+ped.inter+'"></label></div></div><div class="col-xs-2"><input type="text" value="'+ped.inter+'"id="inter"></div><div class="col-xs-2"><input type="text" value="'+ped.recog+'" id="recog"></div></div></div><div class="col-md-3"><div class="row"><div class="col-xs-2"><input type="text" value="'+ped.fianza+'" id="fianza"></div><div class="col-xs-2"><input type="text" value="'+ped.pagado+'" id="pagado"></div><div class="col-xs-2"><input type="text"  value="'+ped.cambio+'" id="cambio"></div><div class="col-xs-2"><input type="text" value="1" id="pe"></div><div class="col-xs-2"><input type="text" value="'+ped.beneficio+'" id="benef"></div><div class="col-xs-2"><input type="text" value="'+ped.anul+'" id="anul"></div></div></div><div class="col-md-1"><div class="row"><div class="col-xs-12"><button type="button" class="btn-primary btn-xs">APLICAR</button></div></div></div></div></td></tr>';
                
            });
            $('#listadoPedTotal').html(tablaPedTotal);
        }
    });  
}

function listar_bbdd(){
    var urlListarbbdd = url.concat('bbdd.php');
    var tablaBbdd = '';
    $.getJSON(urlListarbbdd, function(json){
        $.each(json.Piezas, function(i, pieza){
        //Meter el JSON en la tabla de 'listado Clientes'
        tablaBbdd += '<tr><td>' + pieza.part_number + '</td><td>' + pieza.title + '</td><td>' + pieza.sp_title+ '</td><td>' + pieza.gbp + '</td><td style="text-align: center"><div class="btn-group"><button type="button" class="btn-primary btn-xs" title="Editar"><span class="glyphicon glyphicon-pencil"></span></button><button type="button" class="btn-danger btn-xs" title="Eliminar" onClick="confirmar(8,'+pieza.id_bbdd+')"><span class="glyphicon glyphicon-trash"></span></button></div></td></tr>';
           
        });
        $('#listadoBbdd').html(tablaBbdd);
    });  
}

function listar_pptos(cliente){
    //console.log('En listar_pptos. Parámetro cliente: ', cliente);
    var urlListarPptos = url.concat('listarPresupuestos.php');
    var tablaPptos = '';
    id_cliente = cliente;
    
    $.ajax({
        url: urlListarPptos,
        type: 'POST',
        data: {cliente: id_cliente},
        dataType: 'json',
        success: function (json) {
            $.each(json.Presupuestos, function (i, ppto) {
                //Meter el JSON en la tabla de 'listado Presupuestos'       
                tablaPptos += '<tr><td>' + ppto.id_ppto + '</td><td>' + ppto.fecha + '</td><td>' + ppto.id_coche + '</td><td>' + ppto.id_coche + '</td><td>' + ppto.id_cliente + '</td><td>' + ppto.total + '</td><td style="text-align: center"><div class="btn-group"><button id="btn_editar_ppto" type="button" class="btn-primary btn-sm" title="Editar"><span class="glyphicon glyphicon-pencil"></span></button><button type="button" class="btn-danger btn-sm" title="Eliminar" onClick="confirmar(2,'+ppto.id_ppto+','+ppto.id_cliente+')"><span class="glyphicon glyphicon-trash"></span></button></div></td></tr>';
            });
            $('#listadoPptos').html(tablaPptos);
        }
    });
}

function navegacion(){
    //BOtones
    //var submenu = document.getElementsByClassName('col');
    contenedor = document.getElementById("contenedor");
    //PAra depurar consola=document.getElementById("consola");
    
    //FastClick
    FastClick.attach(document.body);    
    
    //EVENTOS
    contenedor.addEventListener('touchstart', function(event){
      //1. Obtener objeto que represente el dedo
      var touch = event.targetTouches[0]; //array de 'dedos'. puede haber más de un dedo
      //2. Obtenemos su posicioón
      posXinicial = touch.pageX;
      console.log(posXinicial);
    });
    
    //EVENTOS. (Ejemplos de funciones anónimas
    submenu[0].onclick= function(){
        //Identifico la pantalla para el filtro del buscador y limpio éste
        pantalla=1;
        $('#client_id').val('');
        nuevoCliente();
    };
    submenu[1].onclick= function(){
        //Identifico la pantalla para el filtro del buscador y limpio éste
        pantalla=2;
        $('#client_id').val('');
        contenedor.style.left = "-100%";
        $(".buscadores").show();
        submenu[0].className="col";
        submenu[1].className="col activo";
        submenu[2].className="col";
        submenu[3].className="col";
        submenu[4].className="col";
        submenu[5].className="col";
        submenu[6].className="col";
        submenu[7].className="col";
        listar_clientes();
//        ocultarNewPed();
    };
//  Listado de presupuestos
    submenu[2].onclick= function(){
        //Identifico la pantalla para el filtro del buscador y limpio éste
        pantalla=3;
        $('#client_id').val('');
        //console.log('id_cliente antes de la f(x) listadoPptos: ', id_cliente);
        listadoPptos(id_cliente);
    };
    submenu[3].onclick= function(){
        //Identifico la pantalla para el filtro del buscador y limpio éste
        pantalla=4;
        $('#client_id').val('');
        
        nuevoPpto();
    };
//  Listado de pedidos    
    submenu[4].onclick= function(){
        //Identifico la pantalla para el filtro del buscador y limpio éste
        pantalla=5;
        $('#client_id').val('');
        
        listadoPed(id_cliente);
    };
//  Pedidos anul.    
    submenu[5].onclick= function(){
        //Identifico la pantalla para el filtro del buscador y limpio éste
        pantalla=6;
        $('#client_id').val('');
        
        contenedor.style.left = "-500%";
//        $("#buscador_cli").hide();
        $(".form_addBBDD").hide(); 
        submenu[0].className="col";
        submenu[1].className="col";
        submenu[2].className="col";
        submenu[3].className="col";
        submenu[4].className="col";
        submenu[5].className="col activo";
        submenu[6].className="col";
        submenu[7].className="col";
//        ocultarNewPed();
    };
//  BBDD    
    submenu[6].onclick= function(){
        //Identifico la pantalla para el filtro del buscador y limpio éste
        pantalla=7;
        $('#client_id').val('');
        
        contenedor.style.left = "-600%";
//        $("#buscador_cli").hide();
        $(".form_addPerdida").hide();
        submenu[0].className="col";
        submenu[1].className="col";
        submenu[2].className="col";
        submenu[3].className="col";
        submenu[4].className="col";
        submenu[5].className="col";
        submenu[6].className="col activo";
        submenu[7].className="col";
        listar_bbdd();
                    
//        ocultarNewPed();
    };
//  Pérdidas    
    submenu[7].onclick= function(){
        //Identifico la pantalla para el filtro del buscador y limpio éste
        pantalla=8;
        $('#client_id').val('');
        
        contenedor.style.left = "-700%";
//        $("#buscador_cli").hide();
        submenu[0].className="col";
        submenu[1].className="col";
        submenu[2].className="col";
        submenu[3].className="col";
        submenu[4].className="col";
        submenu[5].className="col";
        submenu[6].className="col";
        submenu[7].className="col activo";
//        ocultarNewPed();
    };
    
}

function altaCliente(){
    //Comprobamos mediante el texto del botón si es update o nueva inserción
    if ($('#guardar_cliente1').text() === 'Actualizar'){ 
        //$.post(urlActualizarCliente, $("#form_nuevo_cliente").serialize(), function(resp){}
        
        //Ajax para el envío de datos a actualizar
        var urlActualizarCliente = url.concat('actualizarCliente.php');
        $.ajax({
            type: "POST",
            url: urlActualizarCliente,
            /*data: { form: $("#form_nuevo_cliente").serialize(), coches_array: $("#coches :input").serializeArray(), id_cliente: id_cliente },  */
            data: { id_cliente: id_cliente,
                    input_nombre: $("#input_nombre").val(), 
                    input_variado: $("#input_variado").val(),
                    input_tlf1: $("#input_tlf1").val(),
                    input_tlf2: $("#input_tlf2").val(),
                    input_email1: $("#input_email1").val(),
                    input_email2: $("#input_email2").val(),
                    envio_nombre: $("#envio_nombre").val(),
                    envio_calle: $("#envio_calle").val(),
                    envioCP: $("#envioCP").val(),
                    envio_ciudad: $("#envio_ciudad").val(),
                    fact_nombre: $("#fact_nombre").val(),
                    fact_calle: $("#fact_calle").val(),
                    factCP: $("#factCP").val(),
                    factNIF: $("#factNIF").val(),
                    fact_ciudad: $("#fact_ciudad").val(),},  
            success: function(data)
            {
                if (data == 1) {
                    alert ('CLIENTE MODIFICADO');
                }
                else {
                    alert ('Ha ocurrido un error al actualizar el cliente')
                }
                   
            }
        }); 

        //Volver a poner el texto de los dos botones a 'Guardar';
        $('#guardar_cliente1').text('Guardar');
        $('#guardar_cliente2').text('Guardar');
        
        event.preventDefault();

        //Vaciar las variables globales de cliente, coches y direcciones a actualizar
        /*id_cliente = 0;
        $.each (id_coches, function() {
            id_coches.pop();
        });
        $.each (id_direcciones, function() {
            id_direcciones.pop();
        });*/
    }
    
    //Caso de nueva inserción
    else
    {
        var urlAltaCliente = url.concat('altaCliente.php');
        $.post(urlAltaCliente, $("#form_nuevo_cliente").serialize(), function(resp){
            alert(resp);
            if(resp==-1){
                //Ya existe este cliente
                alert("Ya existe este cliente");
            }
            else if (resp==-2){
                alert("Introduce al menos un coche");
            }
            else{
                //Todas las tablas involucradas en la inserción OK
                alert("Datos dados de alta correctamente");
            }
        });
    }
    
}

function agregarBBDD(){
    //console.log('En agregarBBDD');
    var urlAgregarBBDD = url.concat('agregarBBDD.php');
    $.ajax({
        type: "POST",
        url: urlAgregarBBDD,
        data: $("#formBBDD").serialize(),
        success: function(data)
        {
            if(data==-1){
                alert('Ya existe ese Part Number');
            }
            else {
                alert('Producto insertado correctamente');
            }
        }
    });  
}

function insertar_nuevoPpto(){
    //Campos obligatorios para insertar artículos: descripción y referencia. Miramos estos campos del primer input del id="articulos". Si están vacíos avisamos. IMPLEMENTARLO
    event.preventDefault();
    
    
    var urlNuevoPpto = url.concat('nuevoPpto.php');    
    /*console.log('antes del ajax');
    $.ajax({
        type: "POST",
        url: urlNuevoPpto,
        data: { form: $("#form_newPpto").serialize(), id_cliente: id_cliente }, 
        success: function(resp)
        {
            alert(resp);
        }
    });*/

    $.post(urlNuevoPpto, $("#form_newPpto").serialize(), function(resp){
        if (resp == 'No iguales'){
            alert('Informa adecuadamente los artículos');
        }
        else if (resp==1){
            alert('Presupuesto creado');
        }

    });
        
}


function getDescripciones (){
    var min = 1; // min caracteres para buscar
    urlDescripciones = url.concat('getDescripciones.php');
    var keyword = $('.descripcion').val();
    if (keyword.length >= min) {
        $.ajax({
            url: urlDescripciones,
            type: 'POST',
            data: {keyword: keyword},
            dataType: 'json',
            success:function(json){
                var selectDescripciones = [];
                $.each(json.Descripciones, function(i, descripcion){
                    selectDescripciones.push(descripcion.sp_title);
                });
                $('.descripcion').autocomplete({
                    source: selectDescripciones
                });
            }
        });
    }

}


function getRefPVP (des){
    urlgetRefPvp = url.concat('getRefPvp.php');
    if (des != '') {
        $.ajax({
            url: urlgetRefPvp,
            type: 'POST',
            data: {des: des},
            dataType: 'json',
            success:function(json){
                $('.referencia').val(json.pruebasBBDD[0].part_number);
                $('.precio').val(json.pruebasBBDD[0].gbp);
            }
        });    
    }
    
}

/*CON ESTA FUNCIÓN HAY QUE PONER $(".descripcion").on("blur", getRefPVP); en el SET Events y quitar el onblur de los inputs descripción de nuevo_ppto
function getRefPVP (){
    console.log('Pierde el foco, des: ', this.name);
    next  = $(this).next();
    console.log('next: ', next);

    urlgetRefPvp = url.concat('getRefPvp.php');
    if (this.value != '') {
        $.ajax({
            url: urlgetRefPvp,
            type: 'POST',
            data: {des: this.value},
            dataType: 'json',
            success:function(json){
                console.log ('Dentro del function, jason: ', json);
                console.log ($(this.name));
                $(this).next().val(json.pruebasBBDD[0].part_number);
                
            }
        });    
    }
    
}*/

function comboClientesPpto (){
    var urlcomboCliente = url.concat('listarClientes.php');
    $.ajax({
        url: urlcomboCliente,
        type: 'POST',
        //data: {keyword: keyword},
        dataType: 'json',
        success:function(json){
            var comboClientes = "<select id='cliSeleccionadoPpto' onchange='listadoPptos(this.value)'><option value='0'>Todos...</option>";
            $.each(json.Clientes, function(i, cliente){
                comboClientes += "<option value="+cliente.id_cliente+">"+cliente.nombre+"</option>";
            });
            comboClientes += "</select>";
            $('#cliSeleccionadoPpto').html(comboClientes);
        }
    });
}



function comboClientesPed (){
    var urlcomboCliente = url.concat('listarClientes.php');
    $.ajax({
        url: urlcomboCliente,
        type: 'POST',
        //data: {keyword: keyword},
        dataType: 'json',
        success:function(json){
            var comboClientes = "<select id='cliSeleccionadoPed' onchange='listar_pedidos(this.value)'><option value='0'>Todos...</option>";
            $.each(json.Clientes, function(i, cliente){
                comboClientes += "<option value="+cliente.id_cliente+">"+cliente.nombre+"</option>";
            });
            comboClientes += "</select>";
            $('#cliSeleccionadoPed').html(comboClientes);
        }
    });
}

         



function eliminarCliente(id_cliente){
    var urlEliminarCliente = url.concat('eliminarCliente.php');
    //Enviamos la id al PHP
    $.post(urlEliminarCliente,{"id_cliente":id_cliente}, function(resp){
       if (resp == 1){
           listar_clientes();
       }
       else{
           alert("Error al eliminar cliente");
       }
    });
}

function eliminarPpto(id_ppto, idCli){
    var urlEliminarPpto = url.concat('eliminarPpto.php');
    //Enviamos la id al PHP
    console.log('url ppto', urlEliminarPpto); 
    $.post(urlEliminarPpto,{"id_ppto":id_ppto}, function(resp){
       if (resp == 1){
           console.log('En eliminarPpto Ok'); 
           listar_pptos(idCli);
       }
       else{
           alert("Error al eliminar presupuesto");
       }
    });
}

function eliminarPed(id_ped, idCli){
    console.log('En eliminarPed Ok'); 
    var urlEliminarPed = url.concat('eliminarPed.php');
    //Enviamos la id al PHP
    $.post(urlEliminarPed,{"id_ped":id_ped}, function(resp){
       if (resp == 1){
           console.log('En eliminarPed Ok'); 
           listar_pedidos(idCli);
           //listadoPed(idcli);
       }
       else{
           alert("Error al eliminar pedido");
       }
    });
}

function eliminarBBDD(id_bbdd){
    var urlEliminarBBDD = url.concat('eliminarBBDD.php');
    //Enviamos la id al PHP
    $.post(urlEliminarBBDD,{"id_bbdd":id_bbdd}, function(resp){
       if (resp == 1){
           console.log('En eliminarBBDD Ok'); 
           listar_bbdd();
       }
       else{
           alert("Error al eliminar el artículo de la Base de Datos");
       }
    });    
}


function confirmar(cod, id, idCli) {
    console.log('En confirmar, desde (cod): ', cod);
    console.log('id: ', id);
    $("#confirm2").dialog({
      resizable: false,
      height:170,
      modal: true,
      buttons: {
        "Eliminar": function() {
            /*lamar a php para eliminar, aquí un case distinguiendo lo que haya que eliminar, códigos:
            *   1. eliminar cliente - código 1
            *   2. eliminar presupuesto de cliente específico- código 2
            *   3. Eliminar artículo de nuevo/editar ppto - código 3??
            *   4. Eliminar pedido de listado de pedidos - código 4
            *   5. Eliminar artículo de nuevo/editar pedido - código 5
            *   6. eliminar pedidos anulacion - código 6
            *   7. eliminar artículos de editar anulacion - código 7
            *   8. eliminar producto base de datos - código 8
            *   9. eliminar perdidas - código 9
            *   10. eliminar presupuesto de listado general- código 10
            */

            switch (cod) {    
            case 1:
                //Eliminar Cliente
                eliminarCliente(id);
                break;
            case 2:
                //Eliminar ppto de cliente
                eliminarPpto(id, idCli);
                break;
            case 3:
                //Eliminar artículo de ppto
                console.log('Confirmar cod: ', cod, id);
                break;
            case 4:
                //Eliminar pedido
                eliminarPed(id, idCli);
                console.log('Confirmar cod: ', cod, id);
                break;
            case 5:
                //Eliminar artículo de pedido. No probado
                console.log('Confirmar cod: ', cod, id);
                break;
            case 6:
                //Eliminar anulación. No probado
                console.log('Confirmar cod: ', cod, id);
                break;
            case 7:
                //Eliminar de editar anulacion. No probado
                console.log('Confirmar cod: ', cod, id);
                break;
            case 8:
                //Elimar BBDD
                console.log('Confirmar cod: ', cod, id);
                eliminarBBDD(id);
                break;
            case 9:
                //Eliminar pérdida
                console.log('Confirmar cod: ', cod);
                break;
            case 10:
                //Eliminar ppto de listado general
                //eliminarPpto(id, 0);
                break;
            }
          $(this).dialog( "close" );
        },
        Cancel: function() {
          $(this).dialog( "close" );
        }
      }
    });
  }
























    

