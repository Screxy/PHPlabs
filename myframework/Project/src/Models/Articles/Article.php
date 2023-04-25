<?php
    namespace Models\Articles;
    use Models\Users\User;

    class Article{

        private $id;
        private $name;
        private $text;
        private $authorId;
        private $createdAt;

        public function __set($name, $value){
            $camelCaseName = $this->underscoreToCamelCase($name);
            $this->$camelCaseName = $value;
            echo "пытаюсь создать свойство $name со знаечение $value";
        }

        private function underscoreToCamelCase(string $source): string{
            return lcfirst(str_replace('_', '', ucwords($source, '_')));
        }

        public function getId(){
            return $this->id;
        }
        public function getName(){
            return $this->name;
        }
        public function getText(){
            return $this->text;
        }
        // public function __construct(string $title, string $text, User $author){
        //     $this->title = $title;
        //     $this->text = $text;
        //     $this->author = $author;
        // }
        // public function getTitle():string
        // {
        //     return $this->title;
        // }
        // public function getText():string
        // {
        //     return $this->text;
        // }
        // public function getAuthor():User
        // {
        //     return $this->author;
        // }
    }
