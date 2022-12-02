<?php 
require_once "../../helpers/helpers.php";
include_once "../../model/alumnos.php";
include_once "../../model/apoderado.php";
$obj_alumnos = new alumno();

if(isset($_REQUEST['opcion_estado'])){
    
    if($_REQUEST['opcion_estado']=="desactivar"){
        $obj_alumnos->id_alumno=$_REQUEST['id'];
        $obj_alumnos->estado(1);
        echo "true";
        die();
    } else if ($_REQUEST['opcion_estado'] == "activar") {
        $obj_alumnos->id_alumno = $_REQUEST['id'];
        $obj_alumnos->estado(0);
        echo "true";
        die();
    }
}

$obj_alumnos->id_alumno = strClean($_REQUEST['id']);
$obj_alumnos->nombres = strClean($_REQUEST['txt_nombres']);
$obj_alumnos->apellido_paterno = strClean($_REQUEST['txt_ap_paterno']);
$obj_alumnos->apellido_materno = strClean($_REQUEST['txt_ap_mat']);
$obj_alumnos->numero_documento = strClean($_REQUEST['txt_doc']);
$obj_alumnos->fecha_nacimiento = strClean($_REQUEST['txt_nacimiento']);
$obj_alumnos->genero = strClean($_REQUEST['txt_genero']);
$obj_alumnos->direccion = strClean($_REQUEST['txt_direccion']);
$obj_alumnos->email = strClean($_REQUEST['txt_email']);
$obj_alumnos->grado = strClean($_REQUEST['txt_grado']);
$obj_alumnos->foto = strClean($_REQUEST['txt_foto']);
$obj_alumnos->constancia_estudios = strClean($_REQUEST['txt_cs_est']);
$obj_alumnos->id_apoderado= strClean($_REQUEST['txt_apoderado_nro_doc']);


$obj_apoderado=new apoderado();

$obj_apoderado->id_apoderado=0;
$obj_apoderado->nombres=$_REQUEST['txt_apoderado_nombre'];
$obj_apoderado->apellido_paterno=$_REQUEST['txt_apoderado_ap_pa'];
$obj_apoderado->apellido_materno=$_REQUEST['txt_apoderado_ap_ma'];
$obj_apoderado->tipo_doc=$_REQUEST['txt_apoderado_tp_doc'];
$obj_apoderado->nro_documento=$_REQUEST['txt_apoderado_nro_doc'];
$obj_apoderado->celular=$_REQUEST['txt_apoderado_cel'];
$obj_apoderado->parentezco=$_REQUEST['txt_apoderado_par'];    
$obj_apoderado->dni_alumno=$_REQUEST['txt_doc'];
if($_REQUEST["id"]>0){
    $obj_alumnos->id_alumno=$_REQUEST['id'];
    $obj_alumnos->update();
    echo "true";
    die();
}else{
    $obj_alumnos->create();
    $obj_apoderado->create();
    echo "true";
    die();

}

?>