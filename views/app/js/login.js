function goLogin(){
var connect, form, response, result, user, pass, sesion;
user = __('user_login').value;
pass = __('pass_login').value;
sesion = __('session_login').checked ? true : false;
// en form vamos a poner las variables que le vamos a enviar a Ajax.
// lo haremos como si tratara de un envio POST por la URL pero se hara por GET y estos datos se envian
// de forma encriptada (se ve mas abajo en connect.open, connect.setRequestHeader y connect.send)
form = 'user=' + user + '&pass=' + pass + '&sesion=' + sesion;
// la coneccion entre Ajax y el servidor. Existen dos maneras o protocolos
// que son los que estan en amarillo dependiendo del navegador que estemos utilizando
// asi que para que funcione 100% la comunicacion entre Ajax y el servidor
// le pregunto al navegador cual protocolo de comunicacion este utiliza.
connect = window.XMLHttpRequest ? new XMLHttpRequest() : new ActiveXObject('Microsoft.XMLHTTP');

// evento que se dispara cada vez que hay un movimiento en Ajax
// (cuando se pide o se recibe algo del servidor)
connect.onreadystatechange = function () {
  // este if quiere decir "Si ya tenemos los datos de vuelta del servidor y
  // se encuentra la pagina ajax.php?mode=login" que de no ser asi daria error 404"
    if (connect.readyState == 4 && connect.status == 200) {
      if (connect.responseText == 1) {
        result  =  '<div class="alert alert-dismissible alert-success">';
        result +=  '<button type="button" class="close" data-dismiss="alert">&times;</button>';
        result +=  '<h4>Conectado</h4>';
        result +=  '<p><strong>Todo ok, te encontre en la BD. Ahora te estoy redireccionando...</strong></p>';
        result +=  '</div>';
        __('_AJAX_LOGIN_').innerHTML = result;
        // una vez que el usuario se logee la pagina se recarga
        // asi se mantiene donde mismo estaba caundo se legeo
        location.reload();
      } else {
        // Quiere decir que ocurrio algun error PHP, contraseña incorrecta ect...
        __('_AJAX_LOGIN_').innerHTML = connect.responseText;
      }

    } else if(connect.readyState != 4 ){

    result  =  '<div class="alert alert-dismissible alert-warning">';
    result +=  '<button type="button" class="close" data-dismiss="alert">&times;</button>';
    result +=  '<h4>Procesando...</h4>';
    result +=  '<p><strong>Estoy intentando logearte... pero aun no tengo los datos de vuelta</strong></p>';
    result +=  '</div>';
    __('_AJAX_LOGIN_').innerHTML = result;
    }
   }
  connect.open('POST', 'ajax.php?mode=login', true);
  // esto es para decir que los datos que va a enviar Ajax hacia el servidor
  // en forma de URL se va a realizar de forma cifrada
  connect.setRequestHeader('Content-Type', 'application/x-www-form-urlencoded');
  connect.send(form);
}

// funcion para saber si el usuario estando en el formulario presiona la tecla Enter
function runScriptLogin(tecla){
  // notacion Assci, el numero 13 es la Tecla ENTER
  if (tecla.keyCode == 13) {
    goLogin();
  } else {

  }
}
