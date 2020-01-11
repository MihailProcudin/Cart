<?php

class NotFound extends Controller
{

    public function __construct()
    {
        header("HTTP/1.1 404 Not Found");
    }

    public function index()
    {
        echo "404 Not Found";
    }
}
