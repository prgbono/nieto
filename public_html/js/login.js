
$(document).ready(main);

var url = "http://localhost:8888/nietoBack/login.php";

function main(){
    $("#btn_login").on("click", login);
}    

function login(){
    $.post(url,$("form").serialize(),function(resp){
        if(resp==-1){
            alert('Usuario y/o contraseña incorrecto');
        }else{
            console.log('OK')
            window.location = "http://localhost:8888/nieto/public_html/index.php";
        }
    });
}