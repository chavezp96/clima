<?php
    require 'vendor/autoload.php';

    use GuzzleHttp\Client;
    use GuzzleHttp\Psr7\Request;

    $client = new GuzzleHttp\Client(['base_uri' => 'http://api.openweathermap.org/data/2.5/']);
    $response = $client->request('GET', 'weather?id=3530597&appid=7d43276e33430314aa97ca382ebf70f3');

    header("Content-type: application/json");
    echo $response->getBody();
?>