<?php 
    if (isset($_SESSION['cartaEscolhida2'])) {
        $jogoMemoria->analisar($_SESSION['cartaEscolhida1'], $_SESSION['cartaEscolhida2']);
        unset($_SESSION['cartaEscolhida1'], $_SESSION['cartaEscolhida2']);

        $_SESSION['cartas'] = $jogoMemoria->getCartasJogo();
        $_SESSION['erros'] = $jogoMemoria->getErros();
        $_SESSION['acertos'] = $jogoMemoria->getAcertos();

        ?>

<form method="get">
    <input type="hidden" value="analisando">
</form>

<?php

    if($_SESSION['acertos'] == $jogoMemoria->getQuantidadeFotos() || $_SESSION['erros'] == 8) {        
        header('refresh:0');
    }
    }
?>