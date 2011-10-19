<?php

require_once(__DIR__ . '/silex.phar');
require_once(__DIR__ . '/Twig/Autoloader.php');

$app = new Silex\Application();
Twig_Autoloader::register();

require_once(__DIR__ . '/config.php');


