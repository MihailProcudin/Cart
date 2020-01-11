<?php
error_reporting(E_STRICT);
session_start();

require_once('config.php');
require_once('router.php');
require_once('app/vendor/Controller.php');
require_once('app/vendor/State.php');
require_once('app/helper/redirect.php');

$route = new Router;


