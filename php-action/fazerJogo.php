<?php 
    
    include 'php-class/jogo-memoria.php'; 
    $jogoMemoria = new JogoMemoria();
    session_start();

    if (!isset($_SESSION['cartas'])) {
        $_SESSION['cartas'] = $jogoMemoria->getCartasJogo();
    } else {
        echo 'oi ta criado';
        $jogoMemoria = new JogoMemoria($_SESSION['cartas']);
    }

?>  