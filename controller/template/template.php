<?php 
class ViewController {
    //Paginas 
    public function template(){
        include "view/template.php";
    }
    public function empleados(){
        include "view/empleados.php";
    }
    public function matricula_lumnos(){
        include "view/matricula_alumno.php";
    }
    public function asistencia_alumno(){
        include "view/asistencia_alumnos.php";
    }
    public function asistencia_profesor(){
        include "view/asistencia_profesores.php";
    }
    public function asistencia_empleado(){
        include "view/asistencia_empleados.php";
    }




    public function tipo_empleados(){
        include "view/tipo_empleados.php";
    }
    public function profesores(){
        include "view/profesores.php";
    }
    public function sessionAdmin(){
        if($_SESSION['rango']=="admin"){
            
        }
    }
    public function sessionSecretario(){
        if($_SESSION['rango']=="Secretario"){

        }
    }
    public function sessionProfesor(){
        if($_SESSION['rango']=="profesor"){

        }
    }
    public function sessionAuxiliar(){
        if($_SESSION['rango']="auxiliar"){

        }
    }

    public function session(){
        if(!isset($_SESSION['nombres'])){
            header("Location: view/modules/login/login.php");
        }
    }
}
?>