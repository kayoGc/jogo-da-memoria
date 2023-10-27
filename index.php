<?php  
    include 'php-action/fazerJogo.php';
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <script src="https://cdn.tailwindcss.com"></script>
    
</head>
<body class="flex flex-col m-auto h-screen w-screen">
    <div class="shadow-sm transition mx-auto p-10 m-2 flex flex-col items-center gap-2">
        <h1 class="text-2xl">Jogo da memória</h1>
        <form class="flex flex-row flex-wrap max-w-5xl items-center justify-center" method="get">
                <?=$jogoMemoria->getHtml()?>     
        </form>
        <?=$jogoMemoria->getHtmlErros();?>
        <form method="get">
            <button class="px-4 py-2 bg-green-400 hover:bg-green-600 transition ease-in rounded" 
            type="submit" name="novoJogo">Reiniciar</button>
        </form>
    </div>
    <?php 
        include 'php-action/analisar-cartas.php';
    ?>
</body>
</html>