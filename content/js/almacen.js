/*document.getElementById("enviar_materia").onclick = function () {
    var datos = new FormData();
    datos.append("accion", $("#accion").val());
    datos.append("id", $("#id").val());
    datos.append("nombre", $("#nombre").val());
    datos.append("correo", $("#correo").val());
    datos.append("telefono", $("#telefono").val());
    enviaAjax(datos, 'materias');
};

document.getElementById("enviar_proveedor").onclick = function () {
    var datos = new FormData();
    datos.append("accion", $("#accion").val());
    datos.append("id", $("#id").val());
    datos.append("nombre", $("#nombre_proveedor").val());
    enviaAjax(datos, 'proveedor');
};*/

document.getElementById("nueva_materia").onclick = function () {
  //limpiar();
  $("#accion").val("registrar");
  $("#enviar_materia").text("Registrar");
  $("#gestion-materia").modal("show");
};

document.getElementById("nueva_compra").onclick = function () {
    //limpiar();
    $("#accion").val("registrar");
    $("#enviar_compra").text("Registrar");
    $("#gestion-compra").modal("show");
  };

document.getElementById("nuevo_proveedor").onclick = function () {
  //limpiar();
  $("#accion").val("registrar");
  $("#enviar_proveedor").text("Registrar");
  $("#gestion-proveedor").modal("show");
};

/*--------------------FIN DE CRUD DEL MODULO----------------------*/

/*-------------------FUNCIONES DE HERRAMIENTAS-------------------*/

/*function limpiar() {
  $("#nombre").val("");
  $("#correo").val("");
  $("#telefono").val("");
  document.getElementById("snombre").innerText = "";
  document.getElementById("scorreo").innerText = "";
  document.getElementById("stelefono").innerText = "";
}*/


function cargar_datos(valor, modulo) {
  var datos = new FormData();
  datos.append("accion", "editar");
  datos.append("id", valor);
  mostrar(datos, modulo);
}


/*--------------------Validacion de Inventario--------------------- */

$(document).ready(function() {
  $('#nombre_materia').attr('maxlength', 40);
  $('#nombre_materia').on('keyup', function() {
    validarNombre_materia();
  }).on('keypress', function(event) {
      validarEntrada(event, /^[A-Za-z\b\u00f1\u00d1\u00E0-\u00FC]*$/);
  });
  
  $('#caracteristica').on('change', function() {
    validarCaracteristica();
  });

  $('#cantidad').attr('maxlength', 11);
  $('#cantidad').on('keyup', function() {
    validarcantidad();
  }).on('keypress', function(event) {
    validarEntrada(event, /^\d$/);
  });

  $('#stock_min').attr('maxlength', 11);
  $('#stock_min').on('keyup', function() {
    validarstock_min();
  }).on('keypress', function(event) {
      validarEntrada(event, /^\d$/);
  });

  $('#stock_max').attr('maxlength', 11);
  $('#stock_max').on('keyup', function() {
    validarstock_max();
  }).on('keypress', function(event) {
      validarEntrada(event, /^\d$/);
  });

  $('#status').on('change', function() {
    validarStatus();
  });

  $('#enviar_materia').on('click', function() {
      if (validarCamposInventario()) {
        var datos = new FormData();
        datos.append("accion", $("#accion_inventario").val());
        datos.append("nombre_materia", $("#nombre_materia").val());
        datos.append("caracteristica", $("#caracteristica").val());
        datos.append("cantidad", $("#cantidad").val());
        datos.append("stock_min", $("#stock_min").val());
        datos.append("stock_max", $("#stock_max").val());
        datos.append("status", $("#status").val());
        enviaAjax(datos, 'almacen');
      }
  });
});


function validarEntrada(event, regex) {
  var tecla = String.fromCharCode(event.which);
  if (!regex.test(tecla)) {
      event.preventDefault();
  }
}

