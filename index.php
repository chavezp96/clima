<?php
    require 'vendor/autoload.php';

    $app = new \Slim\App();

    $app -> get('/clima', function (){
        $datos = [
            ["nombre" => "Pablo" , "cuenta" => "1234"]
        ];

        header("Content-type: application/json");
        echo json_encode($datos);
    });

    $app -> run();  
?>