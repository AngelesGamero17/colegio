function list_asistencia_profesor(){
    $.ajax({
        url: "controller/asistencia_profesor/list.php",
    }).done(function(data){
        $(".table-asistencia-profesor").empty();
        $(".table-asistencia-profesor").append(data);
    })
}
$(document).on("click" , ".new-modal-asistencia_profesor" , function(){
    var id = $(this).data("id");
    var url = "controller/asistencia_profesor/create.php?id="+id;
    $.get(url,function(data){
        $("#form_asistencia_profesor").empty();
        $("#form_asistencia_profesor").append(data);
    })
    $("#modal-form-asistencia").modal("show");
})
$(document).on("click","#btn_save",function(){
    var data = $("#form_asistencia_profesor").serialize();
    $.ajax({
        url: 'controller/asistencia_profesor/accion.php',
        type: 'POST',
        data: data,
        success: function (data) {
            if(data=="true"){
                list_asistencia_profesor();
                toastr.success("Datos guardados correctamente");
                $('#modal-form-asistencia').modal('hide');
            }
            else if(data=="error"){
                toastr.error("Ya ha registrado su asistencia");
                list_asistencia_profesor();
            }else{
                toastr.error("Hubo un error");
                list_asistencia_profesor();
            }
        }
    })
})
$(document).on("click","#cerrar_sesion",function(){
    var url = "controller/login/logout/cerrar_sesion.php";
    $.get(url,function(data){
        console.log("s");
    })
})