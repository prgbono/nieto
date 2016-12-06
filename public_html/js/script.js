$(document).ready(main);
  
//Vbles globales
//URL's
//LOCALHOST
// var url = "http://localhost:8888/nietoBack/";
//rios.esy.es
//var url = "http://www.rios.esy.es/nietoBack/";
//RasPi local
//var url = "http://192.168.1.200/nietoBack/";
//1&1
var url = "http://www.g4security.es/nietoBack/";
//PRODUCCIÓN


var pantalla = 1;
var id_cliente = 0;
var id_coches = [];
var id_direcciones = [];
var contenedor;
var posXinicial; //posición inicial al hacer touch
var submenu = document.getElementsByClassName('col');
var preArticulos = '';


function main(){
    navegacion();
    //Artículos e id's a localStorage
    /*getArticulos();*/
    setEvents();
    $(".buscadores").show();
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
    //$("#btn_editar_ppto").on("click", editarPpto);
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
            type: 'POST',
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
function editarPpto(id_ppto){
    comboClientesNewPpto();
    cargarPpto(id_ppto);
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
        type: 'POST',
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
        type: 'POST',
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
    $.ajax({
        url: urlDireccionesCliente,
        type: 'POST',
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
    var min = 3; // min caracteres para buscar
    var keyword = $('#client_id').val();
    switch (pantalla) {    
        case 1: 
            console.log(pantalla);
            break;
        case 2:
            console.log(pantalla);
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
            console.log(pantalla);
            listar_pptos();
            /*urlPantalla = url.concat('listarPresupuestos.php');
            if (keyword.length >= min) {
                $.ajax({
                    url: urlPantalla,
                    type: 'POST',
                    data: {keyword: keyword},
                    dataType: 'json',
                    success:function(json){
                        var tablaPptos = '';
                        $.each(json.Presupuestos, function(i, ppto){
                            tablaPptos += '<tr><td>'+ppto.id_ppto+'</td><td>'+ppto.fecha+'</td><td>'+ppto.id_coche+'</td><td>'+ppto.id_coche+'</td><td>'+ppto.id_cliente+'</td><td>'+ppto.total+'</td><td style="text-align: center"><div class="btn-group"><button id="btn_editar_ppto" type="button" class="btn-primary btn-sm" title="Editar"><span class="glyphicon glyphicon-pencil"></span></button><button type="button" class="btn-danger btn-sm" title="Eliminar" onClick="confirmar(2,'+ppto.id_ppto+','+ppto.id_cliente+')"><span class="glyphicon glyphicon-trash"></span></button></div></td></tr>';
                        });
                        $('#listadoPptos').html(tablaPptos);
                    }
                });
            }*/
            break;
            
        case 4:
            console.log(pantalla);
            console.log('En pantalla = 4 Nuevo presupuesto');
            break;
        case 5:
            console.log(pantalla);
            //console.log('En pantalla = 5 Listado Pedidos');
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
            var enviada = ped.fra_env == 'S'? 'checked' : '';
            var internacional = ped.inter == 'S'? 'checked' : '';
            var recogida = ped.recog == 'S'? 'checked' : '';
            var anulaciones = ped.anul == 'S'? 'checked' : '';

            tablaPedidos1 += '<tr><td><div class="row"><div class="col-md-2"><div class="row"><div class="col-xs-3">'+ped.id_pedido+'</div><div class="col-xs-5 col-xs-offset-1">'+ped.fecha+'</div><div class="col-xs-3">'+ped.id_fra+'</div></div></div><div class="col-md-3"><div class="row"><div class="col-xs-6">'+ped.id_coche+'</div><div class="col-xs-6">'+ped.id_cliente+'</div></div></div><div class="col-md-3"><div class="row"><div class="col-xs-2">'+ped.total+'</div><div class="col-xs-4"><div style="text-align: center" class="btn-group"><button id="btn_editar_pedido" onClick="editarPedido()" type="button" class="btn-primary btn-xs" title="Editar"><span class="glyphicon glyphicon-pencil"></span></button><button type="button" class="btn-danger btn-xs" title="Eliminar" onClick="confirmar(4,'+ped.id_pedido+','+ped.id_cliente+')"><span class="glyphicon glyphicon-trash"></span></button></div></div><div class="col-xs-2"><div><label> <input type="checkbox" id="fra_env_'+ped.id_pedido+'" '+enviada+'></label></div></div><div class="col-xs-2"><input type="checkbox" '+internacional+' id="inter_'+ped.id_pedido+'"></div><div class="col-xs-2"><input type="checkbox" id="recog_'+ped.id_pedido+'" '+recogida+'></div></div></div><div class="col-md-3"><div class="row"><div class="col-xs-2"><input type="text" value="'+ped.fianza+'" id="fianza_'+ped.id_pedido+'"></div><div class="col-xs-2"><input type="text" value="'+ped.pagado+'" id="pagado_'+ped.id_pedido+'"></div><div class="col-xs-2"><input type="text"  value="'+ped.cambio+'" id="cambio_'+ped.id_pedido+'"></div><div class="col-xs-2"><input type="text" value="1" id="perdida_'+ped.id_pedido+'"></div><div class="col-xs-2"><input type="text" value="'+ped.beneficio+'" id="benef_'+ped.id_pedido+'"></div><div class="col-xs-2"><input type="checkbox" '+anulaciones+' id="anular_'+ped.id_pedido+'"></div></div></div><div class="col-md-1"><div class="row"><div class="col-xs-12"><button type="button" id="aplicar_'+ped.id_pedido+'" class="btn-primary btn-xs" onClick="aplicar_cambios('+ped.id_pedido+')">APLICAR</button></div></div></div></div></td></tr>';

            total+=parseInt(ped.total);
        });
                        $('#total_TRI1').text(total +' €');
                        $('#listadoPedidos1').html(tablaPedidos1);
        
                        //PEDIDOS 2do TRIMESTRE
                        total=0;
                        $.each(json.Pedidos[1], function(i, ped){
                            enviada = ped.fra_env == 'S'? 'checked' : '';
                            internacional = ped.inter == 'S'? 'checked' : '';
                            recogida = ped.recog == 'S'? 'checked' : '';
                            anulaciones = ped.anul == 'S'? 'checked' : '';
                        //Meter el JSON en la tabla de 'listado Presupuestos'
                            tablaPedidos2 += '<tr><td><div class="row"><div class="col-md-2"><div class="row"><div class="col-xs-3">'+ped.id_pedido+'</div><div class="col-xs-5 col-xs-offset-1">'+ped.fecha+'</div><div class="col-xs-3">'+ped.id_fra+'</div></div></div><div class="col-md-3"><div class="row"><div class="col-xs-6">'+ped.id_coche+'</div><div class="col-xs-6">'+ped.id_cliente+'</div></div></div><div class="col-md-3"><div class="row"><div class="col-xs-2">'+ped.total+'</div><div class="col-xs-4"><div style="text-align: center" class="btn-group"><button id="btn_editar_pedido" onClick="editarPedido()" type="button" class="btn-primary btn-xs" title="Editar"><span class="glyphicon glyphicon-pencil"></span></button><button type="button" class="btn-danger btn-xs" title="Eliminar" onClick="confirmar(4,'+ped.id_pedido+','+ped.id_cliente+')"><span class="glyphicon glyphicon-trash"></span></button></div></div><div class="col-xs-2"><div><label> <input type="checkbox" id="fra_env_'+ped.id_pedido+'" '+enviada+'></label></div></div><div class="col-xs-2"><input type="checkbox" '+internacional+' id="inter_'+ped.id_pedido+'"></div><div class="col-xs-2"><input type="checkbox" id="recog_'+ped.id_pedido+'" '+recogida+'></div></div></div><div class="col-md-3"><div class="row"><div class="col-xs-2"><input type="text" value="'+ped.fianza+'" id="fianza_'+ped.id_pedido+'"></div><div class="col-xs-2"><input type="text" value="'+ped.pagado+'" id="pagado_'+ped.id_pedido+'"></div><div class="col-xs-2"><input type="text"  value="'+ped.cambio+'" id="cambio_'+ped.id_pedido+'"></div><div class="col-xs-2"><input type="text" value="1" id="perdida_'+ped.id_pedido+'"></div><div class="col-xs-2"><input type="text" value="'+ped.beneficio+'" id="benef_'+ped.id_pedido+'"></div><div class="col-xs-2"><input type="checkbox" '+anulaciones+' id="anular_'+ped.id_pedido+'"></div></div></div><div class="col-md-1"><div class="row"><div class="col-xs-12"><button type="button" id="aplicar_'+ped.id_pedido+'" class="btn-primary btn-xs" onClick="aplicar_cambios('+ped.id_pedido+')">APLICAR</button></div></div></div></div></td></tr>';

                            total+=parseInt(ped.total);
                        });
                        $('#total_TRI2').text(total +' €');
                        $('#listadoPedidos2').html(tablaPedidos2);

                        //PEDIDOS 3er TRIMESTRE
                        total=0;
                        $.each(json.Pedidos[2], function(i, ped){
                            enviada = ped.fra_env == 'S'? 'checked' : '';
                            internacional = ped.inter == 'S'? 'checked' : '';
                            recogida = ped.recog == 'S'? 'checked' : '';
                            anulaciones = ped.anul == 'S'? 'checked' : '';
                        //Meter el JSON en la tabla de 'listado Presupuestos'   
                        tablaPedidos3 += '<tr><td><div class="row"><div class="col-md-2"><div class="row"><div class="col-xs-3">'+ped.id_pedido+'</div><div class="col-xs-5 col-xs-offset-1">'+ped.fecha+'</div><div class="col-xs-3">'+ped.id_fra+'</div></div></div><div class="col-md-3"><div class="row"><div class="col-xs-6">'+ped.id_coche+'</div><div class="col-xs-6">'+ped.id_cliente+'</div></div></div><div class="col-md-3"><div class="row"><div class="col-xs-2">'+ped.total+'</div><div class="col-xs-4"><div style="text-align: center" class="btn-group"><button id="btn_editar_pedido" onClick="editarPedido()" type="button" class="btn-primary btn-xs" title="Editar"><span class="glyphicon glyphicon-pencil"></span></button><button type="button" class="btn-danger btn-xs" title="Eliminar" onClick="confirmar(4,'+ped.id_pedido+','+ped.id_cliente+')"><span class="glyphicon glyphicon-trash"></span></button></div></div><div class="col-xs-2"><div><label> <input type="checkbox" id="fra_env_'+ped.id_pedido+'" '+enviada+'></label></div></div><div class="col-xs-2"><input type="checkbox" '+internacional+' id="inter_'+ped.id_pedido+'"></div><div class="col-xs-2"><input type="checkbox" id="recog_'+ped.id_pedido+'" '+recogida+'></div></div></div><div class="col-md-3"><div class="row"><div class="col-xs-2"><input type="text" value="'+ped.fianza+'" id="fianza_'+ped.id_pedido+'"></div><div class="col-xs-2"><input type="text" value="'+ped.pagado+'" id="pagado_'+ped.id_pedido+'"></div><div class="col-xs-2"><input type="text"  value="'+ped.cambio+'" id="cambio_'+ped.id_pedido+'"></div><div class="col-xs-2"><input type="text" value="1" id="perdida_'+ped.id_pedido+'"></div><div class="col-xs-2"><input type="text" value="'+ped.beneficio+'" id="benef_'+ped.id_pedido+'"></div><div class="col-xs-2"><input type="checkbox" '+anulaciones+' id="anular_'+ped.id_pedido+'"></div></div></div><div class="col-md-1"><div class="row"><div class="col-xs-12"><button type="button" id="aplicar_'+ped.id_pedido+'" class="btn-primary btn-xs" onClick="aplicar_cambios('+ped.id_pedido+')">APLICAR</button></div></div></div></div></td></tr>';

                            total+=parseInt(ped.total);
                        });
                        $('#total_TRI3').text(total +' €');
                        $('#listadoPedidos3').html(tablaPedidos3);

                        //PEDIDOS 4to TRIMESTRE
                        total=0;
                        $.each(json.Pedidos[3], function(i, ped){
                            enviada = ped.fra_env == 'S'? 'checked' : '';
                            internacional = ped.inter == 'S'? 'checked' : '';
                            recogida = ped.recog == 'S'? 'checked' : '';
                            anulaciones = ped.anul == 'S'? 'checked' : '';
                        //Meter el JSON en la tabla de 'listado Presupuestos'  
                        tablaPedidos4 += '<tr><td><div class="row"><div class="col-md-2"><div class="row"><div class="col-xs-3">'+ped.id_pedido+'</div><div class="col-xs-5 col-xs-offset-1">'+ped.fecha+'</div><div class="col-xs-3">'+ped.id_fra+'</div></div></div><div class="col-md-3"><div class="row"><div class="col-xs-6">'+ped.id_coche+'</div><div class="col-xs-6">'+ped.id_cliente+'</div></div></div><div class="col-md-3"><div class="row"><div class="col-xs-2">'+ped.total+'</div><div class="col-xs-4"><div style="text-align: center" class="btn-group"><button id="btn_editar_pedido" onClick="editarPedido()" type="button" class="btn-primary btn-xs" title="Editar"><span class="glyphicon glyphicon-pencil"></span></button><button type="button" class="btn-danger btn-xs" title="Eliminar" onClick="confirmar(4,'+ped.id_pedido+','+ped.id_cliente+')"><span class="glyphicon glyphicon-trash"></span></button></div></div><div class="col-xs-2"><div><label> <input type="checkbox" id="fra_env_'+ped.id_pedido+'" '+enviada+'></label></div></div><div class="col-xs-2"><input type="checkbox" '+internacional+' id="inter_'+ped.id_pedido+'"></div><div class="col-xs-2"><input type="checkbox" id="recog_'+ped.id_pedido+'" '+recogida+'></div></div></div><div class="col-md-3"><div class="row"><div class="col-xs-2"><input type="text" value="'+ped.fianza+'" id="fianza_'+ped.id_pedido+'"></div><div class="col-xs-2"><input type="text" value="'+ped.pagado+'" id="pagado_'+ped.id_pedido+'"></div><div class="col-xs-2"><input type="text"  value="'+ped.cambio+'" id="cambio_'+ped.id_pedido+'"></div><div class="col-xs-2"><input type="text" value="1" id="perdida_'+ped.id_pedido+'"></div><div class="col-xs-2"><input type="text" value="'+ped.beneficio+'" id="benef_'+ped.id_pedido+'"></div><div class="col-xs-2"><input type="checkbox" '+anulaciones+' id="anular_'+ped.id_pedido+'"></div></div></div><div class="col-md-1"><div class="row"><div class="col-xs-12"><button type="button" id="aplicar_'+ped.id_pedido+'" class="btn-primary btn-xs" onClick="aplicar_cambios('+ped.id_pedido+')">APLICAR</button></div></div></div></div></td></tr>';


                            total+=parseInt(ped.total);
                        });
                        $('#total_TRI4').text(total +' €');
                        $('#listadoPedidos4').html(tablaPedidos4);

                        //PEDIDOS DE AÑOS NO EN CURSO
                        $.each(json.Pedidos[4], function(i, ped){
                            enviada = ped.fra_env == 'S'? 'checked' : '';
                            internacional = ped.inter == 'S'? 'checked' : '';
                            recogida = ped.recog == 'S'? 'checked' : '';
                            anulaciones = ped.anul == 'S'? 'checked' : '';
                        //Meter el JSON en la tabla de 'listado Presupuestos'       
                        tablaPedTotal += '<tr><td><div class="row"><div class="col-md-2"><div class="row"><div class="col-xs-3">'+ped.id_pedido+'</div><div class="col-xs-5 col-xs-offset-1">'+ped.fecha+'</div><div class="col-xs-3">'+ped.id_fra+'</div></div></div><div class="col-md-3"><div class="row"><div class="col-xs-6">'+ped.id_coche+'</div><div class="col-xs-6">'+ped.id_cliente+'</div></div></div><div class="col-md-3"><div class="row"><div class="col-xs-2">'+ped.total+'</div><div class="col-xs-4"><div style="text-align: center" class="btn-group"><button id="btn_editar_pedido" onClick="editarPedido()" type="button" class="btn-primary btn-xs" title="Editar"><span class="glyphicon glyphicon-pencil"></span></button><button type="button" class="btn-danger btn-xs" title="Eliminar" onClick="confirmar(4,'+ped.id_pedido+','+ped.id_cliente+')"><span class="glyphicon glyphicon-trash"></span></button></div></div><div class="col-xs-2"><div><label> <input type="checkbox" id="fra_env_'+ped.id_pedido+'" '+enviada+'></label></div></div><div class="col-xs-2"><input type="checkbox" '+internacional+' id="inter_'+ped.id_pedido+'"></div><div class="col-xs-2"><input type="checkbox" id="recog_'+ped.id_pedido+'" '+recogida+'></div></div></div><div class="col-md-3"><div class="row"><div class="col-xs-2"><input type="text" value="'+ped.fianza+'" id="fianza_'+ped.id_pedido+'"></div><div class="col-xs-2"><input type="text" value="'+ped.pagado+'" id="pagado_'+ped.id_pedido+'"></div><div class="col-xs-2"><input type="text"  value="'+ped.cambio+'" id="cambio_'+ped.id_pedido+'"></div><div class="col-xs-2"><input type="text" value="1" id="perdida_'+ped.id_pedido+'"></div><div class="col-xs-2"><input type="text" value="'+ped.beneficio+'" id="benef_'+ped.id_pedido+'"></div><div class="col-xs-2"><input type="checkbox" '+anulaciones+' id="anular_'+ped.id_pedido+'"></div></div></div><div class="col-md-1"><div class="row"><div class="col-xs-12"><button type="button" id="aplicar_'+ped.id_pedido+'" class="btn-primary btn-xs" onClick="aplicar_cambios('+ped.id_pedido+')">APLICAR</button></div></div></div></div></td></tr>';

                        });
                        $('#listadoPedTotal').html(tablaPedTotal); 
                    }
                });
            }
            break;
        case 6:
            console.log(pantalla);
            break;
        case 7:
            console.log(pantalla);
            //TODOLeer de localStorage
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
            console.log(pantalla);
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
    //total = parseInt(total);
    //id_cliente = cliente;
    $.ajax({
        url: urlListarPedidos,
        type: 'POST',
        data: {cliente: cliente},
        dataType: 'json',
        success:function(json){
            //console.log(json);
            //PEDIDOS 1ER TRIMESTRE
            $.each(json.Pedidos[0], function(i, ped){
                var enviada = ped.fra_env == 'S'? 'checked' : '';
                var internacional = ped.inter == 'S'? 'checked' : '';
                var recogida = ped.recog == 'S'? 'checked' : '';
                var anulaciones = ped.anul == 'S'? 'checked' : '';
                //Meter el JSON en la tabla de 'listado Presupuestos'       

                 tablaPedidos1 += '<tr><td><div class="row"><div class="col-md-2"><div class="row"><div class="col-xs-3">'+ped.id_pedido+'</div><div class="col-xs-5 col-xs-offset-1">'+ped.fecha+'</div><div class="col-xs-3">'+ped.id_fra+'</div></div></div><div class="col-md-3"><div class="row"><div class="col-xs-6">'+ped.id_coche+'</div><div class="col-xs-6">'+ped.id_cliente+'</div></div></div><div class="col-md-3"><div class="row"><div class="col-xs-2">'+ped.total+'</div><div class="col-xs-4"><div style="text-align: center" class="btn-group"><button id="btn_editar_pedido" onClick="editarPedido()" type="button" class="btn-primary btn-xs" title="Editar"><span class="glyphicon glyphicon-pencil"></span></button><button type="button" class="btn-danger btn-xs" title="Eliminar" onClick="confirmar(4,'+ped.id_pedido+','+ped.id_cliente+')"><span class="glyphicon glyphicon-trash"></span></button></div></div><div class="col-xs-2"><div><label> <input type="checkbox" id="fra_env_'+ped.id_pedido+'" '+enviada+'></label></div></div><div class="col-xs-2"><input type="checkbox" '+internacional+' id="inter_'+ped.id_pedido+'"></div><div class="col-xs-2"><input type="checkbox" id="recog_'+ped.id_pedido+'" '+recogida+'></div></div></div><div class="col-md-3"><div class="row"><div class="col-xs-2"><input type="text" value="'+ped.fianza+'" id="fianza_'+ped.id_pedido+'"></div><div class="col-xs-2"><input type="text" value="'+ped.pagado+'" id="pagado_'+ped.id_pedido+'"></div><div class="col-xs-2"><input type="text"  value="'+ped.cambio+'" id="cambio_'+ped.id_pedido+'"></div><div class="col-xs-2"><input type="text" value="1" id="perdida_'+ped.id_pedido+'"></div><div class="col-xs-2"><input type="text" value="'+ped.beneficio+'" id="benef_'+ped.id_pedido+'"></div><div class="col-xs-2"><input type="checkbox" '+anulaciones+' id="anular_'+ped.id_pedido+'"></div></div></div><div class="col-md-1"><div class="row"><div class="col-xs-12"><button type="button" id="aplicar_'+ped.id_pedido+'" class="btn-primary btn-xs" onClick="aplicar_cambios('+ped.id_pedido+')">APLICAR</button></div></div></div></div></td></tr>';

                 /*onClick="aplicar_cambios('+ped.id_pedido+',\''+ped.fra_env+'\',\''+ped.inter+'\',\''+ped.recog+'\','+$("#fianza_"+ped.id_pedido).val()+','+$("#pagado_"+ped.id_pedido).val()+','+$("#cambio_"+ped.id_pedido).val()+','+$("#benef_"+ped.id_pedido).val()+',\''+ped.anul+'\')"*/


                total+=parseInt(ped.total);
            });
            $('#total_TRI1').text(total +' €');
            $('#listadoPedidos1').html(tablaPedidos1);
            
            //PEDIDOS 2do TRIMESTRE
            total=0;
            $.each(json.Pedidos[1], function(i, ped){
                enviada = ped.fra_env == 'S'? 'checked' : '';
                internacional = ped.inter == 'S'? 'checked' : '';
                recogida = ped.recog == 'S'? 'checked' : '';
                anulaciones = ped.anul == 'S'? 'checked' : '';
                //Meter el JSON en la tabla de 'listado Presupuestos' 
                tablaPedidos2 += '<tr><td><div class="row"><div class="col-md-2"><div class="row"><div class="col-xs-3">'+ped.id_pedido+'</div><div class="col-xs-5 col-xs-offset-1">'+ped.fecha+'</div><div class="col-xs-3">'+ped.id_fra+'</div></div></div><div class="col-md-3"><div class="row"><div class="col-xs-6">'+ped.id_coche+'</div><div class="col-xs-6">'+ped.id_cliente+'</div></div></div><div class="col-md-3"><div class="row"><div class="col-xs-2">'+ped.total+'</div><div class="col-xs-4"><div style="text-align: center" class="btn-group"><button id="btn_editar_pedido" onClick="editarPedido()" type="button" class="btn-primary btn-xs" title="Editar"><span class="glyphicon glyphicon-pencil"></span></button><button type="button" class="btn-danger btn-xs" title="Eliminar" onClick="confirmar(4,'+ped.id_pedido+','+ped.id_cliente+')"><span class="glyphicon glyphicon-trash"></span></button></div></div><div class="col-xs-2"><div><label> <input type="checkbox" id="fra_env_'+ped.id_pedido+'" '+enviada+'></label></div></div><div class="col-xs-2"><input type="checkbox" '+internacional+' id="inter_'+ped.id_pedido+'"></div><div class="col-xs-2"><input type="checkbox" id="recog_'+ped.id_pedido+'" '+recogida+'></div></div></div><div class="col-md-3"><div class="row"><div class="col-xs-2"><input type="text" value="'+ped.fianza+'" id="fianza_'+ped.id_pedido+'"></div><div class="col-xs-2"><input type="text" value="'+ped.pagado+'" id="pagado_'+ped.id_pedido+'"></div><div class="col-xs-2"><input type="text"  value="'+ped.cambio+'" id="cambio_'+ped.id_pedido+'"></div><div class="col-xs-2"><input type="text" value="1" id="perdida_'+ped.id_pedido+'"></div><div class="col-xs-2"><input type="text" value="'+ped.beneficio+'" id="benef_'+ped.id_pedido+'"></div><div class="col-xs-2"><input type="checkbox" '+anulaciones+' id="anular_'+ped.id_pedido+'"></div></div></div><div class="col-md-1"><div class="row"><div class="col-xs-12"><button type="button" id="aplicar_'+ped.id_pedido+'" class="btn-primary btn-xs" onClick="aplicar_cambios('+ped.id_pedido+')">APLICAR</button></div></div></div></div></td></tr>';

                total+=parseInt(ped.total);
            });
            $('#total_TRI2').text(total +' €');
            $('#listadoPedidos2').html(tablaPedidos2);
            
            //PEDIDOS 3er TRIMESTRE
            total=0;
            $.each(json.Pedidos[2], function(i, ped){
                enviada = ped.fra_env == 'S'? 'checked' : '';
                internacional = ped.inter == 'S'? 'checked' : '';
                recogida = ped.recog == 'S'? 'checked' : '';
                anulaciones = ped.anul == 'S'? 'checked' : '';
            //Meter el JSON en la tabla de 'listado Presupuestos' 
            tablaPedidos3 += '<tr><td><div class="row"><div class="col-md-2"><div class="row"><div class="col-xs-3">'+ped.id_pedido+'</div><div class="col-xs-5 col-xs-offset-1">'+ped.fecha+'</div><div class="col-xs-3">'+ped.id_fra+'</div></div></div><div class="col-md-3"><div class="row"><div class="col-xs-6">'+ped.id_coche+'</div><div class="col-xs-6">'+ped.id_cliente+'</div></div></div><div class="col-md-3"><div class="row"><div class="col-xs-2">'+ped.total+'</div><div class="col-xs-4"><div style="text-align: center" class="btn-group"><button id="btn_editar_pedido" onClick="editarPedido()" type="button" class="btn-primary btn-xs" title="Editar"><span class="glyphicon glyphicon-pencil"></span></button><button type="button" class="btn-danger btn-xs" title="Eliminar" onClick="confirmar(4,'+ped.id_pedido+','+ped.id_cliente+')"><span class="glyphicon glyphicon-trash"></span></button></div></div><div class="col-xs-2"><div><label> <input type="checkbox" id="fra_env_'+ped.id_pedido+'" '+enviada+'></label></div></div><div class="col-xs-2"><input type="checkbox" '+internacional+' id="inter_'+ped.id_pedido+'"></div><div class="col-xs-2"><input type="checkbox" id="recog_'+ped.id_pedido+'" '+recogida+'></div></div></div><div class="col-md-3"><div class="row"><div class="col-xs-2"><input type="text" value="'+ped.fianza+'" id="fianza_'+ped.id_pedido+'"></div><div class="col-xs-2"><input type="text" value="'+ped.pagado+'" id="pagado_'+ped.id_pedido+'"></div><div class="col-xs-2"><input type="text"  value="'+ped.cambio+'" id="cambio_'+ped.id_pedido+'"></div><div class="col-xs-2"><input type="text" value="1" id="perdida_'+ped.id_pedido+'"></div><div class="col-xs-2"><input type="text" value="'+ped.beneficio+'" id="benef_'+ped.id_pedido+'"></div><div class="col-xs-2"><input type="checkbox" '+anulaciones+' id="anular_'+ped.id_pedido+'"></div></div></div><div class="col-md-1"><div class="row"><div class="col-xs-12"><button type="button" id="aplicar_'+ped.id_pedido+'" class="btn-primary btn-xs" onClick="aplicar_cambios('+ped.id_pedido+')">APLICAR</button></div></div></div></div></td></tr>';

                total+=parseInt(ped.total);
            });
            $('#total_TRI3').text(total +' €');
            $('#listadoPedidos3').html(tablaPedidos3);
            
            //PEDIDOS 4to TRIMESTRE
            total=0;
            $.each(json.Pedidos[3], function(i, ped){
                enviada = ped.fra_env == 'S'? 'checked' : '';
                internacional = ped.inter == 'S'? 'checked' : '';
                recogida = ped.recog == 'S'? 'checked' : '';
                anulaciones = ped.anul == 'S'? 'checked' : '';
            //Meter el JSON en la tabla de 'listado Presupuestos'       
            tablaPedidos4 += '<tr><td><div class="row"><div class="col-md-2"><div class="row"><div class="col-xs-3">'+ped.id_pedido+'</div><div class="col-xs-5 col-xs-offset-1">'+ped.fecha+'</div><div class="col-xs-3">'+ped.id_fra+'</div></div></div><div class="col-md-3"><div class="row"><div class="col-xs-6">'+ped.id_coche+'</div><div class="col-xs-6">'+ped.id_cliente+'</div></div></div><div class="col-md-3"><div class="row"><div class="col-xs-2">'+ped.total+'</div><div class="col-xs-4"><div style="text-align: center" class="btn-group"><button id="btn_editar_pedido" onClick="editarPedido()" type="button" class="btn-primary btn-xs" title="Editar"><span class="glyphicon glyphicon-pencil"></span></button><button type="button" class="btn-danger btn-xs" title="Eliminar" onClick="confirmar(4,'+ped.id_pedido+','+ped.id_cliente+')"><span class="glyphicon glyphicon-trash"></span></button></div></div><div class="col-xs-2"><div><label> <input type="checkbox" id="fra_env_'+ped.id_pedido+'" '+enviada+'></label></div></div><div class="col-xs-2"><input type="checkbox" '+internacional+' id="inter_'+ped.id_pedido+'"></div><div class="col-xs-2"><input type="checkbox" id="recog_'+ped.id_pedido+'" '+recogida+'></div></div></div><div class="col-md-3"><div class="row"><div class="col-xs-2"><input type="text" value="'+ped.fianza+'" id="fianza_'+ped.id_pedido+'"></div><div class="col-xs-2"><input type="text" value="'+ped.pagado+'" id="pagado_'+ped.id_pedido+'"></div><div class="col-xs-2"><input type="text"  value="'+ped.cambio+'" id="cambio_'+ped.id_pedido+'"></div><div class="col-xs-2"><input type="text" value="1" id="perdida_'+ped.id_pedido+'"></div><div class="col-xs-2"><input type="text" value="'+ped.beneficio+'" id="benef_'+ped.id_pedido+'"></div><div class="col-xs-2"><input type="checkbox" '+anulaciones+' id="anular_'+ped.id_pedido+'"></div></div></div><div class="col-md-1"><div class="row"><div class="col-xs-12"><button type="button" id="aplicar_'+ped.id_pedido+'" class="btn-primary btn-xs" onClick="aplicar_cambios('+ped.id_pedido+')">APLICAR</button></div></div></div></div></td></tr>';
                
                total+=parseInt(ped.total);
            });
            $('#total_TRI4').text(total +' €');
            $('#listadoPedidos4').html(tablaPedidos4);
            
            //PEDIDOS DE AÑOS NO EN CURSO
            $.each(json.Pedidos[4], function(i, ped){
                enviada = ped.fra_env == 'S'? 'checked' : '';
                internacional = ped.inter == 'S'? 'checked' : '';
                recogida = ped.recog == 'S'? 'checked' : '';
                anulaciones = ped.anul == 'S'? 'checked' : '';
            //Meter el JSON en la tabla de 'listado Presupuestos'  
            tablaPedTotal += '<tr><td><div class="row"><div class="col-md-2"><div class="row"><div class="col-xs-3">'+ped.id_pedido+'</div><div class="col-xs-5 col-xs-offset-1">'+ped.fecha+'</div><div class="col-xs-3">'+ped.id_fra+'</div></div></div><div class="col-md-3"><div class="row"><div class="col-xs-6">'+ped.id_coche+'</div><div class="col-xs-6">'+ped.id_cliente+'</div></div></div><div class="col-md-3"><div class="row"><div class="col-xs-2">'+ped.total+'</div><div class="col-xs-4"><div style="text-align: center" class="btn-group"><button id="btn_editar_pedido" onClick="editarPedido()" type="button" class="btn-primary btn-xs" title="Editar"><span class="glyphicon glyphicon-pencil"></span></button><button type="button" class="btn-danger btn-xs" title="Eliminar" onClick="confirmar(4,'+ped.id_pedido+','+ped.id_cliente+')"><span class="glyphicon glyphicon-trash"></span></button></div></div><div class="col-xs-2"><div><label> <input type="checkbox" id="fra_env_'+ped.id_pedido+'" '+enviada+'></label></div></div><div class="col-xs-2"><input type="checkbox" '+internacional+' id="inter_'+ped.id_pedido+'"></div><div class="col-xs-2"><input type="checkbox" id="recog_'+ped.id_pedido+'" '+recogida+'></div></div></div><div class="col-md-3"><div class="row"><div class="col-xs-2"><input type="text" value="'+ped.fianza+'" id="fianza_'+ped.id_pedido+'"></div><div class="col-xs-2"><input type="text" value="'+ped.pagado+'" id="pagado_'+ped.id_pedido+'"></div><div class="col-xs-2"><input type="text"  value="'+ped.cambio+'" id="cambio_'+ped.id_pedido+'"></div><div class="col-xs-2"><input type="text" value="1" id="perdida_'+ped.id_pedido+'"></div><div class="col-xs-2"><input type="text" value="'+ped.beneficio+'" id="benef_'+ped.id_pedido+'"></div><div class="col-xs-2"><input type="checkbox" '+anulaciones+' id="anular_'+ped.id_pedido+'"></div></div></div><div class="col-md-1"><div class="row"><div class="col-xs-12"><button type="button" id="aplicar_'+ped.id_pedido+'" class="btn-primary btn-xs" onClick="aplicar_cambios('+ped.id_pedido+')">APLICAR</button></div></div></div></div></td></tr>';     
                
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
                tablaPptos += '<tr><td>' + ppto.id_ppto + '</td><td>' + ppto.fecha + '</td><td>' + ppto.id_coche + '</td><td>' + ppto.id_coche + '</td><td>' + ppto.id_cliente + '</td><td>' + ppto.total + '</td><td style="text-align: center"><div class="btn-group"><button id="btn_editar_ppto_'+ppto.id_ppto+'" type="button" onclick="editarPpto('+ppto.id_ppto+')" class="btn-primary btn-sm" title="Editar"><span class="glyphicon glyphicon-pencil"></span></button><button type="button" class="btn-danger btn-sm" title="Eliminar" onClick="confirmar(2,'+ppto.id_ppto+','+ppto.id_cliente+')"><span class="glyphicon glyphicon-trash"></span></button></div></td></tr>';
            });
            $('#listadoPptos').html(tablaPptos);
        }
    });
}

