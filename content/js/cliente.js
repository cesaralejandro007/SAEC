
document.getElementById("nuevo").onclick = function () {
  limpiar();
  $("#accion").val("registrar");
  $("#enviar").text("Registrar");
  $("#gestion").modal("show");
};

/*--------------------FIN DE CRUD DEL MODULO----------------------*/

/*-------------------FUNCIONES DE HERRAMIENTAS-------------------*/

function limpiar() {
  $("#nombre").val("");
  $("#direccion").val("");
  $("#telefono").val("");
  document.getElementById("snombre").innerText = "";
  document.getElementById("sdireccion").innerText = "";
  document.getElementById("stelefono").innerText = "";
}


function cargar_datos(valor, modulo) {
  var datos = new FormData();
  datos.append("accion", "editar");
  datos.append("id", valor);
  mostrar(datos, modulo);
}


/*--------------------Validacion de cliente--------------------- */

$(document).ready(function() {
  $('#cedula').attr('maxlength', 8);
  $('#cedula').on('keyup', function() {
    validarIdentificacion();
  }).on('keypress', function(event) {
      validarEntrada(event, /^\d$/);
  });
  $('#nombre').attr('maxlength', 40);
  $('#nombre').on('keyup', function() {
    validarNombre();
  }).on('keypress', function(event) {
      validarEntrada(event, /^[^\d]$/);
  });
  $('#direccion').attr('maxlength', 200);
  $('#direccion').on('keyup', function() {
    validardireccion();
  });
  $('#telefono').attr('maxlength', 11);
  $('#telefono').on('keyup', function() {
    validartelefono();
  }).on('keypress', function(event) {
      validarEntrada(event, /^\d$/);
  });

  $('#enviar_cliente').on('click', function() {
      if (validarCamposProveedor()) {
        var datos = new FormData();
        datos.append("accion", $("#accion").val());
        datos.append("id", $("#id").val());
        datos.append("nombre", $("#nombre").val());
        datos.append("cedula", $("#cedula").val());
        datos.append("direccion", $("#direccion").val());
        datos.append("telefono", $("#telefono").val());
        enviaAjax(datos, 'cliente');
      }
  });
});


function validarEntrada(event, regex) {
  var tecla = String.fromCharCode(event.which);
  if (!regex.test(tecla)) {
      event.preventDefault();
  }
}

function validarIdentificacion() {
  var cedula = $('#cedula');
  var IdentificacionRegex = /^\d{7,8}-?\d$/;

  if (cedula.val().trim() === '' || !IdentificacionRegex.test(cedula.val())) {
    cedula.addClass('error-input');
    $('#scedula').addClass('error-message').text('La cédula ingresada no es válida');
  } else {
    cedula.removeClass('error-input');
    $('#scedula').removeClass('error-message').text('');
  }
}

function validarNombre() {
  var nombre = $('#nombre');
  var nombreRegex = /^[a-zA-ZáéíóúÁÉÍÓÚüÜñÑ\s']+$/u;

  if (nombre.val().trim() === '' || !nombreRegex.test(nombre.val())) {
    nombre.addClass('error-input');
    $('#snombre').addClass('error-message').text('El Nombre o Razón Social ingresado no es válido');
  } else {
    nombre.removeClass('error-input');
    $('#snombre').removeClass('error-message').text('');
  }
}

function validardireccion() {
  var direccion = $('#direccion');
  var direccionRegex = /^[a-zA-Z0-9\s.,#áéíóúÁÉÍÓÚüÜñÑ-]+$/;

  if (direccion.val().trim() === '' || !direccionRegex.test(direccion.val())) {
      direccion.addClass('error-input');
      $('#sdireccion').addClass('error-message').text('La dirección ingresada no es válida.');
  } else {
      direccion.removeClass('error-input');
      $('#sdireccion').removeClass('error-message').text('');
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
validarIdentificacion();
validarNombre();
validardireccion();
validartelefono();

var mensajeError = '';

if ($("#scedula").text() !== '') {
  mensajeError += $("#scedula").text();
  $('#cedula').focus();
} else if ($("#snombre").text() !== '') {
  mensajeError += $("#snombre").text();
  $('#nombre').focus();
}else if ($("#sdireccion").text() !== '') {
mensajeError += $("#sdireccion").text();
$('#direccion').focus();
} else if ($("#stelefono").text() !== '') {
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

function mostrar(datos) {
  $.ajax({
    async: true,
    url: proveedores,
    type: "POST",
    contentType: false,
    data: datos,
    processData: false,
    cache: false,
    success: (response) => {
        var res = JSON.parse(response);
        limpiar();
        $("#id").val(res.id);
        $("#nombre").val(res.nombres);
        $("#direccion").val(res.direccion);
        $("#telefono").val(res.telefono);
        $("#enviar").text("Modificar");
        $("#gestio").modal("show");
        $("#accion").val("modificar");
        document.getElementById("accion").innerText = "modificar";
    },
    error: (err) => {
        Toast.fire({
            icon: error.icon,
        });
    },
  });
}

