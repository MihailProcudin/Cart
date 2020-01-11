<?php

class Router
{

    private $controller;
    private $method;
    private $param;

    public function __construct()
    {

        $this->handleUrl();
        $this->requireController();
        $this->notFound();
        call_user_func_array(
            [
                $this->controller,
                $this->method
            ],
            [
                $this->param
            ]
        );
    }

    /*load file & initiate class*/
    private function requireController()
    {
        if (empty($this->controller)) return null;
        if (!file_exists('app/controller/' . $this->controller . '.php')) return null;
        require_once('app/controller/' . $this->controller . '.php'); // file load
        $this->controller = new $this->controller; // class initiate
    }

    /*parse url*/
    private function getURL()
    {
        $url = explode('/', $_SERVER['REQUEST_URI']);
        $this->controller = preg_replace("/[^a-zA-Z0-9]+/", "", ucwords($url[1]));
        $this->method = preg_replace("/[^a-zA-Z0-9]+/", "", $url[2]);
        $this->param = $url[3];
    }

    private function handleUrl()
    {
        $this->indexUrl() &&  $this->getURL();
    }

    /*index page*/
    private function indexUrl($param = null)
    {
        switch ($_SERVER['REQUEST_URI']) {
            case NULL:
            case '/':
                $this->controller = 'Cart';
                $this->method = 'index';
                $this->param = $param;
                return false;
        }
        return true;
    }

    /* not found guard*/
    private function notFound()
    {

        if (!method_exists($this->controller, $this->method) || empty($this->controller)) {
            $this->controller = 'NotFound';
            $this->method = 'index';
            $this->param = null;
            $this->requireController();
        }
    }
}
