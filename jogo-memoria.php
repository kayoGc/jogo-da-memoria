<?php 

    class JogoMemoria {
        private $fotos = array(
            'bbleta.jpg',
            'euto.jpg',
            'ganco.jpg',
            'uva.jpg'
        );
        
        private $matriz1 = array();
        private $matriz2 = array();

        private function embaralhar() {
            shuffle($this->fotos);
        }

        private function duplicarfotos(){
            $this->fotos = array_merge($this->fotos, $this->fotos);
        }

        private function ColocarMatriz($lin,$col){
            $matriz = array();
            $posicaoFoto = 0;
            $tamanhoFotos = sizeof($this->fotos);
            while ($posicaoFoto < $tamanhoFotos) {
                for($l = 0; $l < $lin; $l++){
                    $array = array(); 
                    for($c = 0; $c <= $col; $c++){
                        array_push($array, $this->fotos[$posicaoFoto]);
                        $posicaoFoto++;
                    }
                    array_push($matriz, $array);
                }
            }
            return $matriz;
        }

        public function teste() {
            $this->duplicarfotos();
            $this->embaralhar();
            $this->matriz1 = $this->ColocarMatriz(2, 3);
            echo $this->criarFotos();

        }

        private function criarFotos() {
            $jogo = "";
            foreach($this->matriz1 as $i) {
                foreach($i as $imagem) {
                    $jogo .= "<img class='w-72 h-72 rounded m-2 hover:ring ring-black box-content transition ease-in' 
                    src='img/{$imagem}' alt='{$imagem}'>";
                }
            }
            return $jogo;
        }

    }