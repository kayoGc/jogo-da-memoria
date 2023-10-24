<?php 
    class Carta {
        private string $imagem;
        private int $id;
        public string $html;
        public bool $virado;

        public function __construct(string $imagem, int $id, bool $virado) {
            $this->imagem = $imagem;
            $this->id = $id;
            $this->virado = $virado;
            $this->fazerHtml();
        }
        
        public function getImagem() {
            return $this->imagem;
        }

        public function getHtml() {
            return $this->html;
        }
        
        private function fazerHtml() {
            $img = $this->virado ? $this->imagem : "interrogacao.jpg";
            $this->html = "<button type='submit' name='carta' value='{$this->id}'>
                <img class='w-72 h-72'
                 src='img/{$img}' alt='{$img}'>
            </button>";
        }


    }

?>