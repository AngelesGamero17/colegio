<?php 
include_once "cn.php";
class apoderado extends cn{
    var $id_apoderado;
    var $nombres;
    var $apellido_paterno;
    var $apellido_materno;
    var $tipo_doc;
    var $nro_documento;
    var $celular;
    var $parentezco;
    var $dni_alumno;
 

    public function create(){
        $query = "INSERT INTO apoderado VALUES(0,'$this->nombres','$this->apellido_paterno','$this->apellido_materno','$this->tipo_doc','$this->nro_documento'
        ,'$this->celular','$this->parentezco','$this->dni_alumno')";
        $rs=mysqli_query($this->f_cn(),$query);
        mysqli_close($this->f_cn());
        return $rs;
    }
    
}
?>