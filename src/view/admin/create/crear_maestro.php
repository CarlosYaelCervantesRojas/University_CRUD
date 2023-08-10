<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Roboto+Slab:wght@100;400;900&display=swap" rel="stylesheet">
    <link href="/dist/output.css" rel="stylesheet">
    <title>Crear Maestro</title>
</head>

<body>
    <?php
    // session_start();
    // print_r($_SESSION);
    // print_r($_POST);
    require_once($_SERVER['DOCUMENT_ROOT'] . "/src/controller/read/clases_read.php");

    extract($clases);
    // extract($_POST);
    ?>
    <main class="w-screen h-screen flex flex-col items-center bg-slate-200">

        <a href="../maestros.php" class="flex w-full p-2 font-slab items-center">
            <div class="w-5 h-5">
                <img src="../../../../PFN3/assets/back.svg" alt="back" class="h-full w-full">
            </div>
            Volver
        </a>

        <form action="../../../controller/create/maestro_crear.php" method="post" id="editarPermisos" class="bg-white w-11/12 flex-col font-slab p-5 border rounded-xl sm:w-80">
            <h1 class="text-2xl">
                Crear Maestro
            </h1>
            <hr>
            <div class="flex flex-col">
                <label for="email" class="pt-5">
                    Email del maestro
                </label>
                <input type="email" name="correo" id="email" value="@maestro.edu" class="border rounded-md pl-3 focus:outline-none">
            </div>

            <div class="flex flex-col">
                <label for="nombre" class="pt-5">
                    Nombre(s)
                </label>
                <input type="text" name="nombre" id="nombre" class="border rounded-md pl-3 focus:outline-none">
            </div>

            <div class="flex flex-col">
                <label for="apellido" class="pt-5">
                    Apellido(s)
                </label>
                <input type="text" name="apellido" id="apellido" class="border rounded-md pl-3 focus:outline-none">
            </div>

            <div class="flex flex-col">
                <label for="direccion" class="pt-5">
                    Dirección
                </label>
                <input type="text" name="direccion" id="direccion" class="border rounded-md pl-3 focus:outline-none">
            </div>


            <div class="flex flex-col my-5">
                <label for="rol">
                    Asignar Clase
                </label>
                <select name="id_clase" class="border rounded-md">
                    <?php
                    foreach ($clases as $clase) {
                    ?>
                        <option value="<?php echo $clase['id_clase']; ?>"><?php echo $clase['nombre_clase']; ?></option>
                    <?php
                    }
                    ?>
                </select>
            </div>

            <hr class="my-5">

                <button type="submit" class="bg-blue-500 rounded-lg px-4 py-1 text-slate-100">
                    Crear maestro
                </button>

        </form>

    </main>

</body>

</html>