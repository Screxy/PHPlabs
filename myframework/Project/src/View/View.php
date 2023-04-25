<?php

    namespace View;

    class View{
        private $templatesPath;

        public function __constructor( string $templatesPath){
            $this->templatesPath = $templatesPath;
        }
        public function renderHtml(string $templatesName, array $vars = []){
            include($this->templatesPath.'/'.$templatesName);
        }
    }