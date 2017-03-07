<?php

use \Psr\Http\Message\ServerRequestInterface as Request;
use \Psr\Http\Message\ResponseInterface as Response;

require __DIR__ . '/vendor/autoload.php';

$config = ['settings' => [
    'displayErrorDetails' => true,
        'db' => [
            'driver' => 'mysql',
            'host' => '127.0.0.1',
            'database' => 'tlange0_spreesharks',
            'username' => 'tlange0_sharks',
            'password' => 'sharks123',
            'charset'   => 'utf8',
            'collation' => 'utf8_unicode_ci',
            'prefix'    => '',
        ]
]];

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

$app->get('/', function (Request $req,  Response $res, $args = []) {
    $db = $this->get('db');
    $users = $db->table('users')->get();
    return json_encode($users);
});

$app->get('/product/{id}', function (Request $request, Response $response) {
    $productId = $request->getAttribute('id');
    // $response->getBody()->write("Hello, $name");
    return 'Searching product id: ' . $productId;
});

$app->run();
