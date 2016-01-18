$(document).ready(main);

//El pronlema en la visualización es que el append de $fixedHeader agrega el html de todos los header de todas las tablas de los distintos apartados. Hay que hacerlo por identificacores en lugar de por clases

function main(){
    var tableOffset = $(".cabecera_fija").offset().top;
    var $header = $(".cabecera_fija > thead").clone();
    var $fixedHeader = $(".header-fixed").append($header);

    $(window).bind("scroll", function() {
        var offset = $(this).scrollTop();

        if (offset >= tableOffset && $fixedHeader.is(":hidden")) {
            $fixedHeader.show();
            console.log('1');
        }
        else if (offset < tableOffset) {
            $fixedHeader.hide();
            console.log('2');
        }
    });
}








  