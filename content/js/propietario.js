document.getElementById("enviar").onclick = function () {
    var datos = new FormData();
    datos.append("accion", $("#accion").val());
    datos.append("id", $("#id").val());
    datos.append("nombre", $("#nombre").val());
    datos.append("correo", $("#correo").val());
    datos.append("telefono", $("#telefono").val());
    enviaAjax(datos);
};

document.getElementById("nuevo").onclick = function () {
  limpiar();
  $("#accion").val("registrar");
  $("#enviar").text("Registrar");
  $("#gestion-propietario").modal("show");
};

/*--------------------FIN DE CRUD DEL MODULO----------------------*/

/*-------------------FUNCIONES DE HERRAMIENTAS-------------------*/

function limpiar() {
  $("#nombre").val("");
  $("#correo").val("");
  $("#telefono").val("");
  document.getElementById("snombre").innerText = "";
  document.getElementById("scorreo").innerText = "";
  document.getElementById("stelefono").innerText = "";
}


function cargar_datos(valor) {
  var datos = new FormData();
  datos.append("accion", "editar");
  datos.append("id", valor);
  mostrar(datos);
}


/*-------------------FIN DE FUNCIONES DE HERRAMIENTAS-------------------*/

/*--------------------FUNCIONES CON AJAX----------------------*/
function eliminar(id) {
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
        enviaAjax(datos);
      }, 10);
    }
  });
}

function enviaAjax(datos) {
  var toastMixin = Swal.mixin({
    showConfirmButton: false,
    width: 450,
    padding: '3.5em',
    timer: 2000,
    timerProgressBar: true,
  });
  $.ajax({
    url: "usuario",
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
    url: "usuario",
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
      $("#correo").val(res.correo);
      $("#telefono").val(res.telefono);
      $("#enviar").text("Modificar");
      $("#gestion-propietario").modal("show");
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