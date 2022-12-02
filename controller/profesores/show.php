<?php 
include_once "../../model/profesores.php";
$obj_profesor=new profesores();
$obj_profesor->id_profesor=$_REQUEST['id'];
$obj_profesor->consult();

?>

<div class="row">
    <input type="hidden" name="id" id="id" value="<?php echo $obj_profesor->id_profesor; ?>">
    <div class="col-4">
        <label for="txt_name">Nombres <i class="text-danger" title="Ingrese asunto">*</i></label>
        <label class="text-danger msj_txt_name"></label>  
        <div class="input-group mb-2">
            <div class="input-group-prepend ">
            <span class="input-group-text"><i class="fas fa-align-left"></i></span>
            </div>
            <input disabled type="text" class="form-control valid validText" id="txt_nombres" name="txt_nombres" value="<?php echo $obj_profesor->nomrbes; ?>"/>
        </div>
    </div>
    <div class="col-4">
        <label for="txt_name">Apellido Paterno<i class="text-danger" title="Ingrese asunto">*</i></label>
        <label class="text-danger msj_txt_name"></label>  
        <div class="input-group mb-2">
            <div class="input-group-prepend ">
            <span class="input-group-text"><i class="fas fa-align-left"></i></span>
            </div>
            <input disabled type="text" class="form-control valid validText" id="txt_ap_pat" name="txt_ap_pat" value="<?php echo $obj_profesor->apellido_paterno; ?>"/>
        </div>
    </div>
    <div class="col-4">
        <label for="txt_name">Apellido Materno<i class="text-danger" title="Ingrese asunto">*</i></label>
        <label class="text-danger msj_txt_name"></label>  
        <div class="input-group mb-2">
            <div class="input-group-prepend ">
            <span class="input-group-text"><i class="fas fa-align-left"></i></span>
            </div>
            <input disabled type="text" class="form-control valid validText" id="txt_ap_mat" name="txt_ap_mat" value="<?php echo $obj_profesor->apellido_materno; ?>"/>
        </div>
    </div>
    <div class="col-4">
        <label for="txt_name">Numero de documento<i class="text-danger" title="Ingrese asunto">*</i></label>
        <label class="text-danger msj_txt_name"></label>  
        <div class="input-group mb-2">
            <div class="input-group-prepend ">
            <span class="input-group-text"><i class="fas fa-align-left"></i></span>
            </div>
            <input disabled type="number" class="form-control valid validNumber" id="txt_doc" name="txt_doc" max="99999999" value="<?php echo $obj_profesor->numero_documento; ?>"/>
        </div>
    </div>
    <div class="col-4">
        <label for="txt_name">Direccion<i class="text-danger" title="Ingrese asunto">*</i></label>
        <label class="text-danger msj_txt_name"></label>  
        <div class="input-group mb-2">
            <div class="input-group-prepend ">
            <span class="input-group-text"><i class="fas fa-align-left"></i></span>
            </div>
            <input disabled type="text" class="form-control valid ValidTextSpecial" id="txt_direccion" name="txt_direccion" value="<?php echo $obj_profesor->direccion; ?>"/>
        </div>
    </div>
    <div class="col-4">
        <label for="txt_name">Fecha de nacimiento<i class="text-danger" title="Ingrese asunto">*</i></label>
        <label class="text-danger msj_txt_name"></label>  
        <div class="input-group mb-2">
            <div class="input-group-prepend ">
            <span class="input-group-text"><i class="fas fa-align-left"></i></span>
            </div>
            <input disabled type="date" class="form-control valid " id="txt_f_nacimiento" name="txt_f_nacimiento" value="<?php echo $obj_profesor->genero; ?>"/>
        </div>
    </div>
    <div class="col-4">
        <label for="txt_name">Genero<i class="text-danger" title="Ingrese asunto">*</i></label>
        <label class="text-danger msj_txt_name"></label>  
        <div class="input-group mb-2">
            <div class="input-group-prepend ">
            <span class="input-group-text"><i class="fas fa-align-left"></i></span>
            </div>
            <input disabled type="text" class="form-control valid " id="" name="txt_genero" value="<?php echo $obj_profesor->genero; ?>"/>
        </div>
    </div>
    <div class="col-4">
        <label for="txt_name">Email <i class="text-danger" title="Ingrese asunto">*</i></label>
        <label class="text-danger msj_txt_name"></label>  
        <div class="input-group mb-2">
            <div class="input-group-prepend ">
            <span class="input-group-text"><i class="fas fa-align-left"></i></span>
            </div>
            <input disabled type="text" class="form-control valid validEmail" id="txt_email" name="txt_email" value="<?php echo $obj_profesor->email; ?>"/>
        </div>
    </div>
    <div class="col-4">
        <label for="txt_name">Foto <i class="text-danger" title="Ingrese asunto">*</i></label>
        <label class="text-danger msj_txt_name"></label>  
        <div class="input-group mb-2">
            <div class="input-group-prepend ">
            <span class="input-group-text"><i class="fas fa-align-left"></i></span>
            </div>
            <input disabled type="text" class="form-control valid " id="txt_foto" name="txt_foto" value="<?php echo $obj_profesor->foto; ?>"/>
        </div>
    </div>
    <div class="col-4">
        <label for="txt_name">CV <i class="text-danger" title="Ingrese asunto">*</i></label>
        <label class="text-danger msj_txt_name"></label>  
        <div class="input-group mb-2">
            <div class="input-group-prepend ">
            <span class="input-group-text"><i class="fas fa-align-left"></i></span>
            </div>
            <input disabled type="text" class="form-control " id="txt_cv" name="txt_cv" value="<?php echo $obj_profesor->curricullum; ?>"/>
        </div>
    </div>
    <div class="col-4">
        <label for="txt_name">Curso <i class="text-danger" title="Ingrese asunto">*</i></label>
        <label class="text-danger msj_txt_name"></label>  
        <div class="input-group mb-2">
            <div class="input-group-prepend ">
            <span class="input-group-text"><i class="fas fa-align-left"></i></span>
            </div>
            <input disabled type="text" class="form-control valid validText" id="txt_curso" name="txt_curso" value="<?php echo $obj_profesor->curso; ?>"/>
        </div>
    </div>
   
    <div class="col-4">
        <label for="txt_name">Numero de Celular <i class="text-danger" title="Ingrese asunto">*</i></label>
        <label class="text-danger msj_txt_name"></label>  
        <div class="input-group mb-2">
            <div class="input-group-prepend ">
            <span class="input-group-text"><i class="fas fa-align-left"></i></span>
            </div>
            <input disabled type="text" class="form-control valid validNumber" id="txt_num_cel" name="txt_num_cel" value="<?php echo $obj_profesor->nro_celular; ?>"/>
        </div>
    </div>
   
    
    
    
</div>

<script src="view/js/valid.js"></script>
<script>
    fntValidText();
    fntValidTextSpecial();
    fntValidEmail();
    fntValidNumber();
</script>