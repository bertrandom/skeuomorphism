<?php

require_once __DIR__.'/../vendor/autoload.php';

$app = new Silex\Application();

$app['debug'] = true;

$app->register(new Silex\Provider\TwigServiceProvider(), array(
    'twig.path' => __DIR__.'/views',
));

$app->get('/', function () use ($app) {
    
    return $app['twig']->render('index.html.twig', array());    

});

$app->get('/{message}', function ($message) use ($app) {
    
    $message = str_replace("¿", '?', $message);
    $message = str_replace("-", ' ', $message);
    $message = str_replace("_", "\n", $message);
    
    return $app['twig']->render('index.html.twig', array(
        'message' => $message,
    ));    

});

$app->run();