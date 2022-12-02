function list_alumnos(){
    $.ajax({
        url: "controller/alumnos/list.php",
    }).done(function(data){
        $(".table-alumnos").empty();
        $(".table-alumnos").append(data);
    })
}
$(document).on("click" , ".new-modal-alumnos" , function(){
    var id = $(this).data("id");
    var url = "controller/alumnos/create.php?id="+id;
    $.get(url,function(data){
        $("#form_alumnos").empty();
        $("#form_alumnos").append(data);
    })
    $("#modal-form-alumnos").modal("show");
})
$(document).on("click","#btn_save",function(){
    var data = $("#form_alumnos").serialize();
    $.ajax({
        url: 'controller/alumnos/accion.php',
        type: 'POST',
        data: data,
        success: function (data) {
            alert(data);
            if(data=="true"){
                list_alumnos();
                toastr.success("Datos guardados correctamente");
                $('#modal-form-alumnos').modal('hide');
            }else{
                toastr.error("Hubo un error");
                list_alumnos();
            }
        }
    })
})
$(document).on("click", ".activar-item", function () {
    var id = $(this).data('id');
    var opcion_estado = "desactivar";
    var url = "controller/alumnos/accion.php?id="+id+ "&opcion_estado=" + opcion_estado;
    $.get(url, function (data) {
        if (data.trim() == "true") {
            toastr.success("Se activo correctamente");
            list_alumnos();
        } else {
            alert("Error al desactivar"+data);
        }
    })
})
$(document).on("click", ".desactivar-item", function () {
    var id = $(this).data('id');
    var opcion_estado = "activar";
    var url = "controller/alumnos/accion.php?id=" + id + "&opcion_estado=" + opcion_estado;
    $.get(url, function (data) {
        if (data.trim() == "true") {
            toastr.success("Se desactivo correctamente");
            list_alumnos();
        } else {
            alert("Error al desactivar"+data);
        }
    })
});

$(document).on("click","#cerrar_sesion",function(){
    var url = "controller/login/logout/cerrar_sesion.php";
    $.get(url,function(data){
        console.log("s");
    })
})