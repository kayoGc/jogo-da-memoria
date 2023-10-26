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
        public string $html;

        public function __construct(array $cartasJogoAnterior = null) {
            include_once 'carta.php';
            if (isset($cartasJogoAnterior)) {
                $this->criarJogo($cartasJogoAnterior);
                echo 'oi';
            } else {
                $this->criarJogo();
                echo 'eae';
            }
            $this->fazerHtml();  
        }

        public function getCartasJogo() {
            return $this->cartasJogo;
        }

        public function getHtml() {
            return $this->html;
        }

        private function fazerHtml() {
            $this->html = "";
            foreach ($this->cartasJogo as $carta) {
                $img = $carta->getStatus() ? $carta->getImagem() : "interrogacao.jpg";
                $this->html .= "<button type='submit' name='carta' value='{$carta->getId()}'>
                <img class='w-72 h-72'src='img/{$img}' alt='{$img}'></button>";
            }
        }

        private function criarJogo(array $cartasJogoAnterior = null) {
            if (!isset($cartasJogoAnterior)) {
                $this->cartasJogo = array();            
     
                $imagems = array_merge($this->imagems, $this->imagems);
                
                foreach($imagems as $id => $imagem) {
                    $this->cartasJogo[] = new Carta($imagem, $id, true);
                }

                shuffle($this->cartasJogo);
            } else {
                $this->cartasJogo = $cartasJogoAnterior;
            }
        }
    }