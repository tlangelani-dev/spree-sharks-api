<?php

require __DIR__ . '/vendor/autoload.php';

$app = new \Slim\App();

$app->get('/', function (Request $req,  Response $res, $args = []) {
    return $res->withStatus(400)->write('Bad Request');
});

$app->run();

// $data = [
//     'info' => [
//         'app' => 'Spree Sharks',
//         'version' => '0.0.1'
//     ]
// ];

// echo json_encode($data);
