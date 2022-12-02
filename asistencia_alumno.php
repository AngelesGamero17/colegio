<?php 
session_start();
require_once "controller/template/template.php";

$obj_view = new ViewController();

$obj_view->session();
$obj_view->asistencia_alumno();
?>