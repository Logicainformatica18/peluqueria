function personInsert() {

    var formData = new FormData(document.getElementById("person"));
    // .append podemos agregar parametros al formData
    formData.append("metodo", "insert");
    $.ajax({
        url: "functionperson.php",
        type: "POST",
        dataType: "HTML",
        data: formData,
        asycn: false, //el error que cometí de sintaxis, es async
        cache: false,
        contentType: false,
        processData: false
    }).done(function (echo) {
        $("#resultado").html(echo);
    });
    personNuevo();
}
function personDelete(codigo) {
    //validamos en este if si queremos eliminar con la confirmación
    if (confirm("¿Esta seguro de querer eliminar?")) {
        var formData = new FormData(document.getElementById("person"));
        // .append podemos agregar parametros al formData
        formData.append("metodo", "delete");
        formData.append("codigo", codigo);
        $.ajax({
            url: "functionperson.php",
            type: "POST",
            dataType: "HTML",
            data: formData,
            asycn: false, //el error que cometí de sintaxis, es async
            cache: false,
            contentType: false,
            processData: false
        }).done(function (echo) {
            $("#resultado").html(echo);
        });
    }
}
function personSelectOne(codigo) {

    var formData = new FormData(document.getElementById("person"));
    // .append podemos agregar parametros al formData
    formData.append("metodo", "select");
    formData.append("codigo", codigo);
    $.ajax({
        url: "functionperson.php",
        type: "POST",
        dataType: "HTML",
        data: formData,
        asycn: false, //el error que cometí de sintaxis, es async
        cache: false,
        contentType: false,
        processData: false
    }).done(function (echo) {
        $("#resultado").html(echo);
    });

}
function personSearch() {

    var formData = new FormData(document.getElementById("person"));
    // .append podemos agregar parametros al formData
    formData.append("metodo", "search");
    $.ajax({
        url: "functionperson.php",
        type: "POST",
        dataType: "HTML",
        data: formData,
        asycn: false, //el error que cometí de sintaxis, es async
        cache: false,
        contentType: false,
        processData: false
    }).done(function (echo) {
        $("#resultado").html(echo);
    });

}

function personUpdate() {

    var formData = new FormData(document.getElementById("person"));
    // .append podemos agregar parametros al formData
    formData.append("metodo", "update");
    $.ajax({
        url: "functionperson.php",
        type: "POST",
        dataType: "HTML",
        data: formData,
        //  asycn:false, //el error que cometí de sintaxis, es async
        cache: false,
        contentType: false,
        processData: false
    }).done(function (echo) {
        $("#resultado").html(echo);
    });

}
function personUpdatePerfil() {

    var formData = new FormData(document.getElementById("person"));
    // .append podemos agregar parametros al formData
    formData.append("metodo", "updateperfil");
    $.ajax({
        url: "functionperson.php",
        type: "POST",
        dataType: "HTML",
        data: formData,
        //  asycn:false, //el error que cometí de sintaxis, es async
        cache: false,
        contentType: false,
        processData: false
    }).done(function (echo) {
        $("#resultado").html(echo);
    });

}
function personLogin() {
    var formData = new FormData(document.getElementById("person"));
    // .append podemos agregar parametros al formData
    formData.append("metodo", "login");
    $.ajax({
        url: "functionperson.php",
        type: "POST",
        dataType: "HTML",
        data: formData,
        //  asycn:false, //el error que cometí de sintaxis, es async
        cache: false,
        contentType: false,
        processData: false
    }).done(function (echo) {
        $("#resultado").html(echo);
    });

}
function personChangePassword() {

    var formData = new FormData(document.getElementById("person"));
    // .append podemos agregar parametros al formData
    formData.append("metodo", "changePassword");
    $.ajax({
        url: "functionperson.php",
        type: "POST",
        dataType: "HTML",
        data: formData,
        //  asycn:false, //el error que cometí de sintaxis, es async
        cache: false,
        contentType: false,
        processData: false
    }).done(function (echo) {
        $("#resultado").html(echo);
    });
    //limpia por completo el formulario usando jquery
    // $("#person")[0].reset();
}
function personFiltro() {

    var formData = new FormData(document.getElementById("filtro"));
    // .append podemos agregar parametros al formData
    formData.append("metodo", "filtro");
    $.ajax({
        url: "functionperson.php",
        type: "POST",
        dataType: "HTML",
        data: formData,
        asycn: false, //el error que cometí de sintaxis, es async
        cache: false,
        contentType: false,
        processData: false
    }).done(function (echo) {
        $("#resultado").html(echo);
    });

}
function personSearch2() {

    var formData = new FormData(document.getElementById("programaciondetalle"));
    // .append podemos agregar parametros al formData
    formData.append("metodo", "search2");
    $.ajax({
        url: "functionperson.php",
        type: "POST",
        dataType: "HTML",
        data: formData,
        //  asycn:false, //el error que cometí de sintaxis, es async
        cache: false,
        contentType: false,
        processData: false
    }).done(function (echo) {
        $("#resultado").html(echo);
    });

}
function publicacionInsert() {

    var formData = new FormData(document.getElementById("publicacion"));
    // .append podemos agregar parametros al formData
    formData.append("metodo", "insert");
    $.ajax({
        url: "functionpublicacion.php",
        type: "POST",
        dataType: "HTML",
        data: formData,
        asycn: false, //el error que cometí de sintaxis, es async
        cache: false,
        contentType: false,
        processData: false
    }).done(function (echo) {
        $("#resultado").html(echo);
    });

}
function publicacionDelete(codigo,pagina) {
    //validamos en este if si queremos eliminar con la confirmación
    if (confirm("¿Esta seguro de querer eliminar?")) {
        var formData = new FormData(document.getElementById("publicacion"));
        // .append podemos agregar parametros al formData
        formData.append("metodo", "delete");
        formData.append("codigo", codigo);
        formData.append("pagina", pagina);
        $.ajax({
            url: "functionpublicacion.php",
            type: "POST",
            dataType: "HTML",
            data: formData,
            asycn: false, //el error que cometí de sintaxis, es async
            cache: false,
            contentType: false,
            processData: false
        }).done(function (echo) {
            $("#resultado").html(echo);
        });
    }
}

