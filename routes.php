<?php

$app->get('/credits', function() use($app, $SERVER_ROOT) {
            return ($app['twig']->render('credits.twig', array('SERVER_ROOT' => $SERVER_ROOT)));
        });
$app->get('/test/test', function() use($app, $SERVER_ROOT) {
            return ($app['twig']->render('credits.twig', array('SERVER_ROOT' => $SERVER_ROOT)));
        });

$app->get('/', function() use($app, $SERVER_ROOT) {
            return ($app['twig']->render('default.twig', array('SERVER_ROOT' => $SERVER_ROOT)));
        });