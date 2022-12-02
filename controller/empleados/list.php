<?php
session_start();
include_once "../../model/empleado.php";
$obj_empleado = new Empleado();
$rs = $obj_empleado->read();
$count =0;
?>
<table id="table_empleados" class="table table-bordered table-striped table-sm" style="font-size: 16px;">
    <thead>
        <tr>
            <th>N°</th>
            <th>ID</th>
            <th>Empleado</th>
            <th>Documento</th>
            <th>Tipo de empleado</th>
            <th>email</th>
            <th>Celular</th>
            <th>Estado</th>
            <th>Acciones</th>

        </tr>
    </thead>
    <tbody>
        <?php while ($fila = mysqli_fetch_assoc($rs)) {
            $count++;
            if ($fila["estado"] == 0) {
                $accion = '<button data-id="' . $fila["id_empleado"] . '" 
                title="Activar" class="btn btn-xs btn-success activar-item" id="btn_item' . $fila["id_empleado"] . '">
                <i class="fas fa-user-check" id="icon_item' . $fila["id_empleado"] . '"></i></button>';
            } else {
                $accion = '<button data-id="' . $fila["id_empleado"] . '"     
                title="Inactivar" class="btn btn-xs btn-danger desactivar-item" id="btn_item' . $fila["id_empleado"] . '">
                <i class="far fa-trash-alt" id="icon_item' . $fila["id_empleado"] . '"></i></button>';
            }
            if ($_SESSION['rango'] == "admin"||$_SESSION['rango']=="Secretario") {
                $btn_editar = '<button data-id="' . $fila["id_empleado"] . '"
                 title="Mas detalle" class="btn btn-xs btn-warning new-modal-empleado"><i class="far fa-edit"></i></button>';
            } else {
                $btn_editar = "";
            } ?>
            <tr>
                <td><?php echo $count ?></td>
                <td><?php echo $fila["id_empleado"] ?></td>
                <td><?php echo $fila["nombres"] . " " . $fila['apellido_paterno'] . " " . $fila['apellido_materno'] ?></td>
                <td><?php echo $fila['nro_documento'] ?></td>
                <td><?php echo $fila['tipo_empleado'] ?></td>
                <td><?php echo $fila['email'] ?></td>
                <td><?php echo $fila['nro_celular'] ?></td>
                <td style="color: <?php if ($fila["estado"] == 0) {
                                        echo "red";
                                    } else {
                                        echo "green";
                                    } ?>;">
                    <?php if ($fila["estado"] == 0) {
                        echo "Inactivo";
                    } else {
                        echo "Activo";
                    } ?>
                </td>
                <td>
                    <?php
                    echo $btn_editar;
                    if($_SESSION['rango'] == "admin"||$_SESSION['rango'] == "Secretario"){
                        echo $accion;
                        }  ?>
                    <button data-id="<?php echo $fila['id_empleado'] ?>" title="Modificar" class="btn btn-xs btn-primary new-modal-show-requerimiento"><i class="far fa-eye"></i></button>
                </td>
            </tr>
        <?php } ?>
    </tbody>
</table>

<script>
    $(function() {

        $("#table_empleados").DataTable({
            "paging": true,
            "lengthChange": true,
            "searching": true,
            "ordering": false,
            "info": true,
            "autoWidth": false,
        });

    });
</script>
