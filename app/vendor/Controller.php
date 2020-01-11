<?php

class Controller
{
    public function view($view, $data = []) {
        if(file_exists('app/view/'. $view. '.php')) {
            require_once('app/view/'. $view. '.php');
        } else {
            require_once('app/view/NotFound.php');
        }
    }
}
