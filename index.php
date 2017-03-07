<?php

use \Psr\Http\Message\ServerRequestInterface as Request;
use \Psr\Http\Message\ResponseInterface as Response;

require __DIR__ . '/vendor/autoload.php';

$app = new \Slim\App;

$app->get('/', function (Request $req,  Response $res, $args = []) {
    return $res->withStatus(400)->write('Bad Request');
});

$app->get('/product/{id}', function (Request $request, Response $response) {
    $productId = $request->getAttribute('id');
    // $response->getBody()->write("Hello, $name");
    return 'Searching product id: ' . $productId;
});

$app->run();
