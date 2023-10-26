<?php 
    class Carta {
        private string $imagem;
        private bool $virado;

        public function __construct(string $imagem) {
            $this->imagem = $imagem;
            $this->virado = false;
        }
        
        public function getImagem() {
            return $this->imagem;
        }

        public function getStatusVirado() {
            return $this->virado;
        }

        public function virar() {
            $this->virado = $this->virado ? false : true;
        }

        public function revelar() {
            $this->virado = true;
        }
    }

?>