<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Roboto+Slab:wght@100;400;900&display=swap" rel="stylesheet">
    <link href="/dist/output.css" rel="stylesheet">
    <title>Crear Alumno</title>
</head>

<body>

    <main class="w-screen h-screen flex flex-col items-center bg-slate-200">

        <a href="../alumnos.php" class="flex w-full p-2 font-slab items-center">
            <div class="w-5 h-5">
                <img src="../../../../PFN3/assets/back.svg" alt="back" class="h-full w-full">
            </div>
            Volver
        </a>

        <form action="../../../controller/create/alumno_crear.php" method="post" id="editarPermisos" class="bg-white w-11/12 flex-col font-slab p-5 border rounded-xl sm:w-80">
            <h1 class="text-2xl">
                Crear Alumno
            </h1>
            <hr>

            <div class="flex flex-col">
                <label for="dni" class="pt-5">
                    DNI del alumno
                </label>
                <input type="number" name="dni" id="dni" class="border rounded-md pl-3 focus:outline-none">
            </div>
            <div class="flex flex-col">
                <label for="email" class="pt-5">
                    Email del alumno
                </label>
                <input type="email" name="correo" id="email" value="@alumno.edu" class="border rounded-md pl-3 focus:outline-none">
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

            <hr class="my-5">

                <button type="submit" class="bg-blue-500 rounded-lg px-4 py-1 text-slate-100">
                    Crear Alumno
                </button>

        </form>

    </main>

</body>

</html>