function logout() {
    $.ajax({
        url: 'actions/logout.php',
        type : 'POST',
        dataType : 'json',
        success : function(json) {
            window.parent.location.href = window.parent.location.href;
        },
    })
}

const verCargandoAjax = true;

function cargando(div){
	$("#"+div).html('<div class="div_loading"><img src="./images/loading2.gif" /></div>');
}

function cargaPagina(url,div,parametros)
{
	if($("#"+div).length)
	{
		if(verCargandoAjax )
			cargando(div)
		parametros += '&Ajax=1';
		$.ajax({
		type: "POST",
			url: url,
			data: parametros,
			success: function(data) {
				$('#'+div).html(data);
			}
		});
	}
}

function newDirectorio() {
    cargaPagina('./pages/newDirectorio.php', 'modal-body', '');
    $('#modal-title').html('Nuevo directorio');
    $('#modal-footer').html('<button type="button" class="btn btn-success" onclick="guardarDirectorio()">Guardar</button>');
}
function guardarDirectorio() {
    cargando('modal-footer');
    var nombre = $('#nombre').val();

    var salir = false;
    if(nombre == '') {
        $('#nombre').addClass('is-invalid');
        salir = true;
    } else {
        $('#nombre').removeClass('is-invalid');
    }
    if(salir) {
        $('#modal-footer').html('<button type="button" class="btn btn-success" onclick="guardarDirectorio()">Guardar</button>');
        return false;
    }

    $('#formDir').submit();
}

function newArchivo() {
    cargaPagina('./pages/newArchivo.php', 'modal-body', '');
    $('#modal-title').html('Nuevo archivo');
    $('#modal-footer').html('<button type="button" class="btn btn-success" onclick="guardarArchivo()">Guardar</button>');
}
function newCategoria() {
    $('#newCategoria').html('<input type="text" class="form-control mb-2" id="categoria" name="categoria" placeholder="Categoría" />');
}
function guardarArchivo() {
    cargando('modal-footer');
    var file = $('#formFile');
    var directorio = $('#directorio').val();
    //console.log(formFile[1].files.length);
    var salir = false;
    if(formFile[1].files.length == 0) {
        $('#formFile').addClass('is-invalid');
        salir = true;
    } else {
        $('#formFile').removeClass('is-invalid');
    }
    if(directorio == 0) {
        $('#directorio').addClass('is-invalid');
        salir = true;
    } else {
        $('#directorio').removeClass('is-invalid');
    }
    if(salir) {
        $('#modal-footer').html('<button type="button" class="btn btn-success" onclick="guardarArchivo()">Guardar</button>');
        return false;
    }

    $('#formFile').submit();
}
function cambiarPrivado(archivo, estado) {
    $.ajax({
        url: 'actions/cambiaPrivado.php',
        type : 'POST',
        data: { archivo : archivo, estado: estado },
        complete: function(response) {
            //var resp = JSON.parse(response)
            //console.log(response.status);
            if(response.status == 200)
                cargaPagina('./pages/misArchivos.php', 'misArchivos', '');
        }
    })
}
function eliminarArchivo(archivo) {
    $.ajax({
        url: 'actions/eliminarArchivo.php',
        type : 'POST',
        data: { archivo : archivo },
        complete: function(response) {
            //var resp = JSON.parse(response)
            //console.log(response.status);
            if(response.status == 200)
                cargaPagina('./pages/misArchivos.php', 'misArchivos', '');
        }
    })
}
function moveArchivo(archivo, directorio) {
    cargaPagina('./pages/moverArchivo.php', 'modal-body', 'archivo='+archivo+'&directorio='+directorio);
    $('#modal-title').html('Mover archivo');
    $('#modal-footer').html('<button type="button" class="btn btn-success" onclick="moverArchivo()">Guardar</button>');
}
function moverArchivo() {
    cargando('modal-footer');
    var directorio = $('#directorio').val();
    //console.log(formFile[1].files.length);
    var salir = false;
    if(directorio == 0) {
        $('#directorio').addClass('is-invalid');
        salir = true;
    } else {
        $('#directorio').removeClass('is-invalid');
    }
    if(salir) {
        $('#modal-footer').html('<button type="button" class="btn btn-success" onclick="moverArchivo()">Guardar</button>');
        return false;
    }

    $('#formFile').submit();
}
function compartirArchivo(archivo) {
    cargaPagina('./pages/compartirArchivo.php', 'modal-body', 'archivo='+archivo);
    $('#modal-title').html('Compartir archivo');
    $('#modal-footer').html('<button type="button" class="btn btn-success" onclick="enviarArchivo()">Guardar</button>');
}
function enviarArchivo() {
    cargando('modal-footer');
    var user = $('#user').val();
    //console.log(formFile[1].files.length);
    var salir = false;
    if(user == 0) {
        $('#user').addClass('is-invalid');
        salir = true;
    } else {
        $('#user').removeClass('is-invalid');
    }
    if(salir) {
        $('#modal-footer').html('<button type="button" class="btn btn-success" onclick="enviarArchivo()">Guardar</button>');
        return false;
    }

    $('#formFile').submit();
}

function abrirArchivo(url) {
    window.open(url, '_blank').focus();
}
function cambiaFav(yo, user) {
    $.ajax({
        url: 'actions/cambiarFavorito.php',
        type : 'POST',
        data: { yo : yo, user: user },
        complete: function(response) {
            //var resp = JSON.parse(response)
            //console.log(response.status);
            if(response.status == 200)
                cargaPagina('./pages/listado.php', 'listado', '');
        }
    })
}