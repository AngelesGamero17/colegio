function list_asistencia_empleados(){
    $.ajax({
        url: "controller/asistencia_empleado/list.php",
    }).done(function(data){
        $(".table-asistencia_empleado").empty();
        $(".table-asistencia_empleado").append(data);
    })
}
$(document).on("click" , ".new-modal-asistencia_empleado" , function(){
    var id = $(this).data("id");
    var url = "controller/asistencia_empleado/create.php?id="+id;
    $.get(url,function(data){
        $("#form_asistencia_empleado").empty();
        $("#form_asistencia_empleado").append(data);
    })
    $("#modal-form-asistencia_empleado").modal("show");
})
$(document).on("click","#btn_save",function(){
    var data = $("#form_asistencia_empleado").serialize();
    $.ajax({
        url: 'controller/asistencia_empleado/accion.php',
        type: 'POST',
        data: data,
        success: function (data) {
            if(data=="true"){
                list_asistencia_empleados();
                toastr.success("Datos guardados correctamente");
                $('#modal-form-asistencia_empleado').modal('hide');
            }
            else if(data=="error"){
                toastr.error("Ya ha registrado su asistencia");
                list_asistencia_empleados();
            }else{
                toastr.error("Hubo un error");
                list_asistencia_empleados();
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