function validarNombre_materia() {
  var nombre_materia = $('#nombre_materia');
  var Nombre_materiaRegex = /^[a-zA-ZáéíóúÁÉÍÓÚüÜñÑ\s']+$/u;

  if (nombre_materia.val().trim() === '' || !Nombre_materiaRegex.test(nombre_materia.val())) {
    nombre_materia.addClass('error-input');
    $('#snombre_materia').addClass('error-message').text('El nombre ingresado no es válida');
  } else {
    nombre_materia.removeClass('error-input');
    $('#snombre_materia').removeClass('error-message').text('');
  }
}

function validarCaracteristica() {
  var caracteristica = $('#caracteristica');
  if (caracteristica.val() == null) {
    caracteristica.addClass('error-input');
      $('#scaracteristica').addClass('error-message').text('Por favor, seleccione una caracteristica');
  } else {
    caracteristica.removeClass('error-input');
      $('#scaracteristica').removeClass('error-message').text('');
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


function validarstock_min() {
  var stock_min = $('#stock_min');
  var stock_minRegex = /^[0-9]*$/;

  if (stock_min.val().trim() === '' || !stock_minRegex.test(stock_min.val())) {
    stock_min.addClass('error-input');
    $('#sstock_min').addClass('error-message').text('El dato ingresado no es válido');
  } else {
    stock_min.removeClass('error-input');
    $('#sstock_min').removeClass('error-message').text('');
  }
}


function validarstock_max() {
  var stock_max = $('#stock_max');
  var stock_maxRegex = /^[0-9]*$/;

  if (stock_max.val().trim() === '' || !stock_maxRegex.test(stock_max.val())) {
    stock_max.addClass('error-input');
    $('#sstock_max').addClass('error-message').text('El dato ingresado no es válido');
  } else {
    stock_max.removeClass('error-input');
    $('#sstock_max').removeClass('error-message').text('');
  }
}

function validarStatus() {
  var status = $('#status');
  if (status.val() == null) {
    status.addClass('error-input');
      $('#sstatus').addClass('error-message').text('Por favor, seleccione un status');
  } else {
    status.removeClass('error-input');
      $('#sstatus').removeClass('error-message').text('');
  }
}

function validarCamposInventario() {
validarNombre_materia();
validarCaracteristica();
validarcantidad();
validarstock_min();
validarstock_max();
validarStatus();
var mensajeError = '';

if ($("#snombre_materia").text() !== '') {
  mensajeError += $("#snombre_materia").text();
  $('#nombre_materia').focus();
} else if ($("#scaracteristica").text() !== '') {
  mensajeError += $("#scaracteristica").text();
  $('#caracteristica').focus();
}else if ($("#scantidad").text() !== '') {
mensajeError += $("#scantidad").text();
$('#cantidad').focus();
}else if ($("#sstock_min").text() !== '') {
  mensajeError += $("#sstock_min").text();
  $('#stock_min').focus();
}else if ($("#sstock_max").text() !== '') {
  mensajeError += $("#sstock_max").text();
  $('#stock_max').focus();
}
else if ($("#sstatus").text() !== '') {
  mensajeError += $("#sstatus").text();
  $('#status').focus();
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

/*--------------------Validacion de compras--------------------- */

$(document).ready(function() {

  $('#fecha').on('keyup', function() {
    validarFecha();
  }).on('keypress', function(event) {
      validarEntrada(event, /^\d$/);
  });

  $('#idproveedor').on('change', function() {
    validaridproveedor();
  });

  $('#enviar_compra').on('click', function() {
      if (validarCamposCompra()) {
        var datos = new FormData();
        datos.append("accion", $("#accion_compra").val());
        datos.append("fecha", $("#fecha").val());
        datos.append("idproveedor", $("#idproveedor").val());
        enviaAjax(datos, 'almacen');
      }
  });
});


function validarEntrada(event, regex) {
  var tecla = String.fromCharCode(event.which);
  if (!regex.test(tecla)) {
      event.preventDefault();
  }
}


function validaridproveedor() {
  var idproveedor = $('#idproveedor');

  if (idproveedor.val() == null) {
    $('.select2-container').addClass('error-input');
      $('#sidproveedor').addClass('error-message').text('Por favor, seleccione un proveedor');
  } else {
    $('.select2-container').removeClass('error-input');
      $('#sidproveedor').removeClass('error-message').text('');
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

function validarCamposCompra() {
validaridproveedor();
validarFecha();

var mensajeError = '';

if ($("#sfecha").text() !== '') {
  mensajeError += $("#sfecha").text();
  $('#fecha').focus();
} else if ($("#sidproveedor").text() !== '') {
  mensajeError += $("#sidproveedor").text();
  $('#idproveedor').focus();
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


/*--------------------Validacion de proveedores--------------------- */

$(document).ready(function() {
  $('#cedula').attr('maxlength', 8);
  $('#cedula').on('keyup', function() {
    validarIdentificacion();
  }).on('keypress', function(event) {
      validarEntrada(event, /^\d$/);
  });
  $('#nombre_proveedor').attr('maxlength', 40);
  $('#nombre_proveedor').on('keyup', function() {
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

  $('#enviar_proveedor').on('click', function() {
      if (validarCamposProveedor()) {
        var datos = new FormData();
        datos.append("accion", $("#accion_proveedor").val());
        datos.append("id", $("#id_proveedor").val());
        datos.append("cedula", $("#cedula").val());
        datos.append("nombre", $("#nombre_proveedor").val());
        datos.append("direccion", $("#direccion").val());
        datos.append("telefono", $("#telefono").val());
        enviaAjax(datos, 'proveedor');
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
  var nombre_proveedor = $('#nombre_proveedor');
  var nombre_proveedorRegex = /^[a-zA-ZáéíóúÁÉÍÓÚüÜñÑ\s']+$/u;

  if (nombre_proveedor.val().trim() === '' || !nombre_proveedorRegex.test(nombre_proveedor.val())) {
    nombre_proveedor.addClass('error-input');
    $('#snombre_proveedor').addClass('error-message').text('El Nombre o Razón Social ingresado no es válido');
  } else {
    nombre_proveedor.removeClass('error-input');
    $('#snombre_proveedor').removeClass('error-message').text('');
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
} else if ($("#snombre_proveedor").text() !== '') {
  mensajeError += $("#snombre_proveedor").text();
  $('#nombre_proveedor').focus();
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

/*function mostrar(datos, modulo) {
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
      if(modulo == 'materias'){
        $("#id").val(res.id);
        $("#nombre").val(res.nombres);
        $("#correo").val(res.correo);
        $("#telefono").val(res.telefono);
        $("#enviar_materia").text("Modificar");
        $("#gestion-materia").modal("show");
        $("#accion").val("modificar");
        document.getElementById("accion").innerText = "modificar";
      }
      if(modulo == 'proveedor'){
        $("#id").val(res.id);
        $("#nombre_proveedor").val(res.nombre);
        $("#enviar_proveedor").text("Modificar");
        $("#gestion-proveedor").modal("show");
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

*/