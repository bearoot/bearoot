<?php$app['debug'] = true;$app->register(new Silex\Provider\TwigServiceProvider(), array(    'twig.path' => dirname(__FILE__) . '/templates',    'twig.class_path' => dirname(__FILE__) . '/lib/Twig',));