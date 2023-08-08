<?php
    session_start();
    if ($_SESSION['rol']) {
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Roboto+Slab:wght@100;400;900&display=swap" rel="stylesheet">
    <link href="/dist/output.css" rel="stylesheet">
    <script src="./js/navBar.js" defer></script>
    <title>Dashboard</title>
</head>

<body>

    <main class="h-screen bg-slate-100 sm:flex">
        <nav id="nav" class="absolute z-10 h-screen w-screen bg-slate-700 font-slab text-slate-100 hidden sm:w-1/4 sm:static">
            <div class="flex items-center p-5 border-b-2 justify-between sm:justify-evenly">
                <div class="h-14 w-14">
                    <img src="../../PFN3/assets/logoWhite.png" alt="logo" class="h-full w-full rounded-full">
                </div>
                <h3 class="text-xl">
                    Universidad
                </h3>
                <div id="close" class="h-8 w-8 hover:cursor-pointer sm:hidden">
                    <img src="../../PFN3/assets/close.svg" alt="close" class="h-full w-full">
                </div>
            </div>
            <div class="flex justify-center items-center h-24 border-b-2">
                <?php
                switch ($_SESSION['rol']) {
                    case 1:
                        echo "<p>Administrador</p>";
                        break;
                    case 2:
                        echo "<p>Maestro</p>";
                        break;
                    case 3:
                        echo "<p>Alumno</p>";
                        break;

                    default:
                        echo "<p>Administrador</p>";
                        break;
                }
                ?>
            </div>
            <div class="flex flex-col items-center">
                <h3 class="py-5 text-xl">
                    Menu
                    <?php
                    switch ($_SESSION['rol']) {
                        case 1:
                            echo "Administración";
                            break;
                        case 2:
                            echo "Maestros";
                            break;
                        case 3:
                            echo "Alumno";
                            break;

                        default:
                            echo "Administrador";
                            break;
                    }
                    ?>
                </h3>

                <?php
                switch ($_SESSION['rol']) {
                    case 1:
                ?>
                        <ul class="w-full flex flex-col gap-5">

                            <li>
                                <a href="../controller/read/permisos_read.php" class="flex items-center">
                                    <div class="h-10 w-10 mx-5">
                                        <img src="../../PFN3/assets/manage.svg" alt="manage" class="h-full w-full">
                                    </div>
                                    <p>Permisos</p>
                                </a>
                            </li>

                            <li>
                                <a href="../controller/read/maestros_read.php" class="flex items-center">
                                    <div class="h-10 w-10 mx-5">
                                        <img src="../../PFN3/assets/maestro.svg" alt="maestro" class="h-full w-full">
                                    </div>
                                    <p>Maestros</p>
                                </a>
                            </li>

                            <li>
                                <a href="../controller/read/alumnos_read.php" class="flex items-center">
                                    <div class="h-10 w-10 mx-5">
                                        <img src="../../PFN3/assets/alumno.svg" alt="alumnos" class="h-full w-full">
                                    </div>
                                    <p>Alumnos</p>
                                </a>
                            </li>

                            <li>
                                <a href="../controller/read/clases_read.php" class="flex items-center">
                                    <div class="h-10 w-10 mx-5">
                                        <img src="../../PFN3/assets/clases.svg" alt="clases" class="h-full w-full">
                                    </div>
                                    <p>Clases</p>
                                </a>
                            </li>

                        </ul>
                <?php
                        break;
                    case 2:
                ?>
                        <ul class="w-full flex flex-col gap-5">
                            <li>
                                <a href="../controller/read/alumnos_read.php" class="flex items-center">
                                    <div class="h-10 w-10 mx-5">
                                        <img src="../../PFN3/assets/alumno.svg" alt="alumnos" class="h-full w-full">
                                    </div>
                                    <p>Alumnos</p>
                                </a>
                            </li>
                        </ul>
                <?php
                        break;
                    case 3:
                ?>
                        <ul class="w-full flex flex-col gap-5">
                            <li>
                                <a href="" class="flex items-center">
                                    <div class="h-10 w-10 mx-5">
                                        <img src="../../PFN3/assets/calificaciones.svg" alt="alumnos" class="h-full w-full">
                                    </div>
                                    <p>Ver calificaciones</p>
                                </a>
                            </li>
                            <li>
                                <a href="" class="flex items-center">
                                    <div class="h-10 w-10 mx-5">
                                        <img src="../../PFN3/assets/inscri.svg" alt="alumnos" class="h-full w-full">
                                    </div>
                                    <p>Administrar Clases</p>
                                </a>
                            </li>
                        </ul>
                <?php
                }
                ?>

            </div>
        </nav>
        <section class="relative z-0 sm:static sm:w-full">
            <header class="border flex justify-between font-slab px-2 bg-white">
                <div class="flex items-center">
                    <div id="menu" class="h-10 w-10 pr-2 hover:cursor-pointer">
                        <img src="../../PFN3/assets/menu.svg" alt="menu" class="h-full w-full">
                    </div>
                    <p>
                        Home
                    </p>
                </div>
                <div id="out" class="flex items-center hover:cursor-pointer">
                    <?php
                    switch ($_SESSION['rol']) {
                        case 1:
                            echo "<p>Administrador</p>";
                            break;
                        case 2:
                            echo "<p>Maestro</p>";
                            break;
                        case 3:
                            echo "<p>Alumno</p>";
                            break;

                        default:
                            echo "<p>Administrador</p>";
                            break;
                    }
                    ?>
                    <div class="w-5 h-5">
                        <img src="../../PFN3/assets/expand_more.svg" alt="more" id="arrow" class="h-full w-full">
                    </div>
                </div>
                <div id="logout" class="absolute top-10 right-5 hidden">
                    <a href="../model/logout.php" class="flex items-center justify-evenly border bg-white rounded-md px-5 py-2 hover:cursor-pointer">
                        <div class="w-5 h-5">
                            <img src="../../PFN3/assets/logout.svg" alt="logout" class="h-full w-full">
                        </div>
                        <p class="text-red-600">
                            Logout
                        </p>
                    </a>
                </div>
            </header>
            <article class="font-slab">
                <h1 class="font-semibold pl-5 pt-3 text-3xl">
                    Dashboard
                </h1>
                <div class="bg-white border m-5 rounded-md p-4">
                    <h3>
                        <strong>
                            Bienvenido
                        </strong>
                    </h3>
                    <p>
                        Selecciona la acción a realizar desde la pestaña del menu
                    </p>
                </div>
            </article>
        </section>
    </main>

</body>

</html>

<?php
} else {
    header("Location: ../index.php");
}   
?>