function navegacion(){
    //Cargar la lista de clientes en la pantalla por defecto 'Listado Presupuestos'
    comboClientesPpto();
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
    });
    
    //EVENTOS. (Ejemplos de funciones anónimas
    submenu[0].onclick= function(){
        //Identifico la pantalla para el filtro del buscador y limpio éste
        pantalla=1;
        console.log(pantalla);
        $('#client_id').val('');
        nuevoCliente();
    };
    submenu[1].onclick= function(){
        //Identifico la pantalla para el filtro del buscador y limpio éste
        pantalla=2;
        console.log(pantalla);
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
        console.log(pantalla);
        $('#client_id').val('');
        //console.log('id_cliente antes de la f(x) listadoPptos: ', id_cliente);
        listadoPptos(id_cliente);
        
    };
    submenu[3].onclick= function(){
        //Identifico la pantalla para el filtro del buscador y limpio éste
        pantalla=4;
        console.log(pantalla);
        comboClientes();
        $("[id*=cambio]").val('0.65');
        comboClientesNewPpto();
        $('#client_id').val('');
        nuevoPpto();
        /*preCargarArticulos();
        $("#descripcion0").on("click", comboArticulos(0));
        $("#descripcion1").on("click", comboArticulos(1));*/
        /*$("#descripcion2").on("click", comboArticulos(preArticulos,2));*/
        /*$("#descripcion3").on("click", comboArticulos(3));*/
        // $("#descripcion4").on("click", comboArticulos(4));
        // $("#descripcion5").on("click", comboArticulos(5));
        // $("#descripcion6").on("click", comboArticulos(6));
        // $("#descripcion7").on("click", comboArticulos(7));
        // $("#descripcion8").on("click", comboArticulos(8));
        // $("#descripcion9").on("click", comboArticulos(9));
        
        //console.log('Pantalla 4');
        
    };
