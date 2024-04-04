
document.getElementById("nuevo").onclick = function () {
  limpiar();
  $("#accion").val("registrar");
  $("#enviar_costo").text("Registrar");
  $("#gestion").modal("show");
};

/*--------------------FIN DE CRUD DEL MODULO----------------------*/

/*-------------------FUNCIONES DE HERRAMIENTAS-------------------*/

function limpiar() {
  $("#fecha").val("");
  $("#id_tipo").val("");
  document.getElementById("sfecha").innerText = "";
  document.getElementById("sid_tipo").innerText = "";
}


function cargar_datos(valor, modulo) {
  var datos = new FormData();
  datos.append("accion", "editar");
  datos.append("id", valor);
  mostrar(datos, modulo);
}



/*----------------------Validacion de Costo fijo--------------------------*/



$(document).ready(function() {
  $('#fecha').on('keyup', function() {
    validarFecha();
  }).on('keypress', function(event) {
      validarEntrada(event, /^\d$/);
  });

  $('#id_tipo').on('change', function() {
    validarid_tipo();
  });
  
  $('#descripcion_costo').attr('maxlength', 200);
  $('#descripcion_costo').on('keyup', function() {
    validardescripcion_costo();
  });

  $('#cantidad').attr('maxlength', 11);
  $('#cantidad').on('keyup', function() {
    validarcantidad();
  }).on('keypress', function(event) {
      validarEntrada(event, /^\d$/);
  });

  $('#precio_costo').attr('maxlength', 11);
  $('#precio_costo').on('keyup', function() {
    validarprecio_costo();
  }).on('keypress', function(event) {
      validarEntrada(event, /^\d$/);
  });


  $('#enviar_costo').on('click', function() {
      if (validarCamposCosto()) {
        var datos = new FormData();
        datos.append("accion", $("#accion_costo_fijo").val());
        datos.append("id", $("#id_costo_fijo").val());
        datos.append("fecha", $("#fecha").val());
        datos.append("id_tipo", $("#id_tipo").val());
        datos.append("descripcion_costo", $("#descripcion_costo").val());
        datos.append("cantidad", $("#cantidad").val());
        datos.append("precio_costo", $("#precio_costo").val());
        enviaAjax(datos, 'costo');
      }
  });
});


function validarEntrada(event, regex) {
  var tecla = String.fromCharCode(event.which);
  if (!regex.test(tecla)) {
      event.preventDefault();
  }
}

function validarFecha() {
  var fecha = $('#fecha');
  var fechaRegex = /^\d{4}-\d{2}-\d{2}$/;

  if (fecha.val().trim() === '' || !fechaRegex.test(fecha.val())) {
      fecha.addClass('error-input');
      $('#sfecha').addClass('error-message').text('Por favor, ingrese una fecha válida (formato: DD-MM-YYYY)');
  } else {
      fecha.removeClass('error-input');
      $('#sfecha').removeClass('error-message').text('');
  }
}

function validarid_tipo() {
  var id_tipo = $('#id_tipo');
  if (id_tipo.val() == null) {
    id_tipo.addClass('error-input');
      $('#sid_tipo').addClass('error-message').text('Por favor, seleccione una caracteristica');
  } else {
    id_tipo.removeClass('error-input');
      $('#sid_tipo').removeClass('error-message').text('');
  }
}
function validardescripcion_costo() {
  var descripcion_costo = $('#descripcion_costo');
  var descripcion_costoRegex = /^[a-zA-Z0-9\s.,#áéíóúÁÉÍÓÚüÜñÑ-]+$/;

  if (descripcion_costo.val().trim() === '' || !descripcion_costoRegex.test(descripcion_costo.val())) {
      descripcion_costo.addClass('error-input');
      $('#sdescripcion_costo').addClass('error-message').text('La descripción ingresada no es válida.');
  } else {
      descripcion_costo.removeClass('error-input');
      $('#sdescripcion_costo').removeClass('error-message').text('');
  }
}

function validarcantidad() {
  var cantidad = $('#cantidad');
  var cantidadRegex = /^[0-9]*$/;

  if (cantidad.val().trim() === '' || !cantidadRegex.test(cantidad.val())) {
    cantidad.addClass('error-input');
    $('#scantidad').addClass('error-message').text('El dato ingresado no es válido');
  } else {
    cantidad.removeClass('error-input');
    $('#scantidad').removeClass('error-message').text('');
  }
}

function validarprecio_costo() {
  var precio_costo = $('#precio_costo');
  var precio_costoRegex = /^[0-9]*$/;

  if (precio_costo.val().trim() === '' || !precio_costoRegex.test(precio_costo.val())) {
    precio_costo.addClass('error-input');
    $('#sprecio_costo').addClass('error-message').text('El dato ingresado no es válido');
  } else {
    precio_costo.removeClass('error-input');
    $('#sprecio_costo').removeClass('error-message').text('');
  }
}


function validarCamposCosto() {
validarFecha();
validarid_tipo();
validardescripcion_costo();
validarcantidad();
validarprecio_costo();

var mensajeError = '';

if ($("#sfecha").text() !== '') {
  mensajeError += $("#sfecha").text();
  $('#fecha').focus();
}else if ($("#sid_tipo").text() !== '') {
  mensajeError += $("#sid_tipo").text();
  $('#id_tipo').focus();
}else if ($("#sdescripcion_costo").text() !== '') {
  mensajeError += $("#sdescripcion_costo").text();
  $('#descripcion_costo').focus();
}else if ($("#scantidad").text() !== '') {
mensajeError += $("#scantidad").text();
$('#cantidad').focus();
} else if ($("#sprecio_costo").text() !== '') {
  mensajeError += $("#sprecio_costo").text();
  $('#precio_costo').focus();
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
        $("#fecha").val(res.fechas);
        $("#id_tipo").val(res.id_tipo);
        $("#enviar_costo").text("Modificar");
        $("#gestion").modal("show");
        $("#accion").val("modificar");
        document.getElementById("accion_costo_fijo").innerText = "modificar";
    },
    error: (err) => {
        Toast.fire({
            icon: error.icon,
        });
    },
  });
}

