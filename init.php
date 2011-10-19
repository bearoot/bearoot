<?php

require_once(dirname(__FILE__) . '/lib/silex.phar');
require_once(dirname(__FILE__) . '/lib/Twig/Autoloader.php');

$app = new Silex\Application();
Twig_Autoloader::register();

require_once(dirname(__FILE__) . '/config.php');


