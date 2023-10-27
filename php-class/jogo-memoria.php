<?php 

    class JogoMemoria {
        private array $cartasJogo;
        private array $imagens = [
            'sapo1.jpg',
            'sapo2.jpg',
            'sapo3.jpg',
            'sapo4.jpg',
            'sapo5.jpg',
            'sapo6.jpg',
        ];
        public int $erros;
        public int $acertos;
        public string $html;
        public string $htmlErros;

        public function __construct(array $cartasJogoAnterior = null, int $erros = null, int $acertos = null) {
            include_once 'carta.php';
            if (!isset($cartasJogoAnterior)) {
                $this->cartasJogo = array();            
     
                $imagens = array_merge($this->imagens, $this->imagens);
                
                foreach($imagens as $imagem) {
                    $this->cartasJogo[] = new Carta($imagem);
                }

                shuffle($this->cartasJogo);
                
                $this->erros = 0;     
                $this->acertos = 0;
            } else {
                $this->cartasJogo = $cartasJogoAnterior;
                $this->erros = $erros;
                $this->acertos = $acertos;
            }
            $this->erros < 8 && $this->acertos < sizeof($this->imagens) ? $this->fazerHtml() : $this->fazerHtmlIntocavel();
            $this->fazerHtmlErros();
        }

        public function getCartasJogo() {
            return $this->cartasJogo;
        }

        public function getErros() {
            return $this->erros;
        }

        public function getAcertos() {
            return $this->acertos;
        }

        public function getHtml() {
            return $this->html;
        }

        public function getHtmlErros() {
            return $this->htmlErros;
        }

        public function getQuantidadeFotos() {
            return sizeof($this->imagens);
        }

        /**
         * Analisa cartas selecionadas pelo jogador
         */
        public function analisar(int $posicaoCarta, int $posicaoCarta2) {
            if ($this->pegarImagemCarta($posicaoCarta) == $this->pegarImagemCarta($posicaoCarta2)) {
                $this->acertos++;
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
            $this->htmlErros = "<p>Erros: {$this->erros}/8 - Acertos: {$this->acertos}/". sizeof($this->imagens) ."</p>";
            if ($this->erros > 7) $this->htmlErros .= "<p>Você Perdeu!</p>";
            if ($this->acertos == sizeof($this->imagens)) $this->htmlErros .= "<p>Você ganhou!</p>";
        }

        private function fazerHtmlIntocavel() {
            $this->html = "";
            foreach ($this->cartasJogo as $carta) {
                $carta->revelar();
                $img = $carta->getImagem();
                $this->html .= "<img class='w-36 h-36 m-1'src='img/{$img}' alt='{$img}'>";
            }
        }

        private function fazerHtml() {
            $this->html = "";
            foreach ($this->cartasJogo as $posicao => $carta) {
                if ($carta->getStatusVirado()) {
                    $this->html .= "
                    <img class='w-36 h-36 m-1'src='img/{$carta->getImagem()}' alt='{$carta->getImagem()}'>";
                } else {
                    $this->html .= "<button type='submit' name='carta' value='{$posicao}'>
                    <img class='w-36 h-36 m-1 hover:ring transition'src='img/interrogacao.jpg' alt='interrogacao.jpg'></button>";
                }
            }
        }
    }