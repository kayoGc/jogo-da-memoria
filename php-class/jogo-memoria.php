<?php 

    class JogoMemoria {
        private array $cartasJogo;
        private array $imagems = [
            'bbleta.jpg',   
            'euto.jpg',
            'ganco.jpg',
            'uva.jpg'
        ];
        public int $erros;
        public string $html;
        public string $htmlErros;

        public function __construct(array $cartasJogoAnterior = null, int $erros = null) {
            include_once 'carta.php';
            if (!isset($cartasJogoAnterior)) {
                $this->cartasJogo = array();            
     
                $imagems = array_merge($this->imagems, $this->imagems);
                
                foreach($imagems as $imagem) {
                    $this->cartasJogo[] = new Carta($imagem);
                }

                shuffle($this->cartasJogo);
                
                $this->erros = 0;     
            } else {
                $this->cartasJogo = $cartasJogoAnterior;
                $this->erros = $erros;
            }
            $this->erros < 8 ? $this->fazerHtml() : $this->fazerHtmlIntocavel();              
            $this->fazerHtmlErros();
        }

        public function getCartasJogo() {
            return $this->cartasJogo;
        }

        public function getErros() {
            return $this->erros;
        }

        public function getHtml() {
            return $this->html;
        }

        public function getHtmlErros() {
            return $this->htmlErros;
        }

        /**
         * Analisa cartas selecionadas pelo jogador
         */
        public function analisar(int $posicaoCarta, int $posicaoCarta2) {
            if ($this->pegarImagemCarta($posicaoCarta) == $this->pegarImagemCarta($posicaoCarta2)) {
                return true;
            } else {
                $this->virarCarta($posicaoCarta);
                $this->virarCarta($posicaoCarta2);
                $this->erros++;                
                return false;
            }
        }
 
        public function virarCarta($posicaoCarta) {
            $this->cartasJogo[$posicaoCarta]->virar();
        }

        private function pegarImagemCarta($posicaoCarta) {
            return $this->cartasJogo[$posicaoCarta]->getImagem();
        }

        private function fazerHtmlErros() {
            $this->htmlErros = "<p>Erros: {$this->erros}/0";
            if ($this->erros > 7) $this->htmlErros .= " Você Perdeu!";
        }

        private function fazerHtmlIntocavel() {
            $this->html = "";
            foreach ($this->cartasJogo as $carta) {
                $carta->revelar();
                $img = $carta->getImagem();
                $this->html .= "<img class='w-52 h-52 m-1'src='img/{$img}' alt='{$img}'>";
            }
        }

        private function fazerHtml() {
            $this->html = "";
            foreach ($this->cartasJogo as $posicao => $carta) {
                if ($carta->getStatusVirado()) {
                    $this->html .= "
                    <img class='w-52 h-52 m-1'src='img/{$carta->getImagem()}' alt='{$carta->getImagem()}'>";
                } else {
                    $this->html .= "<button type='submit' name='carta' value='{$posicao}'>
                    <img class='w-52 h-52 m-1 hover:ring transition'src='img/interrogacao.jpg' alt='interrogacao.jpg'></button>";
                }
            }
        }
    }