window.onload = main;

var contenedor;
//var consola;
var posXinicial; //posición inicial al hacer touch


function main(){
    //BOtones
    var submenu = document.getElementsByClassName('col');
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
        contenedor.style.left = "0";
        $("#buscador_cli").hide();
        submenu[0].className="col activo";
        submenu[1].className="col";
        submenu[2].className="col";
        submenu[3].className="col";
        submenu[4].className="col";
        submenu[5].className="col";
        submenu[6].className="col";
    };
    submenu[1].onclick= function(){
        contenedor.style.left = "-100%";
        $("#buscador_cli").show();
        submenu[0].className="col";
        submenu[1].className="col activo";
        submenu[2].className="col";
        submenu[3].className="col";
        submenu[4].className="col";
        submenu[5].className="col";
        submenu[6].className="col";
    };
    submenu[2].onclick= function(){
        contenedor.style.left = "-200%";
        $("#buscador_cli").hide();
        submenu[0].className="col";
        submenu[1].className="col";
        submenu[2].className="col activo";
        submenu[3].className="col";
        submenu[4].className="col";
        submenu[5].className="col";
        submenu[6].className="col";
    };
    submenu[3].onclick= function(){
        contenedor.style.left = "-300%";
        $("#buscador_cli").hide();
        submenu[0].className="col";
        submenu[1].className="col";
        submenu[2].className="col";
        submenu[3].className="col activo";
        submenu[4].className="col";
        submenu[5].className="col";
        submenu[6].className="col";
    };
    submenu[4].onclick= function(){
        contenedor.style.left = "-400%";
        $("#buscador_cli").hide();
        submenu[0].className="col";
        submenu[1].className="col";
        submenu[2].className="col";
        submenu[3].className="col";
        submenu[4].className="col activo";
        submenu[5].className="col";
        submenu[6].className="col";
    };
    submenu[5].onclick= function(){
        contenedor.style.left = "-500%";
        $("#buscador_cli").hide();
        submenu[0].className="col";
        submenu[1].className="col";
        submenu[2].className="col";
        submenu[3].className="col";
        submenu[4].className="col";
        submenu[5].className="col activo";
        submenu[6].className="col";
    };
    submenu[6].onclick= function(){
        contenedor.style.left = "-600%";
        $("#buscador_cli").hide();
        submenu[0].className="col";
        submenu[1].className="col";
        submenu[2].className="col";
        submenu[3].className="col";
        submenu[4].className="col";
        submenu[5].className="col";
        submenu[6].className="col activo";
    };
}

//function mover(){
//    console.log("Entra en mover");
//    contadorMove++;
//    if (contadorMove>=8){
//        alert("Accion");
//        contadorMove = 0;
//    }
//}

