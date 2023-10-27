<?php 
    
    include 'php-class/jogo-memoria.php'; 
    $jogoMemoria = new JogoMemoria();
    
    session_start();
    
    // reseta o jogo
    if (isset($_GET['novoJogo'])) session_unset();

    if (!isset($_SESSION['cartas'])) {
        $_SESSION['cartas'] = $jogoMemoria->getCartasJogo();
        $_SESSION['erros'] = $jogoMemoria->getErros(); 
        $_SESSION['acertos'] = $jogoMemoria->getAcertos();
    } else {
        $jogoMemoria = new JogoMemoria($_SESSION['cartas'], $_SESSION['erros'], $_SESSION['acertos']);
    }

    if (isset($_GET['carta']) && !isset($_GET['analisando'])) {
        escolherCartas($_GET['carta'], $jogoMemoria);
        $jogoMemoria = new JogoMemoria($_SESSION['cartas'], $_SESSION['erros'], $_SESSION['acertos']);
    }

    /**
     * Função que guarda as cartas selecionadas em variaveis de sessão
     */
    function escolherCartas(int $idCarta, object $jogoMemoria) {
        if (!isset($_SESSION['cartaEscolhida1'])) {
            $jogoMemoria->virarCarta($idCarta);
            $_SESSION['cartaEscolhida1'] = $idCarta;
        } else if ($_SESSION['cartaEscolhida1'] == $idCarta) {
            $jogoMemoria->virarCarta($idCarta);
            unset($_SESSION['cartaEscolhida1']);
        } else {
            $jogoMemoria->virarCarta($idCarta);
            $_SESSION['cartaEscolhida2'] = $idCarta;
        }
        $_SESSION['cartas'] = $jogoMemoria->getCartasJogo();
    }
?>  