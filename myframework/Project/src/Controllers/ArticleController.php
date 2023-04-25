<?php
    namespace Controllers;

    use Services\Db;
    use View\View;
    use Models\Articles\Article;

    class ArticleController{
        private $view;
        private $db;

        public function __construct(){
            $this->view = new View(__DIR__.'/../../templates');
            $this->db = new Db();
        }

        public function show(int $id){
            $result = $this->db->query('SELECT * FROM `articles` WHERE `id`=:id', [':id'=>$id], Article::class);
            if (empty($result)) {
                $this->view->renderHtml('errors/404.php',[],404); 
                return;
            }
            $this->view->renderHtml('articles/show.php', ['article'=>$result[0]]);
        }
    }