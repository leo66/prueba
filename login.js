$(document).ready(function(){
    $("#errorMsg").hide();
    $("#btnLogin").click(function(){
        var usu = $("#txt_usuario").val();
        var pass = $("#txt_clave").val();
        $.post("server/login.php",{ usu : usu, pass : pass},function(respuesta){
            if (respuesta == true) {
                $.mobile.changePage("Home.php");
            }
            else{
                $.mobile.changePage('#pageError', 'pop', true, true);
                /*$("#errorMsg").fadeIn(300);
                $("#errorMsg").css("display", "block");*/
            }
        });
    });
});