<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Roboto+Slab:wght@100;400;900&display=swap" rel="stylesheet">
    <link href="/dist/output.css" rel="stylesheet">
    <title>Administrar Permisos</title>
</head>
<?php
session_start();
// print_r($_SESSION['usuarios']);
extract($_SESSION);
?>

<body>
    <main class="w-screen">
        <table class="font-slab">
            <tr class="text-slate-100">
                <th class="bg-slate-700">ID</th>
                <th class="bg-slate-700">Correo/Usuario</th>
                <th class="bg-slate-700">Permiso</th>
                <th class="bg-slate-700">Estado</th>
                <th class="bg-slate-700">Acción</th>
            </tr>
            <?php foreach ($usuarios as $persona) { ?>
                <tr>
                    <td><?php echo $persona['id_user_login']; ?></td>
                    <td><?php echo $persona['correo']; ?></td>
                    <td>
                        <?php 
                            switch ($persona['rol']) {
                                case 1:
                                    echo "Administrador";
                                    break;
                                case 2:
                                    echo "Maestro";
                                    break;
                                case 3:
                                    echo "Alumno";
                                    break;
                            }
                        ?>
                    </td>
                    <td>
                        <?php 
                            switch ($persona['status']) {
                                case 1:
                                    echo "Permitido";
                                    break;
                                case 0:
                                    echo "Bloqueado";
                                    break;
                            }
                        ?>
                    </td>
                    <td>
                        
                    </td>
                </tr>
            <?php } ?>

        </table>
    </main>
</body>

</html>