function publicacionSelectOne(codigo) {
    var formData = new FormData(document.getElementById("publicacion"));
    // .append podemos agregar parametros al formData
    formData.append("metodo", "select");
    formData.append("codigo", codigo);
    $.ajax({
        url: "functionpublicacion.php",
        type: "POST",
        dataType: "HTML",
        data: formData,
        asycn: false, //el error que cometí de sintaxis, es async
        cache: false,
        contentType: false,
        processData: false
    }).done(function (echo) {
        $("#resultado").html(echo);
    });

}
function publicacionUpdate() {

    var formData = new FormData(document.getElementById("publicacion"));
    // .append podemos agregar parametros al formData
    formData.append("metodo", "update");
    $.ajax({
        url: "functionpublicacion.php",
        type: "POST",
        dataType: "HTML",
        data: formData,
        //  asycn:false, //el error que cometí de sintaxis, es async
        cache: false,
        contentType: false,
        processData: false
    }).done(function (echo) {
        $("#resultado").html(echo);
    });
}

///////////////////
function generoInsert() {

    var formData = new FormData(document.getElementById("genero"));
    // .append podemos agregar parametros al formData
    formData.append("metodo", "insert");
    $.ajax({
        url: "functiongenero.php",
        type: "POST",
        dataType: "HTML",
        data: formData,
        asycn: false, //el error que cometí de sintaxis, es async
        cache: false,
        contentType: false,
        processData: false
    }).done(function (echo) {
        $("#resultado").html(echo);
    });

}
function generoDelete(codigo,pagina) {
    //validamos en este if si queremos eliminar con la confirmación
    if (confirm("¿Esta seguro de querer eliminar?")) {
        var formData = new FormData(document.getElementById("genero"));
        // .append podemos agregar parametros al formData
        formData.append("metodo", "delete");
        formData.append("codigo", codigo);
        formData.append("pagina", pagina);
        $.ajax({
            url: "functiongenero.php",
            type: "POST",
            dataType: "HTML",
            data: formData,
            asycn: false, //el error que cometí de sintaxis, es async
            cache: false,
            contentType: false,
            processData: false
        }).done(function (echo) {
            $("#resultado").html(echo);
        });
    }
}

