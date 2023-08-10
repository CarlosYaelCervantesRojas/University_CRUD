<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Roboto+Slab:wght@100;400;900&display=swap" rel="stylesheet">
    <link href="/dist/output.css" rel="stylesheet">
    <title>Editar Clase</title>
</head>

<body>
    <?php
    extract($_POST);
    require_once($_SERVER['DOCUMENT_ROOT'] . "/src/controller/read/maestros_disponibles_read.php");
    extract($disponibles);
    ?>
    <main class="w-screen h-screen flex flex-col items-center bg-slate-200">

        <a href="../../admin/clases.php" class="flex w-full p-2 font-slab items-center">
            <div class="w-5 h-5">
                <img src="../../../../PFN3/assets/back.svg" alt="back" class="h-full w-full">
            </div>
            Volver
        </a>

        <form action="../../../controller/update/actualizar_clase.php" method="post" id="editarPermisos" class="bg-white w-11/12 flex-col font-slab p-5 border rounded-xl sm:w-80">
            <h1 class="text-2xl">
                Editar Clase
            </h1>
            <hr>

            <div class="flex flex-col">
                <label for="nombre_clase" class="pt-5">
                    Nombre de la clase
                </label>
                <input type="text" readonly name="nombre_clase" id="nombre_clase" value="<?php echo $nombre_clase; ?>" class="border rounded-md pl-3 focus:outline-none">
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

            <input type="number" name="id_clase" value="<?php echo $id_clase;?>" class="hidden">
            <input id="inputB" type="number" name="borrar" readonly value="" class="hidden">
            <hr class="my-5">
            <div class="flex gap-10">
                <button id="enviar" class="bg-blue-500 rounded-lg px-4 py-1 text-slate-100">
                    Guardar cambios
                </button>
                <button id="borrar" class="h-10 w-10 bg-red-500 rounded-md">
                    <img src="../../../../PFN3/assets/delete.svg" alt="delite" class="h-full w-full">
                </button>
            </div>
        </form>

    </main>

</body>

                    <script>
                        let enviar = document.getElementById('enviar');
                        let borrar = document.getElementById('borrar');
                        let inputB = document.getElementById('inputB');

                        enviar.addEventListener('click', ()=>{
                            enviar.setAttribute('type', 'submit');
                            inputB.value = 0;
                        });

                        borrar.addEventListener('click', ()=>{
                            borrar.setAttribute('type', 'submit');
                            inputB.value = 1;
                        });

                    </script>

</html>