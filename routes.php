<?php

$app->get('/credits', function() use($app) {
            return ($app['twig']->render('credits.twig'));
        });

$app->get('/', function() use($app) {
            return ($app['twig']->render('default.twig'));
        });