function generoSelectOne(codigo) {
    var formData = new FormData(document.getElementById("genero"));
    // .append podemos agregar parametros al formData
    formData.append("metodo", "select");
    formData.append("codigo", codigo);
    $.ajax({
        url: "functiongenero.php",
        type: "POST",
        dataType: "HTML",
        data: formData,
        asycn: false, //el error que cometí de sintaxis, es async
        cache: false,
        contentType: false,
        processData: false
    }).done(function (echo) {
        $("#resultado").html(echo);
    });

}
function generoUpdate() {

    var formData = new FormData(document.getElementById("genero"));
    // .append podemos agregar parametros al formData
    formData.append("metodo", "update");
    $.ajax({
        url: "functiongenero.php",
        type: "POST",
        dataType: "HTML",
        data: formData,
        //  asycn:false, //el error que cometí de sintaxis, es async
        cache: false,
        contentType: false,
        processData: false
    }).done(function (echo) {
        $("#resultado").html(echo);
    });
}

///////////////////
function catalogoInsert() {

    var formData = new FormData(document.getElementById("catalogo"));
    // .append podemos agregar parametros al formData
    formData.append("metodo", "insert");
    $.ajax({
        url: "functioncatalogo.php",
        type: "POST",
        dataType: "HTML",
        data: formData,
        asycn: false, //el error que cometí de sintaxis, es async
        cache: false,
        contentType: false,
        processData: false
    }).done(function (echo) {
        $("#resultado").html(echo);
    });

}
function catalogoDelete(codigo,pagina) {
    //validamos en este if si queremos eliminar con la confirmación
    if (confirm("¿Esta seguro de querer eliminar?")) {
        var formData = new FormData(document.getElementById("catalogo"));
        // .append podemos agregar parametros al formData
        formData.append("metodo", "delete");
        formData.append("codigo", codigo);
        formData.append("pagina", pagina);
        $.ajax({
            url: "functioncatalogo.php",
            type: "POST",
            dataType: "HTML",
            data: formData,
            asycn: false, //el error que cometí de sintaxis, es async
            cache: false,
            contentType: false,
            processData: false
        }).done(function (echo) {
            $("#resultado").html(echo);
        });
    }
}

function catalogoSelectOne(codigo) {
    var formData = new FormData(document.getElementById("catalogo"));
    // .append podemos agregar parametros al formData
    formData.append("metodo", "select");
    formData.append("codigo", codigo);
    $.ajax({
        url: "functioncatalogo.php",
        type: "POST",
        dataType: "HTML",
        data: formData,
        asycn: false, //el error que cometí de sintaxis, es async
        cache: false,
        contentType: false,
        processData: false
    }).done(function (echo) {
        $("#resultado").html(echo);
    });

}
function catalogoUpdate() {

    var formData = new FormData(document.getElementById("catalogo"));
    // .append podemos agregar parametros al formData
    formData.append("metodo", "update");
    $.ajax({
        url: "functioncatalogo.php",
        type: "POST",
        dataType: "HTML",
        data: formData,
        //  asycn:false, //el error que cometí de sintaxis, es async
        cache: false,
        contentType: false,
        processData: false
    }).done(function (echo) {
        $("#resultado").html(echo);
    });
}


///////////////////
function categoriaInsert() {

    var formData = new FormData(document.getElementById("categoria"));
    // .append podemos agregar parametros al formData
    formData.append("metodo", "insert");
    $.ajax({
        url: "functioncategoria.php",
        type: "POST",
        dataType: "HTML",
        data: formData,
        asycn: false, //el error que cometí de sintaxis, es async
        cache: false,
        contentType: false,
        processData: false
    }).done(function (echo) {
        $("#resultado").html(echo);
    });

}
function categoriaDelete(codigo,pagina) {
    //validamos en este if si queremos eliminar con la confirmación
    if (confirm("¿Esta seguro de querer eliminar?")) {
        var formData = new FormData(document.getElementById("categoria"));
        // .append podemos agregar parametros al formData
        formData.append("metodo", "delete");
        formData.append("codigo", codigo);
        formData.append("pagina", pagina);
        $.ajax({
            url: "functioncategoria.php",
            type: "POST",
            dataType: "HTML",
            data: formData,
            asycn: false, //el error que cometí de sintaxis, es async
            cache: false,
            contentType: false,
            processData: false
        }).done(function (echo) {
            $("#resultado").html(echo);
        });
    }
}

