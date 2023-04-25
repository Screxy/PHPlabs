<?php

    namespace View;

    class View{
        private $templatesPath;

        public function __construct( string $templatesPath){
            $this->templatesPath = $templatesPath;
        }
        public function renderHtml(string $templatesName, array $vars = [], int $code = 200){
            http_response_code($code);
            extract($vars);
            include($this->templatesPath.'/'.$templatesName);
        }
    }