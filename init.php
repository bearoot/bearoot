<?php

require_once(__DIR__ . '/vendor/silex/silex.phar');

use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\HttpKernel\Exception\NotFoundHttpException;
use Symfony\Component\HttpKernel\Exception\HttpException;


$app = new Silex\Application();

$app->register(new Silex\Extension\TwigExtension(), array(
    'twig.path' => __DIR__ . '/templates',
    'twig.class_path' => __DIR__ . '/vendor/twig/lib',
));


require_once(__DIR__ . '/config.php');

