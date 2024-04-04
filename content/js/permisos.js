
document.getElementById("nuevo_usuario").onclick = function () {
  limpiar();
  $("#accion").val("registrar");
  $("#enviar_usuario").text("Registrar");
  $("#gestion-usuario").modal("show");
};

document.getElementById("nuevo_rol").onclick = function () {
  limpiar();
  $("#accion").val("registrar");
  $("#enviar_rol").text("Registrar");
  $("#gestion-rol").modal("show");
};

/*--------------------FIN DE CRUD DEL MODULO----------------------*/

/*-------------------FUNCIONES DE HERRAMIENTAS-------------------*/

function limpiar() {
  $("#nombre").val("");
  $("#clave").val("");
  $("#correo").val("");
  $("#telefono").val("");
  document.getElementById("snombre_rol").innerText = "";
  document.getElementById("sclave").innerText = "";
  document.getElementById("scorreo").innerText = "";
  document.getElementById("stelefono").innerText = "";
}


function cargar_datos(valor, modulo) {
  var datos = new FormData();
  datos.append("accion", "editar");
  datos.append("id", valor);
  mostrar(datos, modulo);
}




$(document).ready(function() {
  $('#nombre_rol').attr('maxlength', 20);
  $('#nombre_rol').on('keyup', function() {
    validarNombreR();
  }).on('keypress', function(event) {
      validarEntrada(event, /^[A-Za-z\b\u00f1\u00d1\u00E0-\u00FC]*$/);
  });

  $('#enviar_rol').on('click', function() {
      if (validarCamposRol()) {
        var datos = new FormData();
        datos.append("accion", $("#accion").val());
        datos.append("id", $("#id").val());
        datos.append("nombre", $("#nombre_rol").val());
        enviaAjax(datos, 'roles');
      }
  });
});


function validarEntrada(event, regex) {
  var tecla = String.fromCharCode(event.which);
  if (!regex.test(tecla)) {
      event.preventDefault();
  }
}

