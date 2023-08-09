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

require_once($_SERVER['DOCUMENT_ROOT'] . "/src/controller/read/permisos_read.php");

extract($info);
?>

<body>
    <main class="w-screen h-screen bg-slate-300 flex flex-col items-center">
        <a href="../dashboard.php" class="flex w-full p-5 font-slab items-center">
            <div class="w-5 h-5">
                <img src="../../../PFN3/assets/back.svg" alt="back" class="h-full w-full">
            </div>
            Volver
        </a>
        <table class="font-slab table-fixed w-11/12 overflow-x-auto block">
            <tr class="text-slate-100">
                <th class="bg-slate-700 px-3">ID</th>
                <th class="bg-slate-700 px-5">Correo/Usuario</th>
                <th class="bg-slate-700 px-5">Permiso</th>
                <th class="bg-slate-700 px-5">Estado</th>
                <th class="bg-slate-700 px-3">Acción</th>
            </tr>
            <?php foreach ($info as $persona) { ?>
                <tr class="text-center bg-slate-100 border border-slate-700">
                    <td><?php echo $persona['id_user_login']; ?></td>
                    <td>
                        <form action="./editar_permisos.php" method="post">
                            <input type="email" name="correo" id="correo" readonly value="
                            <?php echo $persona['correo']; ?>
                            "
                            class="bg-transparent text-center focus:outline-none"
                        >
                    </td>
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
                                    echo "Activo";
                                    break;
                                case 0:
                                    echo "Bloqueado";
                                    break;
                            }
                        ?>
                    </td>
                    <td class="flex justify-center items-center">
                        <button type="submit" class="h-7 w-7 hover:cursor-pointer">
                            <img src="../../../PFN3/assets/edit.svg" alt="edit" class="h-full w-full">
                        </button>
                        </form>
                    </td>
                </tr>
            <?php } ?>

        </table>

    </main>
</body>

</html>