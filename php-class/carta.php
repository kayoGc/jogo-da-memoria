<?php 
    class Carta {
        private string $imagem;
        private int $id;
        private bool $virado;

        public function __construct(string $imagem, int $id, bool $virado) {
            $this->imagem = $imagem;
            $this->id = $id;
            $this->virado = $virado;
        }
        
        public function getImagem() {
            return $this->imagem;
        }

        public function getStatus() {
            return $this->virado;
        }

        public function getId() {
            return $this->id;
        }

    }

?>