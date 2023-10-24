<?php 
    class Carta {
        private string $imagem;
        private string $html;
        private int $id;

        public function __construct(string $imagem, int $id) {
            $this->imagem = $imagem;
            $this->id = $id;
            $this->fazerHtml();
        }

        private function fazerHtml() {
            $this->html = "<input class='w-72 h-72 rounded m-2 hover:ring ring-black box-content transition ease-in' 
            type='checkbox' id='img{$this->id}' name='carta' value={$this->imagem}>
            <label for='img{$this->id}'>
                <input type='image' src='img/{$this->imagem}' alt='{$this->imagem}'>
            </label>";
        }

        public function getImagem() {
            return $this->imagem;
        }

        public function getHtml() {
            return $this->html;
        }
    }

?>