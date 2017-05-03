function goReg(){
var connect, form, response, result, user_reg, pass_reg, pass_reg_dos, email_reg, tyc_reg;
user_reg = __('user_reg').value;
pass_reg = __('pass_reg').value;
pass_reg_dos = __('pass_reg_dos').value;
email_reg = __('email_reg').value;
tyc_reg = __('tyc_reg').checked ? true : false;

if (tyc_reg == true) {
  if (user_reg != '' && pass_reg != '' && pass_reg_dos != '' && email_reg != '') {
     if (pass_reg == pass_reg_dos) {
      // A este punto quiere decir que introdujo todos los datos y acepto las condiciones
      form = 'user=' + user_reg + '&pass=' + pass_reg + '&email=' + email_reg;
      connect = window.XMLHttpRequest ? new XMLHttpRequest() : new ActiveXObject('Microsoft.XMLHTTP');

      connect.onreadystatechange = function () {
          if (connect.readyState == 4 && connect.status == 200) {
            if (connect.responseText == 1) {
              result  =  '<div class="alert alert-dismissible alert-success">';
              result +=  '<button type="button" class="close" data-dismiss="alert">&times;</button>';
              result +=  '<h4>Registro Satisfactorio</h4>';
              result +=  '<p><strong>Te estoy redireccionando...</strong></p>';
              result +=  '</div>';
              __('_AJAX_REG_').innerHTML = result;
              location.reload();
            } else {
              // Si aparecen errores como Email ya ocupado etc. Se muestran en este ajax de aqui
              __('_AJAX_REG_').innerHTML = connect.responseText;
            }

          } else if(connect.readyState != 4 ){

          result  =  '<div class="alert alert-dismissible alert-warning">';
          result +=  '<button type="button" class="close" data-dismiss="alert">&times;</button>';
          result +=  '<h4>Procesando...</h4>';
          result +=  '<p><strong>Estamos procesando tu registro, relaxxxx...</strong></p>';
          result +=  '</div>';
          __('_AJAX_REG_').innerHTML = result;
          }
         }
        // el connect.open me direcciona al fichero ajax.php y el mode=reg quiere decir que
        // voy a ir al case 'reg' en el switch. pq en el pregunto vienes al fichero ajax.php
        // para hacer un login o un registro.
        connect.open('POST', 'ajax.php?mode=reg', true);
        connect.setRequestHeader('Content-Type', 'application/x-www-form-urlencoded');
        connect.send(form);
     }else {
       result  =  '<div class="alert alert-dismissible alert-danger">';
       result +=  '<button type="button" class="close" data-dismiss="alert">&times;</button>';
       result +=  '<h4>ERROR</h4>';
       result +=  '<p><strong>Tus contrasenas no coinciden!!</strong></p>';
       result +=  '</div>';
       __('_AJAX_REG_').innerHTML = result;
     }
  } else {
    result  =  '<div class="alert alert-dismissible alert-danger">';
    result +=  '<button type="button" class="close" data-dismiss="alert">&times;</button>';
    result +=  '<h4>ERROR</h4>';
    result +=  '<p><strong>Tienes que rellenar todos los campos.</strong></p>';
    result +=  '</div>';
    __('_AJAX_REG_').innerHTML = result;
  }
} else {
  result  =  '<div class="alert alert-dismissible alert-danger">';
  result +=  '<button type="button" class="close" data-dismiss="alert">&times;</button>';
  result +=  '<h4>ERROR</h4>';
  result +=  '<p><strong>Los terminos y condiciones deben ser aceptados</strong></p>';
  result +=  '</div>';
  __('_AJAX_REG_').innerHTML = result;
}

}

// funcion para saber si el usuario estando en el formulario presiona la tecla Enter
function runScriptReg(tecla){
  // notacion Assci, el numero 13 es la Tecla ENTER
  if (tecla.keyCode == 13) {
    goReg();
  } else {

  }
}
