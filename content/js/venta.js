listar_clientes();
listar_ventas();

document.getElementById("nueva_receta").onclick = function () {
    var datos = new FormData();
		datos.append('accion','listadorecetas'); 
    enviaAjax(datos, 'receta');

  };
  
  function nuevo_cliente() {
    $("#accion_cliente").val("registrar");
    $("#enviar_cliente").text("Registrar");
    $("#gestion-cliente").modal("show");
  };

  function listar_clientes() {
    var datos = new FormData();
		datos.append('accion','listarclientes'); 
    enviaAjax(datos, 'cliente');
  };

  function listar_ventas() {
    var datos = new FormData();
		datos.append('accion','listado_ventas'); 
    enviaAjax(datos, 'venta');
  };

  function ver_ingredientes(id_receta) {
    var datos = new FormData();
		datos.append('accion','listado_ingredientes'); 
    datos.append('id_receta', id_receta); 
    enviaAjax(datos, 'receta');
  };
 
  
  function cargar_datos(valor, modulo) {
    var datos = new FormData();
    datos.append("accion", "editar");
    datos.append("id", valor);
    mostrar(datos, modulo);
  }


$(document).ready(function() {
    // Configuración para el campo 'fecha'
    $('#fecha').on('keyup', function() {
        validarFecha();
    }).on('keypress', function(event) {
        validarEntrada(event, /^\d$/);
    });

    // Configuración para el campo 'listado_clientes'
    $('#listado_clientes').on('change', function() {
        validarCliente();
    });

    // Configuración para el campo 'observacion'
    $('#observacion').attr('maxlength', 200);
    $('#observacion').on('keyup', function() {
        validarObservacion();
    });

    // Configuración del botón de enviar
    $('#enviar').on('click', function() {
        if (validarCampos()) {
            // Aquí puedes agregar el código para enviar el formulario si pasa la validación
            Swal.fire({
                icon: 'success',
                title: 'Formulario enviado correctamente',
                showConfirmButton: false,
                timer: 1500
            });
        }
    });
});

// Función para validar la entrada basada en una expresión regular
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

function validarCliente() {
  var cliente = $('#listado_clientes');

  if (cliente.val() == null) {
    $('.select2-container').addClass('error-input');
      $('#slistado_clientes').addClass('error-message').text('Por favor, seleccione un cliente');
  } else {
    $('.select2-container').removeClass('error-input');
      $('#slistado_clientes').removeClass('error-message').text('');
  }
}

function validarObservacion() {
  var observacion = $('#observacion');

  if (observacion.val().trim() === '') {
      observacion.addClass('error-input');
      $('#sobservacion').addClass('error-message').text('Por favor, ingrese una observación');
  } else {
      observacion.removeClass('error-input');
      $('#sobservacion').removeClass('error-message').text('');
  }
}

