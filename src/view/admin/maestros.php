<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Roboto+Slab:wght@100;400;900&display=swap" rel="stylesheet">
    <link href="/dist/output.css" rel="stylesheet">
    <title>Administrar Maestros</title>
</head>
<?php
session_start();
extract($_SESSION);

require_once($_SERVER['DOCUMENT_ROOT'] . "/src/controller/read/maestros_read.php");
require_once($_SERVER['DOCUMENT_ROOT'] . "/src/controller/read/clases_read.php");
// print_r($info);
// print_r($clases);
extract($clases);
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
                <th class="bg-slate-700 px-5">Nombre</th>
                <th class="bg-slate-700 px-5">Apellido</th>
                <th class="bg-slate-700 px-5">Dirección</th>
                <th class="bg-slate-700 px-3">Clase Asignada</th>
                <th class="bg-slate-700 px-3">Acciones</th>
            </tr>
            <?php foreach ($info as $persona) { ?>
                <tr class="text-center bg-slate-100 border border-slate-700">
                    <form action="./editar_maestros.php" method="post">
                        <td>
                            <input type="number" name="id_user_login" readonly value="<?php echo $persona['id_user_login']; ?>" class="bg-transparent text-center focus:outline-none w-20">
                        </td>

                        <td>
                            <input type="email" name="correo" readonly value="<?php echo $persona['correo']; ?>" class="bg-transparent text-center focus:outline-none">
                        </td>

                        <td>
                            <input type="text" name="nombre" readonly value="<?php echo $persona['nombre']; ?>" class="bg-transparent text-center focus:outline-none">
                        </td>
                        <td>
                        <input type="text" name="apellido" readonly value="<?php echo $persona['apellido']; ?>" class="bg-transparent text-center focus:outline-none">
                        </td>
                        
                        <td>
                            <input type="text" name="direccion" readonly value="<?php echo $persona['direccion']; ?>" class="bg-transparent text-center focus:outline-none">
                        </td>
                                                
                        <td><?php 
                            foreach ($clases as $nombreClase) {
                                if ($persona['clase_asignada'] === $nombreClase['id_clase']) {
                                    echo $nombreClase['nombre_clase'];
                                }
                            }
                        ?></td>
                        
                        <td class="flex justify-center items-center">
                            <button type="submit" class="h-7 w-7 hover:cursor-pointer">
                                <img src="../../../PFN3/assets/edit.svg" alt="edit" class="h-full w-full">
                            </button>
                        </td>
                    </form>
                </tr>
            <?php } ?>

        </table>
        
        <div class="w-full pt-5 flex justify-center">
            <a href="./create/crear_maestro.php" class="bg-blue-500 font-slab text-slate-200 rounded-lg px-5 py-1 mt-2">
                Crear Maestro
            </a>
        </div>

    </main>
</body>

</html>