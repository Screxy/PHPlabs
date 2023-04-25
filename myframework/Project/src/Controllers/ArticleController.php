<?php
    namespace Controllers;

    use MyProject\Services\Db;
    use MyProject\View\View;
    use Models\Articles\Article;
    
    class ArticleController{
        private $view;
        private $db;

        public function __construct(){
            $this->view = new View(__DIR__.'/../../templates/main/main.php');
            $this->db = new Db();
        }

        public function show(int $id){
            $result = $this->db->query('SELECT * FROM `articles` WHERE `id`=:id', [':id'=>$id]);
            if (emprty($result)) {
                $this->view->renderHtml('errors/404.php',[],404); 
                return};
            $this->view->renderHtml('articles/show.php', ['article'=>$result[0]])
        }
    }