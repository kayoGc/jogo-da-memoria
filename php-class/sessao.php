<?php 
    class Sessao {


        public function __construct($triggerNovoJogo = null) {
            session_start();
            if ($triggerNovoJogo == null) session_unset();
        }


        public function escolherCartas(int $idCarta, object $jogoMemoria) {
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

    }

?>