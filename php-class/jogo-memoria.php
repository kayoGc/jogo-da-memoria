<?php 

    class JogoMemoria {
        private array $cartasJogo;
        private array $analiseJogo;
        private array $imagems = [
            'bbleta.jpg',   
            'euto.jpg',
            'ganco.jpg',
            'uva.jpg'
        ];

        public function __construct(array $jogoAnterior = null) {
            if (!isset($jogoAnterior)) {
                session_start();
                $this->criarJogo();
                $_SESSION['jogo'] = $this->cartasJogo;
            }  
        }

        private function criarJogo() {
            include_once 'carta.php';
            
            $this->cartasJogo = array();
            
            $imagems = array_merge($this->imagems, $this->imagems);
            
            foreach($imagems as $id => $imagem) {
                $this->cartasJogo[] = new Carta($imagem, $id, true);
            }
            
            shuffle($this->cartasJogo);
        }
    }