function categoriaSelectOne(codigo) {
    var formData = new FormData(document.getElementById("categoria"));
    // .append podemos agregar parametros al formData
    formData.append("metodo", "select");
    formData.append("codigo", codigo);
    $.ajax({
        url: "functioncategoria.php",
        type: "POST",
        dataType: "HTML",
        data: formData,
        asycn: false, //el error que cometí de sintaxis, es async
        cache: false,
        contentType: false,
        processData: false
    }).done(function (echo) {
        $("#resultado").html(echo);
    });

}
function categoriaUpdate() {

    var formData = new FormData(document.getElementById("categoria"));
    // .append podemos agregar parametros al formData
    formData.append("metodo", "update");
    $.ajax({
        url: "functioncategoria.php",
        type: "POST",
        dataType: "HTML",
        data: formData,
        //  asycn:false, //el error que cometí de sintaxis, es async
        cache: false,
        contentType: false,
        processData: false
    }).done(function (echo) {
        $("#resultado").html(echo);
    });
}

///////////////////
function servicioInsert() {

    var formData = new FormData(document.getElementById("servicio"));
    // .append podemos agregar parametros al formData
    formData.append("metodo", "insert");
    $.ajax({
        url: "functionservicio.php",
        type: "POST",
        dataType: "HTML",
        data: formData,
        asycn: false, //el error que cometí de sintaxis, es async
        cache: false,
        contentType: false,
        processData: false
    }).done(function (echo) {
        $("#resultado").html(echo);
    });

}
function servicioDelete(codigo,pagina) {
    //validamos en este if si queremos eliminar con la confirmación
    if (confirm("¿Esta seguro de querer eliminar?")) {
        var formData = new FormData(document.getElementById("servicio"));
        // .append podemos agregar parametros al formData
        formData.append("metodo", "delete");
        formData.append("codigo", codigo);
        formData.append("pagina", pagina);
        $.ajax({
            url: "functionservicio.php",
            type: "POST",
            dataType: "HTML",
            data: formData,
            asycn: false, //el error que cometí de sintaxis, es async
            cache: false,
            contentType: false,
            processData: false
        }).done(function (echo) {
            $("#resultado").html(echo);
        });
    }
}

function servicioSelectOne(codigo) {
    var formData = new FormData(document.getElementById("servicio"));
    // .append podemos agregar parametros al formData
    formData.append("metodo", "select");
    formData.append("codigo", codigo);
    $.ajax({
        url: "functionservicio.php",
        type: "POST",
        dataType: "HTML",
        data: formData,
        asycn: false, //el error que cometí de sintaxis, es async
        cache: false,
        contentType: false,
        processData: false
    }).done(function (echo) {
        $("#resultado").html(echo);
    });

}
function servicioUpdate() {

    var formData = new FormData(document.getElementById("servicio"));
    // .append podemos agregar parametros al formData
    formData.append("metodo", "update");
    $.ajax({
        url: "functionservicio.php",
        type: "POST",
        dataType: "HTML",
        data: formData,
        //  asycn:false, //el error que cometí de sintaxis, es async
        cache: false,
        contentType: false,
        processData: false
    }).done(function (echo) {
        $("#resultado").html(echo);
    });
}




///////////////////
function cargoInsert() {

    var formData = new FormData(document.getElementById("cargo"));
    // .append podemos agregar parametros al formData
    formData.append("metodo", "insert");
    $.ajax({
        url: "functioncargo.php",
        type: "POST",
        dataType: "HTML",
        data: formData,
        asycn: false, //el error que cometí de sintaxis, es async
        cache: false,
        contentType: false,
        processData: false
    }).done(function (echo) {
        $("#resultado").html(echo);
    });

}
function cargoDelete(codigo,pagina) {
    //validamos en este if si queremos eliminar con la confirmación
    if (confirm("¿Esta seguro de querer eliminar?")) {
        var formData = new FormData(document.getElementById("cargo"));
        // .append podemos agregar parametros al formData
        formData.append("metodo", "delete");
        formData.append("codigo", codigo);
        formData.append("pagina", pagina);
        $.ajax({
            url: "functioncargo.php",
            type: "POST",
            dataType: "HTML",
            data: formData,
            asycn: false, //el error que cometí de sintaxis, es async
            cache: false,
            contentType: false,
            processData: false
        }).done(function (echo) {
            $("#resultado").html(echo);
        });
    }
}

