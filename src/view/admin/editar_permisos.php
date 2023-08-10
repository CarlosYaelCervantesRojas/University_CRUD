<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Roboto+Slab:wght@100;400;900&display=swap" rel="stylesheet">
    <link href="/dist/output.css" rel="stylesheet">
    <script src="../js/userActive.js" defer></script>
    <title>Editar Permisos</title>
</head>

<body>
<?php
session_start();
extract($_POST);
?>
    <main class="w-screen h-screen flex flex-col items-center bg-slate-200">

        <a href="../../view/admin/permisos.php" class="flex w-full p-5 font-slab items-center">
            <div class="w-5 h-5">
                <img src="../../../PFN3/assets/back.svg" alt="back" class="h-full w-full">
            </div>
            Volver
        </a>

        <form action="../../controller/update/actualizar_permisos.php" method="post" id="editarPermisos" class="bg-white w-11/12 flex-col font-slab p-5 border rounded-xl sm:w-80">
            <h1 class="text-2xl">
                Editar Permiso
            </h1>
            <hr>
            <div class="my-5">
                <label for="email" class="pt-5">
                    Email del usuario
                </label>
                <input readonly type="email" name="correo" id="email" value="
                <?php echo $correo; ?>" class="border rounded-md pl-3 focus:outline-none">
            </div>
            
            <div class="flex flex-col my-5">
                <label for="rol">
                    Rol del usuario
                </label>
                <select name="rol" id="rol" class="border rounded-md">
                    <option value="1">Administrador</option>
                    <option value="2">Maestro</option>
                    <option value="3">Alumno</option>
                </select>
            </div>
           
            <div class="flex items-center gap-2 mb-3">
                <div id="activo" class="w-10 h-5 bg-green-400 rounded-full flex items-center">
                    <input id="editar" value="1" name="status" type="text" class="h-5 w-5 bg-gray-200 rounded-full text-transparent focus:outline-none">
                </div>
                <label for="activo">
                    Usuario Activo
                </label>
            </div>
            <hr class="my-5">
            <button type="submit" class="bg-blue-500 rounded-lg px-4 py-1 text-slate-100">
                Guardar cambios
            </button>
        </form>

    </main>

</body>

</html>