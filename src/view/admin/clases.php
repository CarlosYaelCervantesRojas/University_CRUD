<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Roboto+Slab:wght@100;400;900&display=swap" rel="stylesheet">
    <link href="/dist/output.css" rel="stylesheet">
    <title>Administrar Clases</title>
</head>
<?php
require_once($_SERVER['DOCUMENT_ROOT'] . "/src/controller/read/clases_read.php");
extract($clases);
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
                <th class="bg-slate-700 px-5">Clase</th>
                <th class="bg-slate-700 px-3">Acciones</th>
            </tr>
            <?php foreach ($clases as $clase) { 
                extract($clase);
                if ($id_clase === 1) {
                    
                } else {                
                ?>
                <tr class="text-center bg-slate-100 border border-slate-700">
                    <form action="./editar/editar_clases.php" method="post">
                        <td>
                            <input type="number" name="id_clase" readonly value="<?php echo $id_clase; ?>" class="bg-transparent text-center focus:outline-none w-20">
                        </td>

                        <td>
                            <input type="text" name="nombre_clase" readonly value="<?php echo $nombre_clase; ?>" class="bg-transparent text-center focus:outline-none">
                        </td>

                        <td class="flex justify-center items-center">
                            <button type="submit" class="h-7 w-7 hover:cursor-pointer">
                                <img src="../../../PFN3/assets/edit.svg" alt="edit" class="h-full w-full">
                            </button>
                        </td>
                    </form>
                </tr>
                
            <?php }} ?>

        </table>
        
        <div class="w-full pt-5 flex justify-center sm:justify-start sm:pl-16">
            <a href="./create/crear_clase.php" class="bg-blue-500 font-slab text-slate-200 rounded-lg px-5 py-1 mt-2">
                Crear Clase
            </a>
        </div>

    </main>
</body>

</html>