function validarNombreR() {
  var nombre_rol = $('#nombre_rol');
  var nombre_rolRegex = /^[a-zA-ZáéíóúÁÉÍÓÚüÜñÑ\s']+$/u;

  if (nombre_rol.val().trim() === '' || !nombre_rolRegex.test(nombre_rol.val())) {
    nombre_rol.addClass('error-input');
    $('#snombre_rol').addClass('error-message').text('El rol ingresado no es válido');
  } else {
    nombre_rol.removeClass('error-input');
    $('#snombre_rol').removeClass('error-message').text('');
  }
}


function validarCamposRol() {
validarNombreR();

var mensajeError = '';

if ($("#snombre_rol").text() !== '') {
  mensajeError += $("#snombre_rol").text();
  $('#nombre_rol').focus();
}

if (mensajeError !== '') {
  Swal.fire({
      icon: 'error',
      title: 'Error de validación',
      html: mensajeError
  });
  return false;
} else {
  return true;
}
}

/*--------------------Validacion de usuario--------------------- */

$(document).ready(function() {

  $('#nombre').attr('maxlength', 40);
  $('#nombre').on('keyup', function() {
    validarNombre();
  }).on('keypress', function(event) {
      validarEntrada(event, /^[^\d]$/);
  });

  $('#clave').attr('maxlength', 40);
  $('#clave').on('keyup', function() {
    validarclave();
  }).on('keypress', function(event) {
      validarEntrada(event, /^[^\d]$/);
  });

  $('#correo').attr('maxlength', 40);
  $('#correo').on('keyup', function() {
    validarcorreo();
  }).on('keypress', function(event) {
      validarEntrada(event, /^[^\d]$/);
  });


  $('#telefono').attr('maxlength', 11);
  $('#telefono').on('keyup', function() {
    validartelefono();
  }).on('keypress', function(event) {
      validarEntrada(event, /^\d$/);
  });

  $('#enviar_usuario').on('click', function() {
      if (validarCamposProveedor()) {
        var datos = new FormData();
        datos.append("accion", $("#accion").val());
        datos.append("id", $("#id").val());
        datos.append("nombre", $("#nombre").val());
        datos.append("clave", $("#clave").val());
        datos.append("correo", $("#correo").val());
        datos.append("telefono", $("#telefono").val());
        enviaAjax(datos, 'usuarios');
      }
  });
});


function validarEntrada(event, regex) {
  var tecla = String.fromCharCode(event.which);
  if (!regex.test(tecla)) {
      event.preventDefault();
  }
}

function validarNombre() {
  var nombre = $('#nombre');
  var nombreRegex = /^[a-zA-ZáéíóúÁÉÍÓÚüÜñÑ\s']+$/u;

  if (nombre.val().trim() === '' || !nombreRegex.test(nombre.val())) {
    nombre.addClass('error-input');
    $('#snombre').addClass('error-message').text('El nombre o apellido ingresado no es válido');
  } else {
    nombre.removeClass('error-input');
    $('#snombre').removeClass('error-message').text('');
  }
}

function validarclave() {
  var clave = $('#clave');
  var claveRegex = /.*/;

  if (clave.val().trim() === '' || !claveRegex.test(clave.val())) {
    clave.addClass('error-input');
    $('#sclave').addClass('error-message').text('la clave ingresado no es válido');
  } else {
    clave.removeClass('error-input');
    $('#sclave').removeClass('error-message').text('');
  }
}

function validarcorreo() {
  var correo = $('#correo');
  var correoRegex = /^[a-zA-Z0-9._%+-]+@[a-zA-Z0-9.-]+\.[a-zA-Z]{2,}$/;

  if (correo.val().trim() === '' || !correoRegex.test(correo.val())) {
    correo.addClass('error-input');
    $('#scorreo').addClass('error-message').text('La dirección de correo electrónico no es válida');
  } else {
    correo.removeClass('error-input');
    $('#scorreo').removeClass('error-message').text('');
  }
}

function validartelefono() {
  var telefono = $('#telefono');
  var telefonoRegex = /^[0-9]{11}$/;

  if (telefono.val().trim() === '' || !telefonoRegex.test(telefono.val())) {
      telefono.addClass('error-input');
      $('#stelefono').addClass('error-message').text('Número de teléfono inválido. Ejemplos válidos: "04121234567" (celular) o "02121234567" (Cantv).');
  } else {
      telefono.removeClass('error-input');
      $('#stelefono').removeClass('error-message').text('');
  }
}

function validarCamposProveedor() {
validarNombre();
validarclave();
validarcorreo();
validartelefono();

var mensajeError = '';

if ($("#snombre").text() !== '') {
  mensajeError += $("#snombre").text();
  $('#nombre').focus();
}else if ($("#sclave").text() !== '') {
mensajeError += $("#sclave").text();
$('#clave').focus();
}else if ($("#scorreo").text() !== '') {
  mensajeError += $("#scorreo").text();
  $('#correo').focus();
}else if ($("#stelefono").text() !== '') {
  mensajeError += $("#stelefono").text();
  $('#telefono').focus();
}

if (mensajeError !== '') {
  Swal.fire({
      icon: 'error',
      title: 'Error de validación',
      html: mensajeError
  });
  return false;
} else {
  return true;
}
}

/*-------------------FIN DE FUNCIONES DE HERRAMIENTAS-------------------*/

/*--------------------FUNCIONES CON AJAX----------------------*/
function eliminar(id, modulo) {
  Swal.fire({
    title: "¿Está seguro de eliminar el registro?",
    text: "¡No podrás revertir esto!",
    icon: "warning",
    showCloseButton: true,
    showCancelButton: true,
    confirmButtonColor: "#0C72C4",
    cancelButtonColor: "#9D2323",
    confirmButtonText: "Confirmar",
    cancelButtonText: "Cancelar",
  }).then((result) => {
    if (result.isConfirmed) {
      setTimeout(function () {
        var datos = new FormData();
        datos.append("accion", "eliminar");
        datos.append("id", id);
        enviaAjax(datos, modulo);
      }, 10);
    }
  });
}

function enviaAjax(datos, modulo) {
  var toastMixin = Swal.mixin({
    showConfirmButton: false,
    width: 450,
    padding: '3.5em',
    timer: 2000,
    timerProgressBar: true,
  });
  $.ajax({
    url: modulo,
    type: "POST",
    contentType: false,
    data: datos,
    processData: false,
    cache: false,
    success: (response) => {
      var res = JSON.parse(response);
      //alert(res.title);
      if (res.estatus == 1) {
        toastMixin.fire({

          title: res.title,
          text: res.message,
          icon: res.icon,
        });
        limpiar();
        setTimeout(function () {
          window.location.reload();
        }, 2000);
      } else {
        toastMixin.fire({

          text: res.message,
          title: res.title,
          icon: res.icon,
        });
      }
    },
    error: (err) => {
      Toast.fire({
        icon: res.error,
      });
    },
  });
}

function mostrar(datos, modulo) {
  $.ajax({
    async: true,
    url: modulo,
    type: "POST",
    contentType: false,
    data: datos,
    processData: false,
    cache: false,
    success: (response) => {
      var res = JSON.parse(response);
      limpiar();
      if(modulo == 'usuarios'){
        $("#id").val(res.id);
        $("#nombre").val(res.nombres);
        $("#clave").val(res.clave);
        $("#correo").val(res.correo);
        $("#telefono").val(res.telefono);
        $("#enviar_usuario").text("Modificar");
        $("#gestion-usuario").modal("show");
        $("#accion").val("modificar");
        document.getElementById("accion").innerText = "modificar";
      }
      if(modulo == 'roles'){
        $("#id").val(res.id);
        $("#nombre_rol").val(res.nombre_rol);
        $("#enviar_rol").text("Modificar");
        $("#gestion-rol").modal("show");
        $("#accion").val("modificar");
        document.getElementById("accion").innerText = "modificar";
      }

      
    },
    error: (err) => {
      Toast.fire({
        icon: error.icon,
      });
    },
  });
}