//  Listado de pedidos    
    submenu[4].onclick= function(){
        //Identifico la pantalla para el filtro del buscador y limpio éste
        pantalla=5;
        console.log(pantalla);
        comboClientesPed();
        $('#client_id').val('');
        listadoPed(id_cliente);
    };
//  Pedidos anul.    
    submenu[5].onclick= function(){
        //Identifico la pantalla para el filtro del buscador y limpio éste
        pantalla=6;
        console.log(pantalla);
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
        console.log(pantalla);
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
        console.log(pantalla);
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
    console.log('altaCliente');
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
        console.log('else');
        $.post(urlAltaCliente, $("#form_nuevo_cliente").serialize(), function(resp){
            alert('rest:' +resp);
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

    //Validar datos antes de llamr al Ajax
    if (!validar_guardar_ppto()){
        //TODO usar modales 
        alert ('Un presupuesto debe tener fecha, cliente, vehículo y al menos el primer artículo');
    }
    else{
        $('#form_newPpto').submit();
    }
}

function validar_guardar_ppto(){
    /*Validación del formulario del presupuesto
        PAra que la pantalla de ppto sea válida requerimos:
        Fecha, cliente, vehículo y al menos un artículo con mínimo descripción, referencia y precio/pvp */
    var ok = true;
    if ($('#fecha_newPpto').val()=='') {ok = false;}
    if ($('#cliente_newPpto').val()=='') {ok = false;}
    if ($('#vehiculo_newPpto').val()=='') {ok = false;}
    if ($('#descripcion0').val()=='') {ok = false;}
    /*if ($('#ref0').html()=='') {ok = false;}*/
    if ($('#uds0').val()=='') {ok = false;}
    if ($('#cambio0').val()=='') {ok = false;}
    /*if (($('#precio0').html()=='') && ($('#pvp0').val()=='')) {ok = false;}*/
    if (($('#precio0').val()=='') && ($('#pvp0').val()=='')) {ok = false;}
    /*if ($('#total0').html()=='') {ok = false;}*/

    if (ok){
        //pasarle el currencyFormat a todos los inputs que corresponda
        for (i = 0; i < 10; i++){
            $('#precio'+i).val(CurrencyFormat(parseFloat($('#precio'+i).val()),".",","));
            $('#cambio'+i).val(CurrencyFormat(parseFloat($('#cambio'+i).val()),".",","));
            $('#pvp'+i).val(CurrencyFormat(parseFloat($('#pvp'+i).val()),".",","));
            if ($('#total'+i).val()=='NaN,00'){
                alert('Por favor, expresa los decimales con un \'.\'')
            }
            $('#total'+i).val(CurrencyFormat(parseFloat($('#total'+i).val()),".",","));    
        }
    }

    return (ok);
}


function getDescripciones (fila){
    var min = 1; // min caracteres para buscar
    urlDescripciones = url.concat('getDescripciones.php');
    var keyword = $('#descripcion'+fila).val();
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
                /*$('#descripcion'+fila).val($(this).val());*/
            }
        });
    }
}


