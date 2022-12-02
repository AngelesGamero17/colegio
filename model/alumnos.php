<?php 
include_once "cn.php";
class alumno extends cn{
    var $id_alumno;
    var $nombres;
    var $apellido_paterno;
    var $apellido_materno;
    var $numero_documento;
    var $fecha_nacimiento;
    var $genero;
    var $direccion;
    var $email;
    var $grado;
    var $foto;
    var $constancia_estudios;
    var $id_apoderado;
    var $estado;
    var $fecha_registro;
    var $fecha_actualiza;

    public function create(){
        $query = "INSERT INTO alumnos VALUES(0,'$this->nombres','$this->apellido_paterno','$this->apellido_materno','$this->numero_documento'
        ,'$this->fecha_nacimiento','$this->direccion','$this->email','$this->grado','$this->foto','$this->constancia_estudios',
        '$this->id_apoderado',1,now(),now(),'$this->genero')";
        $rs=mysqli_query($this->f_cn(),$query);
        mysqli_close($this->f_cn());
        return $rs;
    }
    public function read(){
        $query = "SELECT a.*,ap.nombres as ap_nombre,ap.apellido_paterno as ap_apellido_pa,ap.apellido_materno as ap_apellido_ma,ap.celular as ap_celular FROM alumnos a INNER JOIN apoderado ap ON a.numero_documento=ap.dni_alumno";
        $rs=mysqli_query($this->f_cn(),$query);
        mysqli_close($this->f_cn());
        return $rs;
    }
    public function update(){
        $query = "UPDATE alumnos SET nombres='$this->nombres',apellido_paterno='$this->apellido_paterno',apellido_materno='$this->apellido_materno',genero='$this->genero',
        direccion='$this->direccion',email='$this->email',foto='$this->foto',fecha_actualiza=now() WHERE id_alumno = '$this->id_alumno'" ;
        $rs=mysqli_query($this->f_cn(),$query);
        mysqli_close($this->f_cn());
        return $rs;
    }
    public function consult(){
        $query = "SELECT * FROM alumnos WHERE id_alumno = '$this->id_alumno'";
        $rs = mysqli_query($this->f_cn(), $query);
        if ($fila = mysqli_fetch_array($rs)) {
            $this->id_alumno = $fila["id_alumno"];
            $this->nombres = $fila["nombres"];
            $this->apellido_paterno = $fila["apellido_paterno"];
            $this->apellido_materno = $fila["apellido_materno"];
            $this->numero_documento = $fila["numero_documento"];
            $this->fecha_nacimiento = $fila["fecha_nacimiento"];
            $this->genero = $fila["genero"];
            $this->direccion = $fila["direccion"];
            $this->email = $fila["email"];
            $this->grado = $fila["grado"];
            $this->foto = $fila["foto"];
            $this->constancia_estudios = $fila["constancia_estudios"];
            $this->id_apoderado = $fila["id_apoderado"];
            $this->estado = $fila["estado"];
            $this->fecha_registro = $fila["fecha_registro"];
            $this->fecha_actualiza = $fila["fecha_actualiza"];
            $this->id_alumno = $fila["id_alumno"];
        }
        mysqli_close($this->f_cn());
    }
    public function estado($estado)
    {
        $query = "UPDATE alumnos SET estado = '$estado'
        WHERE id_alumno = '$this->id_alumno'";
        $rs = mysqli_query($this->f_cn(), $query);
        mysqli_close($this->f_cn());
        return $rs;
    }
}
?>