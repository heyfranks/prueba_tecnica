<?php

use Psr\Http\Message\ResponseInterface as Response;
use Psr\Http\Message\ServerRequestInterface as Request;
use Slim\Factory\AppFactory;
use Slim\Views\PhpRenderer;

require __DIR__ . '/../vendor/autoload.php';

$app = AppFactory::create();
$app->addErrorMiddleware(false, true, true);

$app->get('/', function (Request $request, Response $response, $args) {
    $renderer = new PhpRenderer(__DIR__ . '/../template');
    
    $viewData = [
        'name' => 'John',
    ];
    
    return $renderer->render($response, 'lista_usuarios.php', $viewData);
});

$app->get('/usuarios', function (Request $request, Response $response, $args) {
    $resultado = obtenerUsuarios();
    $response->getBody()->write(json_encode($resultado));
    return $response
    ->withHeader('Access-Control-Allow-Origin', '*')
    ->withHeader('Access-Control-Allow-Methods', 'GET')
    ->withHeader('Access-Control-Allow-Headers', 'Content-Type, Authorization')
    ->withHeader('Content-Type', 'application/json');
});

$app->get('/usuario/{id}', function (Request $request, Response $response, array $args) {
    $id = filter_var($args['id'], FILTER_SANITIZE_NUMBER_INT);
    $resultado = obtenerUsuarios();
    if ($resultado['success'] === 0) {
        $response->getBody()->write(json_encode($resultado));
        return $response->withHeader('Content-Type', 'application/json')->withStatus(500);
    }
    $usuarios = $resultado['message'];
    $usuario = array_filter($usuarios, function($usuario) use ($id) {
        return $usuario->id == $id;
    });
    $usuario = array_values($usuario);
    if(empty($usuario)) {
        $datos = ['success' => 0, 'message' => 'Usuario no encontrado'];
    }
    else {
        $datos = ['success' => 1, 'message' => $usuario[0]];
    }
    $response->getBody()->write(json_encode($datos));
    return $response->withHeader('Content-Type', 'application/json');
});

$app->run();


function obtenerUsuarios() {
    $apiUrl = 'https://jsonplaceholder.typicode.com/users';
    $ch = curl_init();
    curl_setopt($ch, CURLOPT_URL, $apiUrl);
    curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
    $usuarios = curl_exec($ch);

    if (curl_errno($ch)) {
        $error_msg = curl_error($ch);
        curl_close($ch);
        return ['success' => 0, 'message' => $error_msg];
    }

    curl_close($ch);
    $usuarios = json_decode($usuarios);
    foreach($usuarios as $usuario) {
        $usuario->direccion = $usuario->address->street . ', ' . $usuario->address->suite . ', ' . $usuario->address->city;
    }
    return ['success' => 1, 'message' => $usuarios];
}