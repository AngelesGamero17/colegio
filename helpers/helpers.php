<?php

define("BASE_URL","http://192.168.0.101/freky/desarrollos_freky-master/");

	function strClean($strCadena){
        $string = preg_replace(['/\s+/','/^\s|\s$/'],[' ',''], $strCadena);
        $string = trim($string); //Elimina espacios en blanco al inicio y al final
        $string = stripslashes($string); // Elimina las \ invertidas
        $string = str_ireplace("<script>","",$string);
        $string = str_ireplace("</script>","",$string);
        $string = str_ireplace("<script src>","",$string);
        $string = str_ireplace("<script type=>","",$string);
        $string = str_ireplace("SELECT * FROM}","",$string);
        $string = str_ireplace("DELETE FROM","",$string);
        $string = str_ireplace("INSERT INTO","",$string);
        $string = str_ireplace("SELECT COUNT(*) FROM","",$string);
        $string = str_ireplace("DROP TABLE","",$string);
        $string = str_ireplace("OR '1'='1","",$string);
        $string = str_ireplace('OR "1"="1"',"",$string);
        $string = str_ireplace('OR ´1´=´1´',"",$string);
        $string = str_ireplace("is NULL; --","",$string);
        $string = str_ireplace("is NULL; --","",$string);
        $string = str_ireplace("LIKE '","",$string);
        $string = str_ireplace('LIKE "',"",$string);
        $string = str_ireplace("LIKE ´","",$string);
        $string = str_ireplace("OR 'a'='a","",$string);
        $string = str_ireplace('OR "a"="a',"",$string);
        $string = str_ireplace("OR ´a´=´a","",$string);
        $string = str_ireplace("OR ´a´=´a","",$string);
        $string = str_ireplace("--","",$string);
        $string = str_ireplace("^","",$string);
        $string = str_ireplace("[","",$string);
        $string = str_ireplace("]","",$string);
        $string = str_ireplace("==","",$string);
        return $string;
    }
    //validacion del decimal, transforma un string que tiene una "," a un "." y luego lo convierte en flotante
    function decimal($valor){
        for($i=0; $i<strlen($valor) ;$i++){
        
            if(substr($valor,$i,1)==","){
                
                $res= str_replace(substr($valor,$i,1),".",$valor);
                
                return floatval($res);
                
            }else if(substr($valor,$i,1)=="."){
                
                return floatval($valor);
            }
            else if(substr($valor,$i,1)==substr($valor,-1,1) && $i== strlen($valor)-1 ){
                
                return floatval($valor);
            }
        }
    }
    
    // include_once("model_class/cn.php");
    // include_once("model_class/permisos.php");
    // class permisosM extends cn{
    //     //var $id_modulo;
    //     function getPermisos($id_m){
    //     $obj_p= new permisos();
    //     $obj_p->id_rol=$_SESSION['id_rol'];
    //     $obj_p->id_modulo= $id_m;
    //     $rs=$obj_p->consult_crud_x_rol_modulo();
    //     return $rs;
    // }
    // }
    function dep($data)
    {
        $format  = print_r('<pre>');
        $format .= print_r($data);
        $format .= print_r('</pre>');
        return $format;
    }

    function activar_errores_reporte()
	{
		error_reporting(E_ALL);
		ini_set('display_errors', TRUE);
		ini_set('display_startup_errors', TRUE);
		date_default_timezone_set('America/Lima');
	}

	function nocli()
	{
		if (PHP_SAPI == 'cli')
		die('Este ejemplo solo debe ejecutarse desde un navegador web');
	}

	function getheaders($filename)
	{
		// Redirect output to a client’s web browser (Excel2007)
		header('Content-Type: application/vnd.openxmlformats-officedocument.spreadsheetml.sheet');
		header('Content-Disposition: attachment;filename="'.$filename.'.xlsx"');
		header('Cache-Control: max-age=0');
		// If you're serving to IE 9, then the following may be needed
		header('Cache-Control: max-age=1');

		// If you're serving to IE over SSL, then the following may be needed
		header ('Expires: Mon, 26 Jul 1997 05:00:00 GMT'); // Date in the past
		header ('Last-Modified: '.gmdate('D, d M Y H:i:s').' GMT'); // always modified
		header ('Cache-Control: cache, must-revalidate'); // HTTP/1.1
		header ('Pragma: public'); // HTTP/1.0
	}

    
    function generatestring(){
        $strength = 5;
        $input = '123456789';
        $input_length = strlen($input);
        $random_string = date('dmyHs')."_";
        for($i = 0; $i < $strength; $i++) {
            $random_character = $input[mt_rand(0, $input_length - 1)];
            $random_string .= $random_character;
        }
        return $random_string;
    }

?>