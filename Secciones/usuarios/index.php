<?php

require_once("../../bd.php");
if (isset($_GET["txtID"])) { // lógica para eliminar un usuario
    // Recolectar los datos del metodo GET
    $txtID = (isset($_GET["txtID"]) ? $_GET["txtID"] : "");
    // Preparar la eliminación de los datos
    $sentencia = $conexion->prepare("DELETE FROM `tbl_usuarios` WHERE `id`=:id");
    // Asignamos los valores que vienen del metodo GET a la consulta
    $sentencia->bindValue(":id", $txtID);
    $sentencia->execute();
    header("Location:index.php");
}
$sentencia = $conexion->prepare("SELECT * FROM `tbl_usuarios`");
$sentencia->execute();
$lista_tbl_usuarios = $sentencia->fetchAll(PDO::FETCH_ASSOC);

?>
<?php require_once("../../templates/header.php") ?>
<h1>Usuarios</h1>
<div class="card">
    <div class="card-header">
        <a name="" id="" class="btn btn-primary" href="./crear.php" role="button">Agregar Registro</a>
    </div>
    <div class="card-body">
        <div class="table-responsive">
            <table class="table">
                <thead>
                    <tr>
                        <th scope="col">ID</th>
                        <th scope="col">Nombre del usuario</th>
                        <th scope="col">Contraseña</th>
                        <th scope="col">Correo</th>
                        <th scope="col">Acciones</th>
                    </tr>
                </thead>
                <tbody>
                    <?php foreach ($lista_tbl_usuarios as $registro) { ?>
                        <tr class="">
                            <td scope="row">
                                <?php echo $registro['id']; ?>
                            </td>
                            <td>
                                <?php echo $registro['usuario']; ?>
                            </td>
                            <td>
                                *******
                            </td>
                            <td>
                                <?php echo $registro['correo']; ?>
                            </td>
                            <td>
                                <a name="" id="" class="btn btn-info" href="editar.php?txtID=<?php echo $registro['id']; ?>"
                                    role="button">Editar</a>
                                <a name="" id="" class="btn btn-danger"
                                    href="index.php?txtID=<?php echo $registro['id']; ?>" role="button">Eliminar</a>
                            </td>
                        </tr>
                    <?php } ?>
                </tbody>
            </table>
        </div>
    </div>
</div>
<?php require_once("../../templates/footer.php") ?>