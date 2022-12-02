<?php
session_start();
include_once "../../model/asistencia_empleado.php";
ini_set('date.timezone','America/Lima');
$obj_asistencia_empleado = new asistencia_empleado();
$rs = $obj_asistencia_empleado->read();
$count =0;


?>
<table id="table_asistencia_empleado" class="table table-bordered table-striped table-sm" style="font-size: 16px;">
    <thead>
        <tr>
            <th>N°</th>
            <th>ID</th>
            <th>Empleado</th>
            <th>Asistencia</th>
            <th>Fecha</th>

        </tr>
    </thead>
    <tbody>
        <?php while ($fila = mysqli_fetch_assoc($rs)) {
            $count++;
           
            
            if ($_SESSION['rango'] == "admin" ||$_SESSION['rango'] == "Secretario") {
                $btn_editar = '<button data-id="' . $fila["id_asistencia_empleado"] . '"
                 title="Mas detalle" class="btn btn-xs btn-warning new-modal-empleado"><i class="far fa-edit"></i></button>';
            } else {
                $btn_editar = "";
            }
            ?>
            <tr>
                <td><?php echo $count ?></td>
                <td><?php echo $fila["id_asistencia_empleado"] ?></td>
                <td><?php echo $fila["nombres"] . " " . $fila['apellido_paterno'] . " " . $fila['apellido_materno'] ?></td>
                <td><?php echo $fila['asistencia'] ?></td>
                <td><?php echo $fila['fecha'] ?></td>
                
                
            </tr>
        <?php } ?>
    </tbody>
</table>
<script>
    $(function() {

        $("#table_asistencia_empleado").DataTable({
            "paging": true,
            "lengthChange": true,
            "searching": true,
            "ordering": false,
            "info": true,
            "autoWidth": false,
        });

    });
</script>