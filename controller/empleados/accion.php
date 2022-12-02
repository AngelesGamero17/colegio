<?php
include_once "../../model/empleado.php";
include_once "../../model/user.php";

$obj_user = new user();

$obj_empleado = new Empleado();
if(isset($_REQUEST['opcion_estado'])){
    
    if($_REQUEST['opcion_estado']=="desactivar"){
        $obj_empleado->id_empleado=$_REQUEST['id'];
        $obj_empleado->estado(1);
        echo "true";
        die();
    } else if ($_REQUEST['opcion_estado'] == "activar") {
        $obj_empleado->id_empleado = $_REQUEST['id'];
        $obj_empleado->estado(0);
        echo "true";
        die();
    }
}

$obj_empleado->nombres = $_REQUEST['txt_nombres'];
$obj_empleado->apellido_paterno = $_REQUEST['txt_ap_pat'];
$obj_empleado->apellido_materno = $_REQUEST['txt_ap_mat'];
$obj_empleado->nro_documento = $_REQUEST['txt_doc'];
$obj_empleado->direccion = $_REQUEST['txt_direccion'];
$obj_empleado->genero = $_REQUEST['slt_genero'];
$obj_empleado->id_tipo_empleado = $_REQUEST['slt_empleado'];
$obj_empleado->nro_celular = $_REQUEST['txt_num_cel'];
$obj_empleado->email = $_REQUEST['txt_email'];
$obj_empleado->nro_cuenta = $_REQUEST['txr_nro_cuenta'];
$obj_empleado->password = generatePassword(strlen($_REQUEST['txt_nombres']));

if ($_REQUEST['slt_empleado'] == "1") {
    $rango = "Limpieza";
} elseif ($_REQUEST['slt_empleado'] == "2") {
    $rango = "Auxiliar";
} elseif ($_REQUEST['slt_empleado'] == "3") {
    $rango = "Secretario";
}
$obj_user->nombres = $_REQUEST['txt_nombres'];
$obj_user->apellido_paterno = $_REQUEST['txt_ap_pat'];
$obj_user->apellido_materno = $_REQUEST['txt_ap_mat'];
$obj_user->dni = $_REQUEST['txt_doc'];
$obj_user->email = $_REQUEST['txt_email'];
$obj_user->celular = $_REQUEST['txt_num_cel'];
$obj_user->nacimiento = "";
$obj_user->rango = $rango;
$obj_user->nombre_usuario = $_REQUEST['txt_ap_pat'] . $_REQUEST['txt_doc'];
$obj_user->password = generatePassword(strlen($_REQUEST['txt_nombres']));



if ($_REQUEST["id"] > 0) {
    $obj_empleado->id_empleado = $_REQUEST['id'];
    $obj_empleado->update();
    echo "true";
    die();
} else {

    $obj_empleado->create();
    $obj_user->create();
    echo "true";
    die();
}



function generatePassword($length)
{
    $key = "";
    $pattern = "1234567890abcdefghijklmnopqrstuvwxyz";
    $max = strlen($pattern) - 1;
    for ($i = 0; $i < $length; $i++) {
        $key .= substr($pattern, mt_rand(0, $max), 1);
    }
    return $key;
}
