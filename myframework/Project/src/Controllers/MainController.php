<?php
    namespace Controllers;
    use View\View

    class MainController{

        private $view;
        public function __construct(){
            $this->view = new View(__DIR__.'/../../templates/main/main.php')
        }

        public function main(){
            $articles = [
                ['name'=>'Article 1', 'text'=>'text1'],
                ['name'=>'Article 2', 'text'=>'text2'],
            ];
            $this->view->renderHtml('main/main.php', )
        }
        public function sayHello(string $name){
            $this->view->renderHtml('main/hello.php')
        }
    }