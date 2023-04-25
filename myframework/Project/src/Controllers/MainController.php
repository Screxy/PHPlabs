<?php
    namespace Controllers;
    use View\View;
    use Services\Db;
    class MainController{

        private $view;
        private $db;

        public function __construct(){
            $this->view = new View(__DIR__.'/../../templates/main/main.php');
            $this->db = new Db();
        }

        public function main(){
            $articles = $this->db->query('SELECT * FROM `articles`');
            var_dump($articles);
            // $articles = [
            //     ['name'=>'Article 1', 'text'=>'text1'],
            //     ['name'=>'Article 2', 'text'=>'text2'],
            // ];
            $this->view->renderHtml('main/main.php', );
        }
        public function sayHello(string $name){
            $this->view->renderHtml('main/hello.php');
        }
    }