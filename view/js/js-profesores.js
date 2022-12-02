function list_profesores(){
    $.ajax({
        url: "controller/profesores/list.php",
    }).done(function(data){
        $(".table-profesores").empty();
        $(".table-profesores").append(data);
    })
}
$(document).on("click",".new-modal-profesor",function(){
    var id = $(this).data("id");
    var url = "controller/profesores/create.php?id="+id;
    $.get(url,function(data){
        $("#form_profesores").empty();
        $("#form_profesores").append(data);
    })
    $("#modal-form-profesores").modal("show");
})
$(document).on("click","#btn_save",function(){
    var data = $("#form_profesores").serialize();
    $.ajax({
        url: 'controller/profesores/accion.php',
        type: 'POST',
        data: data,
        success: function (data) {
            if(data=="true"){
                list_profesores();
                toastr.success("Datos guardados correctamente");
                $('#modal-form-profesores').modal('hide');
            }else{
                toastr.error("Hubo un error");
                list_profesores();
            }
        }
    })
})
$(document).on("click", ".activar-item", function () {
    var id = $(this).data('id');
    var opcion_estado = "desactivar";
    var url = "controller/profesores/accion.php?id="+id+ "&opcion_estado=" + opcion_estado;
    $.get(url, function (data) {
        if (data.trim() == "true") {
            toastr.success("Se activo correctamente");
            list_profesores();
        } else {
            alert("Error al desactivar"+data);
        }
    })
})
$(document).on("click", ".desactivar-item", function () {
    var id = $(this).data('id');
    var opcion_estado = "activar";
    var url = "controller/profesores/accion.php?id=" + id + "&opcion_estado=" + opcion_estado;
    $.get(url, function (data) {
        if (data.trim() == "true") {
            toastr.success("Se desactivo correctamente");
            list_profesores();
        } else {
            alert("Error al desactivar"+data);
        }
    })
});
$(document).on("click",".new-modal-show-profesor",function() {
    var id = $(this).data('id');

    var data=$('#form_show_profesor').serialize();

    var url = "controller/profesores/show.php?id=" + id;
    $.get(url, function (data) {
        $('#form_show_profesor').empty();
        $('#form_show_profesor').append(data);

    });
    $("#modal-show-profesor").modal("show");
})
$(document).on("click","#cerrar_sesion",function(){
    var url = "controller/login/logout/cerrar_sesion.php";
    $.get(url,function(data){
        console.log("s");
    })
})