<?php 
include_once "cn.php";

class Empleado extends cn{
    var $id_empleado;
    var $nombres;
    var $apellido_paterno;
    var $apellido_materno;
    var $nro_documento;
    var $direccion;
    var $genero;
    var $id_tipo_empleado;
    var $nro_celular;
    var $email;
    var $nro_cuenta;
    var $password;
    var $estado;
    var $fecharegistro;
    var $fechaactualiza;

    public function create(){
        $query = "INSERT INTO empleado VALUES(0,'$this->nombres','$this->apellido_paterno','$this->apellido_materno',
        '$this->nro_documento','$this->direccion','$this->genero','$this->id_tipo_empleado','$this->nro_celular',
        '$this->email','$this->nro_cuenta','$this->password',1,now(),now())";

        $rs=mysqli_query($this->f_cn(),$query);
        mysqli_close($this->f_cn());
        return $rs;

    }
    public function read(){
        $query = "SELECT e.*,tp.tipo_empleado FROM empleado e INNER JOIN tipo_empleado tp ON e.id_tipo_empleado = tp.id_tipo_empleado";
        $rs=mysqli_query($this->f_cn(),$query);
        mysqli_close($this->f_cn());
        return $rs;
    }
    public function update(){
        $query = "UPDATE empleado SET nombres='$this->nombres',apellido_paterno='$this->apellido_paterno',apellido_materno='$this->apellido_materno',
        nro_documento='$this->nro_documento',direccion='$this->direccion',genero='$this->genero',id_tipo_empleado='$this->id_tipo_empleado',
        nro_celular='$this->nro_celular',email='$this->email',nro_cuenta='$this->nro_cuenta' WHERE id_empleado='$this->id_empleado'" ;
        $rs = mysqli_query($this->f_cn(),$query);
        mysqli_close($this->f_cn());
        return $rs;
    }
    public function consult()
    {
        $query = "SELECT * FROM empleado WHERE id_empleado ='$this->id_empleado'";
        $rs = mysqli_query($this->f_cn(), $query);
        if ($fila = mysqli_fetch_array($rs)) {
            $this->id_empleado = $fila["id_empleado"];
            $this->nombres=$fila["nombres"];
            $this->apellido_paterno = $fila["apellido_paterno"];
            $this->apellido_materno = $fila["apellido_materno"];
            $this->nro_documento = $fila["nro_documento"];
            $this->direccion = $fila["direccion"];
            $this->genero = $fila["genero"];
            $this->id_tipo_empleado=$fila["id_tipo_empleado"];
            $this->nro_celular = $fila["nro_celular"];
            $this->email = $fila["email"];
            $this->nro_cuenta = $fila["nro_cuenta"];
            $this->password = $fila["password"];
            $this->estado = $fila["estado"];
            $this->fecharegistro = $fila["fecharegistro"];
            $this->fechaactualiza = $fila["fechaactualiza"];
        }
        mysqli_close($this->f_cn());
    }
    
    public function estado($estado){
        $query= "UPDATE empleado SET estado='$estado' WHERE id_empleado = '$this->id_empleado'";
        $rs=mysqli_query($this->f_cn(),$query);
        mysqli_close($this->f_cn());
        return $rs;
    }

    public function consultDNI()
    {
        $query = "SELECT * FROM empleado WHERE nro_documento ='$this->nro_documento'";
        $rs = mysqli_query($this->f_cn(), $query);
        if ($fila = mysqli_fetch_array($rs)) {
            $this->id_empleado = $fila["id_empleado"];
            $this->nombres=$fila["nombres"];
            $this->apellido_paterno = $fila["apellido_paterno"];
            $this->apellido_materno = $fila["apellido_materno"];
            $this->nro_documento = $fila["nro_documento"];
            $this->direccion = $fila["direccion"];
            $this->genero = $fila["genero"];
            $this->id_tipo_empleado=$fila["id_tipo_empleado"];
            $this->nro_celular = $fila["nro_celular"];
            $this->email = $fila["email"];
            $this->nro_cuenta = $fila["nro_cuenta"];
            $this->password = $fila["password"];
            $this->estado = $fila["estado"];
            $this->fecharegistro = $fila["fecharegistro"];
            $this->fechaactualiza = $fila["fechaactualiza"];
        }
        mysqli_close($this->f_cn());
    }
    
    
}

?>