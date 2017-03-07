<?php

require __DIR__ . '/vendor/autoload.php';

$config = ['settings' => [
    'displayErrorDetails' => true
]];

$config['settings']['db'] = require_once __DIR__ . '/configs/database.php';

$app = new \Slim\App($config);
$container = $app->getContainer();

// Service factory for the ORM
$container['db'] = function ($container) {
    $capsule = new \Illuminate\Database\Capsule\Manager;
    $capsule->addConnection($container['settings']['db']);

    $capsule->setAsGlobal();
    $capsule->bootEloquent();

    return $capsule;
};

require_once __DIR__ . '/routes.php';

$app->run();
