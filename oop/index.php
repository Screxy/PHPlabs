<?php

    class Cat{
        public $Age;
        public $color;
        public $name;
        
        public function sayHello(){
            echo " мяу <br>";
        }
        public function say($string){
            echo 'мяу '.$string;
            $this->sayHello();
        }
    }

    $richi = new Cat();
    $richi->name = 'richi';
    $richi->sayHello();
    $richi->say("салам алекум");
    var_dump($richi);