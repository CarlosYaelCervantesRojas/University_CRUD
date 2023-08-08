<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Roboto+Slab:wght@100;400;900&display=swap" rel="stylesheet">
    <link href="/dist/output.css" rel="stylesheet">
    <title>Login</title>
</head>

<body>
<?php
    session_start();
    // print_r($_SESSION);
?>
    <section class="h-screen w-screen bg-black flex justify-center items-center">
        <main class="rounded-3xl bg-slate-900 w-80 h-3/5 shadow-lg shadow-slate-700 flex flex-col justify-evenly items-center">
            <div class="h-28 w-28">
                <img src="../../PFN3/assets/logoDark.png" alt="logo" class="h-full w-full rounded-full">
            </div>

            <form action="./controller/login_solicitud.php" method="post" class="flex flex-col gap-5 items-center font-slab text-slate-500">
                <?php
                    if (isset($_SESSION['campoVacio'])) {
                        echo "<span>No puede haber campos vacios</span>";
                    } elseif (isset($_SESSION['incorrecto'])) {
                        echo "<span>El correo o contraseña son incorrectos</span>";
                    } elseif (isset($_SESSION['status'])) {
                        echo "<span>No tienes acceso a este sitio</span>";
                    }
                ?>
                <div class="flex px-2 h-8 items-center border border-slate-500 rounded-lg">
                    <input placeholder="Email" name="email" type="email" class="focus:outline-none bg-transparent">
                    <div class="h-5">
                        <img src="../../PFN3/assets/email.svg" alt="email" class="h-full">
                    </div>
                </div>
                
                <div class="flex px-2 h-8 items-center border border-slate-500 rounded-lg">
                    <input placeholder="Password" name="pass" type="password" class="focus:outline-none bg-transparent">
                    <div class="h-5">
                        <img src="../../PFN3/assets/lock.svg" alt="lock" class="h-full">
                    </div>
                </div>

                <button type="submit" class="bg-slate-500 text-black px-5 py-2 rounded-xl">
                    Ingresar
                </button>
            </form>
        </main>
    </section>
    
</body>

</html>