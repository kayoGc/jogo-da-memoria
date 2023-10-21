<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <script src="https://cdn.tailwindcss.com"></script>
    
</head>
<body class="flex flex-col m-auto h-screen w-screen">
    <?php 
        include 'jogo-memoria.php';
        $jogo = new JogoMemoria;
    ?>

    <div class="shadow-sm hover:shadow-lg transition mx-auto p-10 m-2 flex flex-col justify-center items-center gap-2">
        <h1 class="text-4xl">Jogo da memória</h1>
        <div class="flex flex-row flex-wrap max-w-7xl">
            <?=$jogo->teste()?>
        </div>
    </div>

</body>
</html>