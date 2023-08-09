<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Roboto+Slab:wght@100;400;900&display=swap" rel="stylesheet">
    <link href="/dist/output.css" rel="stylesheet">
    <title>Editar Maestros</title>
</head>

<body>
    <?php
    session_start();
    // print_r($_SESSION);
    // print_r($_POST);
    require_once($_SERVER['DOCUMENT_ROOT'] . "/src/controller/read/clases_read.php");

    extract($clases);
    extract($_POST);
    ?>
    <main class="w-screen h-screen flex flex-col items-center bg-slate-200">

        <a href="../../view/admin/maestros.php" class="flex w-full p-2 font-slab items-center">
            <div class="w-5 h-5">
                <img src="../../../PFN3/assets/back.svg" alt="back" class="h-full w-full">
            </div>
            Volver
        </a>

        <form action="../../controller/update/actualizar_maestro.php" method="post" id="editarPermisos" class="bg-white w-11/12 flex-col font-slab p-5 border rounded-xl sm:w-80">
            <h1 class="text-2xl">
                Editar Maestro
            </h1>
            <hr>
            <div class="flex flex-col">
                <label for="email" class="pt-5">
                    Email del maestro
                </label>
                <input readonly type="email" name="correo" id="email" value="
                <?php echo $correo; ?>" class="border rounded-md pl-3 focus:outline-none">
            </div>

            <div class="flex flex-col">
                <label for="nombre" class="pt-5">
                    Nombre(s)
                </label>
                <input type="text" name="nombre" id="nombre" value="<?php echo $nombre; ?>" class="border rounded-md pl-3 focus:outline-none">
            </div>

            <div class="flex flex-col">
                <label for="apellido" class="pt-5">
                    Apellido(s)
                </label>
                <input type="text" name="apellido" id="apellido" value="<?php echo $apellido; ?>" class="border rounded-md pl-3 focus:outline-none">
            </div>

            <div class="flex flex-col">
                <label for="direccion" class="pt-5">
                    Dirección
                </label>
                <input type="text" name="direccion" id="direccion" value="<?php echo $direccion; ?>" class="border rounded-md pl-3 focus:outline-none">
            </div>


            <!-- <div class="flex flex-col my-5">
                <label for="rol">
                    Asignar Nueva Clase
                </label>
                <select name="nombre_clase" class="border rounded-md">
                    <option value="0">Nunguna</option>
                    <?php
                    foreach ($clases as $clase) {
                    ?>
                        <option value="<?php echo $clase['id_clase']; ?>"><?php echo $clase['nombre_clase']; ?></option>
                    <?php
                    }
                    ?>
                </select>
            </div> -->
            <input type="number" name="id_user_login" readonly value="<?php echo $id_user_login; ?>" class="bg-transparent text-center focus:outline-none hidden">
            <hr class="my-5">
            <button type="submit" class="bg-blue-500 rounded-lg px-4 py-1 text-slate-100">
                Guardar cambios
            </button>
        </form>

    </main>

</body>

</html>