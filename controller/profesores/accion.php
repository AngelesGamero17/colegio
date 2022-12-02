<?php 
include_once "../../model/profesores.php";
include_once "../../model/user.php";

$obj_user = new user();



$obj_profesor = new profesores();

if(isset($_REQUEST['opcion_estado'])){
    
    if($_REQUEST['opcion_estado']=="desactivar"){
        $obj_profesor->id_profesor=$_REQUEST['id'];
        $obj_profesor->estado(1);
        echo "true";
        die();
    } else if ($_REQUEST['opcion_estado'] == "activar") {
        $obj_profesor->id_profesor = $_REQUEST['id'];
        $obj_profesor->estado(0);
        echo "true";
        die();
    }
}


$obj_profesor->id_profesor = $_REQUEST['id'];
$obj_profesor->nomrbes=$_REQUEST['txt_nombres'];
$obj_profesor->apellido_paterno=$_REQUEST['txt_ap_pat'];
$obj_profesor->apellido_materno=$_REQUEST['txt_ap_mat'];
$obj_profesor->numero_documento=$_REQUEST['txt_doc'];
$obj_profesor->fecha_nacimiento=$_REQUEST['txt_f_nacimiento'];
$obj_profesor->direccion=$_REQUEST['txt_direccion'];
$obj_profesor->genero=$_REQUEST['txt_genero'];
$obj_profesor->email=$_REQUEST['txt_email'];
$obj_profesor->foto=$_REQUEST['txt_foto'];
$obj_profesor->curricullum=$_REQUEST['txt_cv'];
$obj_profesor->curso=$_REQUEST['txt_curso'];
$obj_profesor->nro_celular=$_REQUEST['txt_num_cel'];
$obj_profesor->passwrd=GeneratePassword(strlen($_REQUEST['txt_nombres']));

$obj_user->nombres = $_REQUEST['txt_nombres'];
$obj_user->apellido_paterno = $_REQUEST['txt_ap_pat'];
$obj_user->apellido_materno = $_REQUEST['txt_ap_mat'];
$obj_user->dni = $_REQUEST['txt_doc'];
$obj_user->email = $_REQUEST['txt_email'];
$obj_user->celular = $_REQUEST['txt_num_cel'];
$obj_user->nacimiento = "";
$obj_user->rango = "profesor";
$obj_user->nombre_usuario = $_REQUEST['txt_ap_pat'] . $_REQUEST['txt_doc'];
$obj_user->password = generatePassword(strlen($_REQUEST['txt_nombres']));

if($_REQUEST["id"]>0){
    $obj_profesor->id_profesor=$_REQUEST['id'];    
    $obj_profesor->update();
    echo "true";
    die(); 
}else{

    $obj_profesor->create();
    $obj_user->create();
    echo "true";
    die(); 
}



function generatePassword($length)
{
    $key = "";
    $pattern = "1234567890abcdefghijklmnopqrstuvwxyz";
    $max = strlen($pattern)-1;
    for($i = 0; $i < $length; $i++){
        $key .= substr($pattern, mt_rand(0,$max), 1);
    }
    return $key;
}

?>