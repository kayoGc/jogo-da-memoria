<?php 
    
    include 'php-class/jogo-memoria.php';
    include 'php-class/sessao.php'; 
    $jogoMemoria = new JogoMemoria();

    $sessao = isset($_GET['novoJogo']) ? new Sessao($_GET['novoJogo']) : new Sessao();

    if (!isset($_SESSION['cartas'])) {
        $_SESSION['cartas'] = $jogoMemoria->getCartasJogo();
        $_SESSION['erros'] = $jogoMemoria->getErros(); 
        $_SESSION['acertos'] = $jogoMemoria->getAcertos();
    } else {
        $jogoMemoria = new JogoMemoria($_SESSION['cartas'], $_SESSION['erros'], $_SESSION['acertos']);
    }
    if (isset($_GET['carta']) && !isset($_GET['analisando'])) {
        $sessao->escolherCartas($_GET['carta'], $jogoMemoria);
        $jogoMemoria = new JogoMemoria($_SESSION['cartas'], $_SESSION['erros'], $_SESSION['acertos']);
    }
?>  