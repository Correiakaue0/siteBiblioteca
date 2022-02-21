<?php
ini_set('display_errors', 1);
// o index é um front controller

use Nyholm\Psr7\Factory\Psr17Factory;
use Nyholm\Psr7Server\ServerRequestCreator;

require __DIR__ . '/../vendor/autoload.php';


$caminho = $_SERVER['PATH_INFO'];
$rotas = require __DIR__.'/../config/rotas.php';

if (!array_key_exists($caminho, $rotas)){
    http_response_code(404);
    exit();
}

session_start();

$ehRota  = stripos($caminho , 'login'); //  stripos = busca uma string dentro de uma variavel e retorna uma posição seja false caso ela nao encontre a string;
if (!isset($_SESSION['logado']) && $ehRota === false){
    header('Location: /login');
        exit;
}
$psr17Factory = new Psr17Factory();
$creator = new ServerRequestCreator(
  $psr17Factory,
  $psr17Factory,
  $psr17Factory,
  $psr17Factory

);

$request = $creator->fromGlobals();

$classeControladora = $rotas[$caminho];
/** @var @ $controlador */
$container = require __DIR__.'/../config/dependencies.php';
$controlador = $container->get($classeControladora);
$resposta = $controlador->handle($request);

foreach ($resposta->getHeaders() as $name => $values ){
    foreach ($values as $value) {
        header(sprintf('%s: %s', $name, $value), false);
    }
}

echo $resposta->getBody();