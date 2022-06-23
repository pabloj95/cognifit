function login() {
    var email = $('#email').val();
    var pass = $('#pass').val();
    
    var salir = false;
    if(email == '') {
        $('#email').addClass('is-invalid');
        salir = true;
    } else {
        $('#email').removeClass('is-invalid');
    }
    if(pass == '') {
        $('#pass').addClass('is-invalid')
        salir = true;
    } else {
        $('#pass').removeClass('is-invalid');
    }
    if(salir) return false;

    $('#formLogin').submit();
}

function registro() {
    var nombre = $('#nombre').val();
    var email = $('#emailReg').val();
    var pass = $('#passReg').val();
    
    var salir = false;
    if(nombre == '') {
        $('#nombre').addClass('is-invalid');
        salir = true;
    } else {
        $('#nombre').removeClass('is-invalid');
    }
    if(email == '') {
        $('#emailReg').addClass('is-invalid');
        salir = true;
    } else {
        $('#emailReg').removeClass('is-invalid');
    }
    if(pass == '') {
        $('#passReg').addClass('is-invalid')
        salir = true;
    } else {
        $('#passReg').removeClass('is-invalid');
    }
    if(salir) return false;

    $('#formRegistro').submit();
}

function cambia(form) {
    $('#fondoLogin > div').addClass('inactivo');
    $('#'+form).removeClass('inactivo');
}