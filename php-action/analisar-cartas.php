<?php 
    if (isset($_SESSION['cartaEscolhida2'])) {
        $jogoMemoria->analisar($_SESSION['cartaEscolhida1'], $_SESSION['cartaEscolhida2']);
        unset($_SESSION['cartaEscolhida1'], $_SESSION['cartaEscolhida2']);

        $_SESSION['cartas'] = $jogoMemoria->getCartasJogo();
        $_SESSION['erros'] = $jogoMemoria->getErros();

        ?>
        <form method="get">
            <input type="hidden" value="analisando">
        </form>

    <?php
    }
?>