function cargoSelectOne(codigo) {
    var formData = new FormData(document.getElementById("cargo"));
    // .append podemos agregar parametros al formData
    formData.append("metodo", "select");
    formData.append("codigo", codigo);
    $.ajax({
        url: "functioncargo.php",
        type: "POST",
        dataType: "HTML",
        data: formData,
        asycn: false, //el error que cometí de sintaxis, es async
        cache: false,
        contentType: false,
        processData: false
    }).done(function (echo) {
        $("#resultado").html(echo);
    });

}
function cargoUpdate() {

    var formData = new FormData(document.getElementById("cargo"));
    // .append podemos agregar parametros al formData
    formData.append("metodo", "update");
    $.ajax({
        url: "functioncargo.php",
        type: "POST",
        dataType: "HTML",
        data: formData,
        //  asycn:false, //el error que cometí de sintaxis, es async
        cache: false,
        contentType: false,
        processData: false
    }).done(function (echo) {
        $("#resultado").html(echo);
    });
}











function envioWhatsapp(cliente){


    let url = "https://api.whatsapp.com/send?phone=51997852483&text=*_Sistema_*%0A*Horario*%0A%0A*¿Cual es tu nombre?*%0A" + cliente;
    window.open(url);
}




function categoriasEditar() {
    categorias.btn.disabled = true;
    categorias.nuevo.disabled = true;
    categorias.modificar.disabled = false;
  
}
function categoriasNuevo() {
    categorias.btn.disabled = false;
    categorias.nuevo.disabled = false;
    categorias.modificar.disabled = true;
    //limpia por completo el formulario usando jquery
    $("#categorias")[0].reset();
}
function publicacionNuevo() {
    //limpia por completo el formulario usando jquery
    $("#publicacion")[0].reset();
}
function generoEditar() {
    genero.btn.disabled = true;
    genero.nuevo.disabled = true;
    genero.modificar.disabled = false;
  
}
function generoNuevo() {
    genero.btn.disabled = false;
    genero.nuevo.disabled = false;
    genero.modificar.disabled = true;
    //limpia por completo el formulario usando jquery
    $("#genero")[0].reset();
}
function categoriaEditar() {
    categoria.btn.disabled = true;
    categoria.nuevo.disabled = true;
    categoria.modificar.disabled = false;
  
}
function categoriaNuevo() {
    categoria.btn.disabled = false;
    categoria.nuevo.disabled = false;
    categoria.modificar.disabled = true;
    //limpia por completo el formulario usando jquery
    $("#categoria")[0].reset();
}
function catalogoEditar() {
    catalogo.btn.disabled = true;
    catalogo.nuevo.disabled = true;
    catalogo.modificar.disabled = false;
  
}
function catalogoNuevo() {
    catalogo.btn.disabled = false;
    catalogo.nuevo.disabled = false;
    catalogo.modificar.disabled = true;
    //limpia por completo el formulario usando jquery
    $("#catalogo")[0].reset();
}
function servicioEditar() {
    servicio.btn.disabled = true;
    servicio.nuevo.disabled = true;
    servicio.modificar.disabled = false;
  
}
function servicioNuevo() {
    servicio.btn.disabled = false;
    servicio.nuevo.disabled = false;
    servicio.modificar.disabled = true;
    //limpia por completo el formulario usando jquery
    $("#servicio")[0].reset();
}


function cargoEditar() {
    cargo.btn.disabled = true;
    cargo.nuevo.disabled = true;
    cargo.modificar.disabled = false;
  
}
function cargoNuevo() {
    cargo.btn.disabled = false;
    cargo.nuevo.disabled = false;
    cargo.modificar.disabled = true;
    //limpia por completo el formulario usando jquery
    $("#cargo")[0].reset();
}








function readImage(input) {
    if (input.files && input.files[0]) {
      var reader = new FileReader();
      reader.onload = function(e) {
        $('#blah').attr('src', e.target.result); // Renderizamos la imagen
      }
      reader.readAsDataURL(input.files[0]);
    }
  }