function goLostpass(){
var connect, form, response, result, email;
email = __('email_lostpass').value;
// vamos a comprobar aqui mismo para variar un poquito y esperar a hacerlo en el goLostpass.php
// si no esta vacio el campo
if (email!= '') {
  form = 'email=' + email;
  connect = window.XMLHttpRequest ? new XMLHttpRequest() : new ActiveXObject('Microsoft.XMLHTTP');
  connect.onreadystatechange = function () {

      if (connect.readyState == 4 && connect.status == 200) {
        if (connect.responseText == 1) {
          result  =  '<div class="alert alert-dismissible alert-success">';
          result +=  '<button type="button" class="close" data-dismiss="alert">&times;</button>';
          result +=  '<h4>Te envie un correo!</h4>';
          result +=  '<p><strong>Abre tu correo y haz click en el enlace</strong></p>';
          result +=  '</div>';
          __('_AJAX_LOSTPASS_').innerHTML = result;
          location.reload();
        } else {
          __('_AJAX_LOSTPASS_').innerHTML = connect.responseText;
        }

      } else if(connect.readyState != 4 ){

      result  =  '<div class="alert alert-dismissible alert-warning">';
      result +=  '<button type="button" class="close" data-dismiss="alert">&times;</button>';
      result +=  '<h4>Procesando...</h4>';
      result +=  '<p><strong>Estamos procesando la informacion...</strong></p>';
      result +=  '</div>';
      __('_AJAX_LOSTPASS_').innerHTML = result;
      }
     }
    connect.open('POST', 'ajax.php?mode=lostpass', true);
    connect.setRequestHeader('Content-Type', 'application/x-www-form-urlencoded');
    connect.send(form);
} else {
  result  =  '<div class="alert alert-dismissible alert-danger">';
  result +=  '<button type="button" class="close" data-dismiss="alert">&times;</button>';
  result +=  '<h4>Error!</h4>';
  result +=  '<p><strong>El campo de emial esta vacio, debes llenarlo</strong></p>';
  result +=  '</div>';
  __('_AJAX_LOSTPASS_').innerHTML = result;
 }

}


function runScriptLostpass(tecla){
  if (tecla.keyCode == 13) {
    goLostpass();
  } else {

  }
}
