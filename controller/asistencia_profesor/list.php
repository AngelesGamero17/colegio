<?php
session_start();
include_once "../../model/asistencia_profesor.php";
$obj_asistencia_profesor = new asistencia_profesor();
$rs = $obj_asistencia_profesor->read();
$count =0;
?>
<table id="table_asistencia_profesor" class="table table-bordered table-striped table-sm" style="font-size: 16px;">
    <thead>
        <tr>
            <th>N°</th>
            <th>ID</th>
            <th>Profesor</th>
            <th>Asistencia</th>
            <th>Fecha</th>

        </tr>
    </thead>
    <tbody>
        <?php while ($fila = mysqli_fetch_assoc($rs)) {
            $count++;

            if ($_SESSION['rango'] == "admin") {
                $btn_editar = '<button data-id="' . $fila["id_asistencia_profesor"] . '"
                 title="Mas detalle" class="btn btn-xs btn-warning new-modal-profesor"><i class="far fa-edit"></i></button>';
            } else {
                $btn_editar = "";
            }
            if ($_SESSION['rango'] != "admin") {
                $accion = "";
            } ?>
            <tr>
                <td><?php echo $count ?></td>
                <td><?php echo $fila["id_asistencia_profesor"] ?></td>
                <td><?php echo $fila["nombres"] . " " . $fila['apellido_paterno'] . " " . $fila['apellido_materno'] ?></td>
                <td><?php echo $fila['asistencia'] ?></td>
                <td><?php echo $fila['fecha'] ?></td>

                
            </tr>
        <?php } ?>
    </tbody>
</table>
<script>
    $(function() {

        $("#table_asistencia_profesor").DataTable({
            "paging": true,
            "lengthChange": true,
            "searching": true,
            "ordering": false,
            "info": true,
            "autoWidth": false,
        });

    });
</script>