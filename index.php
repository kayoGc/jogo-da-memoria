<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="style.css">
</head>
<body>
    <?php 
        include 'jogo-memoria.php';
        $jogo = new JogoMemoria;
        $jogo->teste();
    ?>
</body>
</html>