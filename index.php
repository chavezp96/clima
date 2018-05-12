<?php

require 'vendor/autoload.php';

use \Psr\Http\Message\ServerRequestInterface as Request;
use \Psr\Http\Message\ResponseInterface as Response;

$configuration = [
    'settings' => [
        'displayErrorDetails' => true,
    ],
];
$c = new \Slim\Container($configuration);
$app = new \Slim\App($c);



$app->get('/clima', function (Request $request, Response $response, array $args) {
    
    $client = new \GuzzleHttp\Client();
    $res = $client->request('GET', 'http://api.openweathermap.org/data/2.5/weather?id=3530597&units=metric&appid=7d43276e33430314aa97ca382ebf70f3');
 
    //Obtenemos la respuesta de OpenWeather como String
    $body =  $res->getBody()->getContents();

    //Convertimos la respuesta a un arreglo
    $json = json_decode($body,true);

    //Mandamos la respuesta como Json, WithJson espera un arreglo como parametro
    return $response->withJson($json);

});
$app->run();