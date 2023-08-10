<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Roboto+Slab:wght@100;400;900&display=swap" rel="stylesheet">
    <link href="/dist/output.css" rel="stylesheet">
    <title>Crear Clase</title>
</head>
<?php
require_once($_SERVER['DOCUMENT_ROOT'] . "/src/controller/read/maestros_disponibles_read.php");
extract($disponibles);
?>
<body>

    <main class="w-screen h-screen flex flex-col items-center bg-slate-200">

        <a href="../clases.php" class="flex w-full p-2 font-slab items-center">
            <div class="w-5 h-5">
                <img src="../../../../PFN3/assets/back.svg" alt="back" class="h-full w-full">
            </div>
            Volver
        </a>

        <form action="../../../controller/create/clase_crear.php" method="post" id="editarPermisos" class="bg-white w-11/12 flex-col font-slab p-5 border rounded-xl sm:w-80">
            <h1 class="text-2xl">
                Crear Clase
            </h1>
            <hr>

            <div class="flex flex-col">
                <label for="nombre_clase" class="pt-5">
                    Nombre de la clase
                </label>
                <input type="text" name="nombre_clase" id="nombre_clase" class="border rounded-md pl-3 focus:outline-none">
            </div>

            <div class="flex flex-col my-5">
                <label for="rol">
                    Asignar Maestro Disponible
                </label>
                <select name="id_maestro" class="border rounded-md">
                    <?php
                    foreach ($disponibles as $maestro) {
                        extract($maestro);
                    ?>
                        <option value="<?php echo $id_maestro; ?>"><?php echo "$nombre $apellido"; ?></option>
                    <?php
                    }
                    ?>
                </select>
            </div>

            <hr class="my-5">

                <button type="submit" class="bg-blue-500 rounded-lg px-4 py-1 text-slate-100">
                    Crear Clase
                </button>

        </form>

    </main>

</body>

</html>