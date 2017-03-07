<?php

use \Psr\Http\Message\ServerRequestInterface as Request;
use \Psr\Http\Message\ResponseInterface as Response;

$app->get('/', function (Request $req,  Response $res, $args = []) {
    $db = $this->get('db');
    $users = $db->table('users')->get();
    return json_encode($users);
});

$app->get('/product/{id}', function (Request $request, Response $response) {
    $productId = $request->getAttribute('id');
    return 'Searching product id: ' . $productId;
});