function validarCampos() {
  validarFecha();
  validarCliente();
  validarObservacion();

  var mensajeError = '';

  if ($("#sfecha").text() !== '') {
      mensajeError += $("#sfecha").text();
      $('#fecha').focus();
  } else if ($("#slistado_clientes").text() !== '') {
      mensajeError += $("#slistado_clientes").text();
      $('#listado_clientes').focus();
  } else if ($("#detalledeventa tr").length === 0) {
      mensajeError += 'No hay registros en la tabla de detalles de venta.<br>';
      $('#detalledeventa').focus();
  } else if ($("#sobservacion").text() !== '') {
      mensajeError += $("#sobservacion").text();
      $('#observacion').focus();
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


/*----------------------Validacion de usuario--------------------------*/



$(document).ready(function() {
    $('#identificacion').attr('maxlength', 8);
    $('#identificacion').on('keyup', function() {
      validarIdentificacion();
    }).on('keypress', function(event) {
        validarEntrada(event, /^\d$/);
    });
    $('#nombre_cliente').attr('maxlength', 40);
    $('#nombre_cliente').on('keyup', function() {
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
        if (validarCamposCliente()) {
          var datos = new FormData();
          datos.append("accion", $("#accion_cliente").val());
          datos.append("id", $("#id_cliente").val());
          datos.append("nombre", $("#nombre_cliente").val());
          datos.append("direccion", $("#direccion").val());
          datos.append("telefono", $("#telefono").val());
          datos.append("identificacion", $("#identificacion").val());
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
    var identificacion = $('#identificacion');
    var IdentificacionRegex = /^\d{7,8}-?\d$/;

    if (identificacion.val().trim() === '' || !IdentificacionRegex.test(identificacion.val())) {
      identificacion.addClass('error-input');
      $('#sidentificacion').addClass('error-message').text('La cédula ingresada no es válida');
    } else {
      identificacion.removeClass('error-input');
      $('#sidentificacion').removeClass('error-message').text('');
    }
}

function validarNombre() {
    var nombre_cliente = $('#nombre_cliente');
    var nombre_clienteRegex = /^[a-zA-ZáéíóúÁÉÍÓÚüÜñÑ\s']+$/u;

    if (nombre_cliente.val().trim() === '' || !nombre_clienteRegex.test(nombre_cliente.val())) {
      nombre_cliente.addClass('error-input');
      $('#snombre_cliente').addClass('error-message').text('El nombre o apellido ingresado no es válido');
    } else {
      nombre_cliente.removeClass('error-input');
      $('#snombre_cliente').removeClass('error-message').text('');
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

function validarCamposCliente() {
  validarIdentificacion();
  validarNombre();
  validardireccion();
  validartelefono();

var mensajeError = '';

if ($("#sidentificacion").text() !== '') {
    mensajeError += $("#sidentificacion").text();
    $('#identificacion').focus();
} else if ($("#snombre_cliente").text() !== '') {
    mensajeError += $("#snombre_cliente").text();
    $('#nombre_cliente').focus();
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
        //Peticion de registrar nuevo cliente
        if (res.resultado == 'registrar_cliente') {
          if (res.estatus == 1) {
            toastMixin.fire({
              title: res.title,
              text: res.message,
              icon: res.icon,
            });
            //limpiar();
            listar_clientes();
            setTimeout(function () {
              $("#gestion-cliente").modal("hide");
            }, 2000);
          } else {
            toastMixin.fire({
    
              text: res.message,
              title: res.title,
              icon: res.icon,
            });
          }
        }
        else
        //Peticion para listar en el select los clientes
        if(res.resultado == "listarclientes"){
          $("#listado_clientes").html(res.mensaje);
        } 
        else
        //Peticion para listar los ingredientes de su respectiva receta
        if(res.resultado == "listado_ingredientes"){
          $("#ingredientes").html(res.mensaje);
          $("#gestion-ingredientes").modal("show");
        } 
        else    
        //Perticion para listar las recetas que existen    
        if(res.resultado == "listadorecetas"){
          $("#listadorecetas").html(res.mensaje);
          $("#accion").val("registrar");
          $("#enviar_receta").text("Registrar");
          $("#gestion-receta").modal("show");
        }
        else    
        //Perticion para listar las recetas que existen    
        if(res.resultado == "listado_ventas"){
          $("#listado_ventas").html(res.mensaje);
        }
      },
      error: (err) => {
        Toast.fire({
          icon: res.error,
        });
      },
    });
  }



  //funcion para colocar los productos
function colocaproducto(linea){
	var id = $(linea).find("td:eq(0)").text();
	var encontro = false;
	
	$("#detalledeventa tr").each(function(){
		if(id*1 == $(this).find("td:eq(0)").text()*1){
			encontro = true;
			var t = $(this).find("td:eq(2)").children();
			t.val(t.val()*1+1);
			modificasubtotal(t);
		} 
	});
	
	if(!encontro){
		var l = `
		  <tr>

		   <td style="display:none">
			   <input type="text" name="idp[]" style="display:none"
			   value="`+
					$(linea).find("td:eq(0)").text()+
			   `"/>`+	
					$(linea).find("td:eq(0)").text()+
		   `</td>
		   <td>`+
					$(linea).find("td:eq(1)").text()+
		   `</td>

		 	<td>
		      <input type="text" value="1" name="cant[]" onkeyup="modificasubtotal(this)"/>
		    </td>
		    <td>
		       <input type="text" value="`+
           $(linea).find("td:eq(2)").text()+
        `" name="pc[]" disabled/>
		    </td>
		   <td>`+
					redondearDecimales($(linea).find("td:eq(2)").text()*1,2)+
		   `</td>
       <td>
		   <button type="button" class="btn btn-danger btn-sm" onclick="eliminalineadetalle(this)"><i class="fas fa-trash"></i></button>
		   <button type="button" class="btn btn-info btn-sm" onclick='ver_ingredientes(`+$(linea).find("td:eq(0)").text()+`)'><i class="fas fa-eye"></i></button>
       
		   </td>
		   </tr>`;
       
		$("#detalledeventa").append(l);
    modificartotal();
	}
}
//fin de funcion colocar productos


//funcion para modificar subtotal
function modificasubtotal(textocantidad){
	var linea = $(textocantidad).closest('tr');
	var cantidad = $(linea).find("td:eq(2)>input");
	var pc = $(linea).find("td:eq(3)>input");
	$(linea).find("td:eq(4)").text(redondearDecimales((cantidad.val()*pc.val()),2));
  modificartotal();
}
//fin de funcion modifica subtotal

function redondearDecimales(numero, decimales) {
	return Number(Math.round(numero +'e'+ decimales) +'e-'+ decimales).toFixed(decimales);
	
}

//funcion para eliminar linea de detalle de ventas
function eliminalineadetalle(boton){
	$(boton).closest('tr').remove();
  modificartotal();
}
// fin de funcion de eliminar linea

//funcion para modificar total
function modificartotal(){
  var total = 0;
  $("#detalledeventa tr").each(function(){
    total = total + $(this).find("td:eq(4)").text();
	});
  
  $("#total").val(redondearDecimales(total,2));
}
//fin de funcion modifica total