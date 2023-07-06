<!doctype html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.1/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-iYQeCzEYFbKjA/T2uDLTpkwGzCiq6soy8tYaI1GyVh/UjpbCx/TYkiZhlZB6+fzT" crossorigin="anonymous">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.5.0/font/bootstrap-icons.css">
    <link rel="icon" href="assets/pdvsa.png" type="image/x-icon" />
    <link rel="stylesheet" href="styles/a.css">
    <title>PDVSA</title>
</head>

<body>

    <?php
    include_once "conexion.php";
    $sentencia = $bd->query("select * from medicion M INNER JOIN pozo P ON P.id_pozo=M.pozo_id WHERE P.id_pozo=" . $_GET['id_pozo'] . "");
    $medicion = $sentencia->fetchAll(PDO::FETCH_OBJ);
    ?>

    <div class="container mt-5">
        <div class="row justify-content-center">
            <div class="col-md-7">
                <!-- alerta -->

                <?php
                if (isset($_GET['mensaje']) and $_GET['mensaje'] == 'falta') {
                    ?>
                    <div class="alert alert-danger alert-dismissible fade show" role="alert">
                        <strong>Error!</strong> Rellena todos los campos.
                        <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                    </div>
                    <?php
                }
                ?>
                <?php
                if (isset($_GET['mensaje']) and $_GET['mensaje'] == 'registrado') {
                    ?>
                    <div class="alert alert-success alert-dismissible fade show" role="alert">
                        <strong>Registrado</strong> Se agregó una Medicion.
                        <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                    </div>
                    <?php
                }
                ?>

                <?php
                if (isset($_GET['mensaje']) and $_GET['mensaje'] == 'error') {
                    ?>
                    <div class="alert alert-danger alert-dismissible fade show" role="alert">
                        <strong>Error!</strong> Vuelve a intentar.
                        <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                    </div>
                    <?php
                }
                ?>

                <?php
                if (isset($_GET['mensaje']) and $_GET['mensaje'] == 'editado') {
                    ?>
                    <div class="alert alert-success alert-dismissible fade show" role="alert">
                        <strong>Cambiado!</strong> Los datos fueron actualizados.
                        <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                    </div>
                    <?php
                }
                ?>

                <!-- alerta -->

                <div class="card">
                    <div class="card-header">
                        Mediciones del pozo:
                    </div>
                    <div class="p-4">
                        <table class="table align-middle">
                            <thead>
                                <tr>
                                    <th scope="col">#</th>
                                    <th scope="col">Medicion (psi)</th>
                                    <th scope="col">Fecha de registro</th>
                                    <th scope="col" colspan="3">Opciones</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php
                                foreach ($medicion as $dato) {
                                    ?>
                                    <tr>
                                        <td scope="row">
                                            <?php echo $dato->id_medicion; ?>
                                        </td>
                                        <td>
                                            <?php echo $dato->psi; ?>
                                        </td>
                                        <td>
                                            <?php echo $dato->fecha; ?>
                                        </td>
                                        <td>
                                            <a class="text-primary"
                                                href="grafica.php?id_medicion=<?php echo $dato->id_medicion; ?>&id_pozo=<?php echo $_GET['id_pozo'] ?>&date=<?php echo $dato->fecha ?>">
                                                <button type="button" class="btn btn-primary">Gráfica</button>
                                            </a>
                                        </td>
                                        <td>
                                            <a class="text-success"
                                                href="editarMedicion.php?id_medicion=<?php echo $dato->id_medicion; ?>&id_pozo=<?php echo $_GET['id_pozo'] ?>">
                                                <button type="button" class="btn btn-success">Editar</button>
                                            </a>
                                        </td>
                                        <td>
                                            <a onclick="return confirm('Estas seguro de eliminar?');" class="text-danger"
                                                href="eliminarMedicion.php?id_medicion=<?php echo $dato->id_medicion; ?><?php echo '&id_pozo=' . $_GET['id_pozo'] ?>">
                                                <button type="button" class="btn btn-danger">Eliminar</button>
                                            </a>
                                        </td>
                                    </tr>
                                    <?php
                                }
                                ?>
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>

            <div class="col-md-4">
                <div class="card">
                    <div class="card-header">
                        Ingrese mediciones del Pozo:
                    </div>
                    <form
                        action="registrarMedicion.php<?php echo (array_key_exists("id_pozo", $_GET) ? "?pozo_id=" . $_GET['id_pozo'] : ""); ?>"
                        class="p-4" method="POST">
                        <div class="mb-3">
                            <label class="form-label">Medicion:</label>
                            <input type="number" name="medicion" class="form-control" autofocus require>
                        </div>
                        <div class="d-grid">
                            <?php if (array_key_exists("id_pozo", $_GET)) { ?><input type="hidden" name="pozo_id"
                                value="<?php echo $_GET['id_pozo'] ?>"><?php } ?>
                            <input type="hidden" name="oculto" value="1">
                            <input type="submit" class="btn btn-outline-success" value="Registrar">
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
    <footer class="contairner">
        <div class="row-2">
            <div class="col-md text-light text-center py-3">
                <button class="btn btn-secondary" type="submit" onClick="document.location.href='index.php'">
                    Volver
                </button>
            </div>
        </div>
    </footer>
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.6/dist/umd/popper.min.js"
        integrity="sha384-oBqDVmMz9ATKxIep9tiCxS/Z9fNfEXiDAYTujMAeBAsjFuCZSmKbSSUnQlmh/jp3" crossorigin="anonymous">
        </script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.1/dist/js/bootstrap.min.js"
        integrity="sha384-7VPbUDkoPSGFnVtYi0QogXtr74QeVeeIs99Qfg5YCF+TidwNdjvaKZX19NZ/e6oz" crossorigin="anonymous">
        </script>
</body>
</html>