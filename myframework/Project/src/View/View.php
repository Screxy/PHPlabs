<?php

    namespace View;

    class View{
        private $templatesPath;

        public function __constructor( string $templatesPath){
            $this->templatesPath = $templatesPath;
        }
        public function renderHtml(string $templatesName, array $vars = [], int $code = 200){
            http_response_code($code);
            include($this->templatesPath.'/'.$templatesName);
        }
    }