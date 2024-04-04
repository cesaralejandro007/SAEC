
document.getElementById("nuevo").onclick = function () {
  limpiar();
  $("#accion").val("registrar");
  $("#enviar_receta").text("Registrar");
  $("#gestion").modal("show");
};

/*--------------------FIN DE CRUD DEL MODULO----------------------*/

/*-------------------FUNCIONES DE HERRAMIENTAS-------------------*/

function limpiar() {
  $("#nombre").val("");
  $("#abreviatura").val("");
  document.getElementById("snombre").innerText = "";
  document.getElementById("sabreviatura").innerText = "";
}


function cargar_datos(valor, modulo) {
  var datos = new FormData();
  datos.append("accion", "editar");
  datos.append("id", valor);
  mostrar(datos, modulo);
}




$(document).ready(function() {
  $('#nombre').attr('maxlength', 50);
  $('#nombre').on('keyup', function() {
    validarNombreR();
  }).on('keypress', function(event) {
      validarEntrada(event, /^[A-Za-z\b\u00f1\u00d1\u00E0-\u00FC]*$/);
  });
  $('#abreviatura').attr('maxlength', 11);
  $('#abreviatura').on('keyup', function() {
    validarabreviatura();
  }).on('keypress', function(event) {
      validarEntrada(event, /^[A-Za-z,.\b\u00f1\u00d1\u00E0-\u00FC]*$/);
  });

  $('#enviar').on('click', function() {
      if (validarCamposCaracteristica()) {
        var datos = new FormData();
        datos.append("accion", $("#accion").val());
        datos.append("id", $("#id").val());
        datos.append("nombre", $("#nombre").val());
        datos.append("abreviatura", $("#abreviatura").val());
        enviaAjax(datos, 'caracteristica');
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
  var nombre = $('#nombre');
  var nombreRegex = /^[a-zA-ZáéíóúÁÉÍÓÚüÜñÑ\s']+$/u;

  if (nombre.val().trim() === '' || !nombreRegex.test(nombre.val())) {
    nombre.addClass('error-input');
    $('#snombre').addClass('error-message').text('El nombre ingresado no es válido');
  } else {
    nombre.removeClass('error-input');
    $('#snombre').removeClass('error-message').text('');
  }
}

function validarabreviatura() {
  var abreviatura = $('#abreviatura');
  var abreviaturaRegex = /^[a-zA-ZáéíóúÁÉÍÓÚüÜñÑ.,\s']+$/u;

  if (abreviatura.val().trim() === '' || !abreviaturaRegex.test(abreviatura.val())) {
    abreviatura.addClass('error-input');
    $('#sabreviatura').addClass('error-message').text('La abreviatura ingresada no es válido');
  } else {
    abreviatura.removeClass('error-input');
    $('#sabreviatura').removeClass('error-message').text('');
  }
}



function validarCamposCaracteristica() {
validarNombreR();
validarabreviatura();

var mensajeError = '';

if ($("#snombre").text() !== '') {
  mensajeError += $("#snombre").text();
  $('#nombre').focus();
} else if ($("#sabreviatura").text() !== '') {
  mensajeError += $("#sabreviatura").text();
  $('#abreviatura').focus();
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
    url: caracteristica,
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
        $("#abreviatura").val(res.abreviatura);
        $("#enviar_receta").text("Modificar");
        $("#gestion").modal("show");
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