function getRefPVP (sp_title, fila){
    urlgetRefPvp = url.concat('getRefPvp.php');
    console.log('getRefPVP, this.value: '+sp_title);
    if (sp_title != '') {
        $.ajax({
            url: urlgetRefPvp,
            type: 'POST',   
            data: {sp_title: sp_title},
            dataType: 'json',
            success:function(json){
                if ((typeof json.pruebasBBDD[0] !== 'undefined') && json.pruebasBBDD[0]){
                    /*$('#ref'+fila).html(json.pruebasBBDD[0].part_number);
                    $('#precio'+fila).html(json.pruebasBBDD[0].gbp);*/
                    $('#ref'+fila).val(json.pruebasBBDD[0].part_number);
                    $('#precio'+fila).val(json.pruebasBBDD[0].gbp);
                    $('#uds'+fila).focus();
                }
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

function comboClientesNewPpto (){
    var urlcomboCliente = url.concat('listarClientes.php');
    $.ajax({
        url: urlcomboCliente,
        type: 'POST',
        //data: {keyword: keyword},
        dataType: 'json',
        success:function(json){
            var comboClientes = "<select id='selectClientes' onchange='copiarPpto(this.value)'><option value='0'>Selecciona cliente a quien copiar...</option>";
            $.each(json.Clientes, function(i, cliente){
                comboClientes += "<option value="+cliente.id_cliente+">"+cliente.nombre+"</option>";
            });
            comboClientes += "</select>";
            $('#selectClientes').html(comboClientes);
        }
    });
}

function comboClientes (){
    var urlcomboCliente = url.concat('listarClientes.php');
    $.ajax({
        url: urlcomboCliente,
        type: 'POST',
        //data: {keyword: keyword},
        dataType: 'json',
        success:function(json){
            var combo = '<select name="cliente_newPpto" id="cliente_newPpto" onchange="getVehiculos(this.vaue)" class="form-control"><option value="0">Cliente...</option>';
            $.each(json.Clientes, function(i, cliente){
                combo += "<option value="+cliente.id_cliente+">"+cliente.nombre+"</option>";
            });
            combo += "</select>";
            $('#cliente_newPpto').html(combo);
        }
    });
}

function getVehiculos(cliente){
    var urlCochesCliente = url.concat('cochesCliente.php');
    $.ajax({
        url: urlCochesCliente,
        type: 'POST',
        data: {cliente: cliente},
        dataType: 'json',
        success:function(json){
            var bastidor = '';
            var coches = '<select name="vehiculo_newPpto" id="vehiculo_newPpto" class="form-control" onchange="getBastidor(this.value)">';
            $.each(json.Coches, function(i, coche){
                if (i==0) {
                    bastidor = getBastidor(coche.id_coche);
                }
                coches += "<option value="+coche.id_coche+">"+coche.modelo+"</option>";
            });
            coches += "</select>";
            $('#vehiculo_newPpto').html(coches);
            $('#bastidor_newPpto').val(bastidor);
        }
    });
}

function getBastidor(id_vehiculo){
    var urlBastidor = url.concat('getBastidor.php');
    $.ajax({
        url: urlBastidor,
        type: 'POST',
        data: {id_vehiculo: id_vehiculo},
        //dataType: 'json',
        success:function(bastidor){
            $('#bastidor_newPpto').val(bastidor);
        }
    });
}

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
    $.post(urlEliminarPpto,{"id_ppto":id_ppto}, function(resp){
       if (resp == 1){
            //Tengo que distinguir aquí si el borrado viene de una lista filtrada por cliente o sin filtrar. Lo hago con la vble pantalla
            console.log('pantalla:' +pantalla);
            if (pantalla==2) {
                listar_pptos(idCli);
                console.log('Elimina presupuesto de la lista filtrada por cliente');
            }
            else {
                listar_pptos();
                console.log('Elimina presupuesto de la lista sin filtrar');
            } 
       }
       else{
           alert("Error al eliminar presupuesto");
       }
    });
}

function eliminarPed(id_ped, idCli){
    var urlEliminarPed = url.concat('eliminarPed.php');
    //Enviamos la id al PHP
    $.post(urlEliminarPed,{"id_ped":id_ped}, function(resp){
       if (resp == 1){
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
           listar_bbdd();
       }
       else{
           alert("Error al eliminar el artículo de la Base de Datos");
       }
    });    
}

function confirmar(cod, id, idCli) {
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

function aplicar_cambios(id_pedido){
    var fra_env, inter, recog, fianza, pagado, cambio, beneficio;
    //comprobar los valores antes de enviar al Ajax

    if ($("#fra_env_"+id_pedido).is(':checked')) fra_env = 'S'; else fra_env = 'N';
    if ($("#inter_"+id_pedido).is(':checked')) inter = 'S'; else inter = 'N';
    if ($("#recog_"+id_pedido).is(':checked')) recog = 'S'; else recog = 'N';

    fianza = $("#fianza_"+id_pedido).val();
    pagado = $("#pagado_"+id_pedido).val();
    cambio = $("#cambio_"+id_pedido).val();
    beneficio = $("#benef_"+id_pedido).val();

    var urlAplicarPedido = url.concat('aplicarPedido.php');
    $.ajax({
        type: "POST",
        url: urlAplicarPedido,
        data: { id_pedido: id_pedido,
                fra_env:  fra_env,
                inter:  inter,
                recog:  recog,
                fianza:  fianza,
                pagado:  pagado,
                cambio:  cambio,
                beneficio:  beneficio},
                //anul:  anul},  
        success: function(result)
        {
            console.log(result);
               
        }
    }); 
}

function cargarPpto(id_ppto){
    //console.log('En cargar Ppto');
    urlCargarPpto = url.concat('listarPresupuestos.php');
    $('#id_ppto').val(id_ppto);
    $.ajax({
        url: urlCargarPpto,
        type: 'POST',
        data: {id_ppto: id_ppto},
        dataType: 'json',
        success:function(json){
            $('#fecha_newPpto').val(json.Presupuestos[0].fecha);
            $('#cliente_newPpto').val(json.Presupuestos[0].id_cliente);
            $('#id_cliente').val(json.Presupuestos[0].clienteId);
            $('#vehiculo_newPpto').val(json.Presupuestos[0].id_coche);
            $('#transporte_newPpto').val(json.Presupuestos[0].transporte);
            //$('#asunto_newPpto').val(ppto.transporte);
            if (json.Presupuestos[0].canarias==1)
                $('#canarias_newPpto').prop("checked", "checked");
            else
                $('#canarias_newPpto').prop("checked", "");
            $('.subtotal').val(json.Presupuestos[0].subtotal+'€');
            $('.iva_newPpto').text(json.Presupuestos[0].iva+'%');
            $('.total').text(json.Presupuestos[0].total+'€');
            cargarArticulos(id_ppto);
        }
    });
}

function cargarArticulos(id_ppto){
    urlCargarArticulo = url.concat('cargarArticulos.php');
    $('#id_ppto').val(id_ppto);

    //limpiar los inputs antes de escribirlos con los valores recibidos
    for (i = 0; i < 10; i++){
        $('#descripcion'+i).val('');
        $('#ref'+i).val('');
        $('#precio'+i).val('');
        $('#uds'+i).val('');
        $('#cambio'+i).val('');
        $('#pvp'+i).val('');
        $('#dto'+i).val('');
        $('#total'+i).val('');    
    }

    $.ajax({
        url: urlCargarArticulo,
        type: 'POST',
        data: {id_ppto: id_ppto},
        dataType: 'json',
        success:function(json){
            $.each(json.Articulos, function(i, articulo){
                $('#descripcion'+i).val(json.Articulos[i].descripcion);
                $('#ref'+i).val(json.Articulos[i].referencia);
                $('#precio'+i).val(json.Articulos[i].uds);
                $('#uds'+i).val(CurrencyFormat(parseFloat(json.Articulos[i].precio),".",","));
                $('#cambio'+i).val(CurrencyFormat(parseFloat(json.Articulos[i].cambio),".",","));
                $('#pvp'+i).val(CurrencyFormat(parseFloat(json.Articulos[i].pvp),".",","));
                $('#dto'+i).val(json.Articulos[i].dto);
                $('#total'+i).val(CurrencyFormat(parseFloat(json.Articulos[i].total),".",","));
            });
        }
    });
}

/*function formato_decimal($valor) {
    $resultado = str_replace(".","",$valor);    //eliminamos el punto de los millares
    $resultado = str_replace(",",".",$resultado);   //sustituimos la coma decimal por el punto
    return $resultado;
}*/

function CurrencyFormat(number, decimalcharacter, thousandseparater)
{
    var decimalplaces = 2;
    number = parseFloat(number);
    var sign = number < 0 ? "-" : "";
    var formatted = new String(number.toFixed(decimalplaces));
    if (decimalcharacter.length && decimalcharacter != ".") {
        formatted = formatted.replace(/\./, decimalcharacter);
    }
    var integer = "";
    var fraction = "";
    var strnumber = new String(formatted);
    var dotpos = decimalcharacter.length ? strnumber.indexOf(decimalcharacter) : -1;
    if (dotpos > -1)
    {
        if (dotpos) {
            integer = strnumber.substr(0, dotpos);
        }
        fraction = strnumber.substr(dotpos + 1);
    }
    else {
        integer = strnumber;
    }
    if (integer) {
        integer = String(Math.abs(integer));
    }
    while (fraction.length < decimalplaces) {
        fraction += "0";
    }
    temparray = new Array();
    while (integer.length > 3)
    {
        temparray.unshift(integer.substr(-3));
        integer = integer.substr(0, integer.length - 3);
    }
    temparray.unshift(integer);
    integer = temparray.join(thousandseparater);
    return sign + integer + decimalcharacter + fraction;
}

function calcularTotal (uds, fila){
    subtotal = $('#precio'+fila).val()*$('#cambio'+fila).val()*$('#uds'+fila).val();
    descuento = ($('#precio'+fila).val()*$('#dto'+fila).val())/100;
    /*subtotal = $('#precio'+fila).html()*$('#cambio'+fila).val()*$('#uds'+fila).val();
    descuento = ($('#precio'+fila).html()*$('#dto'+fila).val())/100;*/
    

    if ($('#pvp'+fila).val() == ""){
        //TOTAL = (PRECIO * CAMBIO  - (PRECIO * DTO)/100 ) * UNIDADES
        $('#total'+fila).val(CurrencyFormat(((($('#precio'+fila).val()*$('#cambio'+fila).val()))-(($('#precio'+fila).val()*$('#dto'+fila).val())/100))*$('#uds'+fila).val(),',','.'));
        /*$('#total'+fila).html(CurrencyFormat(((($('#precio'+fila).html()*$('#cambio'+fila).val()))-(($('#precio'+fila).html()*$('#dto'+fila).val())/100))*$('#uds'+fila).val(),',','.'));*/
    }
    else{
        $('#total'+fila).val(CurrencyFormat(((($('#pvp'+fila).val()*$('#cambio'+fila).val()))-(($('#pvp'+fila).val()*$('#dto'+fila).val())/100))*$('#uds'+fila).val(),',','.'));
        /*$('#total'+fila).html(CurrencyFormat(((($('#pvp'+fila).val()*$('#cambio'+fila).val()))-(($('#pvp'+fila).val()*$('#dto'+fila).val())/100))*$('#uds'+fila).val(),',','.'));*/
    } 
}


function calcularSubtotal(){
    var subtotal = 0;
    var totalTotal = 0;
    for (i=0; i<10; i++){
        if ($('#descripcion'+i).val()!=''){
            /*subtotal = subtotal + parseFloat($('#total'+i).text().replace(',', '.'));*/
            subtotal = subtotal + parseFloat($('#total'+i).val().replace(',', '.'));
        }
    }
    /*$('#subtotal').html(CurrencyFormat(parseFloat(subtotal),".",","));*/
    $('#subtotal').val(CurrencyFormat(parseFloat(subtotal),".",","));
    calcularTotalTotal(subtotal);
}

function calcularTotalTotal(subtotal){
    console.log('calcularTotalTotal, subtotal: '+subtotal);
    console.log('iva marcado: '+$('#iva_newPpto').val());
    $('#iva_newPpto').val() == '' ? totalTotal = subtotal*1.21 : totalTotal = subtotal * (1+($('#iva_newPpto').val()/100));
    $('#totalTotal').val(CurrencyFormat(parseFloat(totalTotal),".",","));
}


// function getArticulos(){
//     if (window.localStorage){
//         console.log('getArticulos');
//         id_bbdd = [];
//         title = [];
//         gbp = [];
//         urlBbdd = url.concat('bbdd.php');
//         $.ajax({
//             url: urlBbdd,
//             type: 'POST',
//             dataType: 'json',
//             success:function(json){
//                 $.each(json.Piezas, function(i, bbdd){
//                     id_bbdd.push(bbdd.id_bbdd);
//                     title.push(bbdd.title);
//                 });
//                 console.log('ls cargado');
//                 localStorage.setItem('id_bbdd', JSON.stringify(id_bbdd));    
//                 localStorage.setItem('title', JSON.stringify(title));
//                 console.log('ls cargado');
//              }
//         });
//     }
//     else{
//         alert('Este programa necesita localStorage');
//     }
//     // title = JSON.parse(localStorage.getItem('title'));
//     // console.log(title[0]);
// }
    

/*function preCargarArticulos(){
    console.log('preCargarArticulos');
    id_bbdd = JSON.parse(localStorage.getItem('id_bbdd'));
    title =  JSON.parse(localStorage.getItem('title'));
    for (i = 0; i<=id_bbdd.length; i++) {
        preArticulos += "<option value="+id_bbdd[i]+">"+title[i]+"</option>";
    }
    console.log('preCargarArticulos FIN');
}


function comboArticulos(id){
    console.log('comboArticulos FIN');

    var combo = '<select name="descripcion[]" id="descripcion'+id+'" onchange="getRefPVP(this.value, '+id+')" class="form-control descripcion"><option value="0">Artículo...</option>';
    combo = combo + preArticulos + "</select>";
    $('#descripcion'+id).html(combo);    
    console.log('comboArticulos FIN');
}*/


