<?php

use \Psr\Http\Message\ServerRequestInterface as Request;
use \Psr\Http\Message\ResponseInterface as Response;

$app->get('/', function (Request $req,  Response $res, $args = []) {
    $db = $this->get('db');
    $users = $db->table('users')->get();
    return $res->withJson($users);
});

$app->post('/user', function(Request $req,  Response $res, $args = []) {

    $errors = [];

    $body = $req->getParsedBody();

    $db = $this->get('db');

    $email = $body['email'];
    $token = $body['token'];

    if (is_null($email)) { $errors[] = 'Email is required.'; }
    if (is_null($token)) { $errors[] = 'Token is required.'; }

    if (!empty($errors)) {
        return $res->withJson($errors, 400);
    }

    $result = $db->table('users')->insert([
        'email'     => $email,
        'token'     => $token,
        'created'   => date('Y-m-d h:i:s')
    ]);

    return $res->withJson($result);
});

$app->get('/product/{id}', function (Request $request, Response $response) {
    $productId = $request->getAttribute('id');
    return 'Searching product id: ' . $productId;
});
