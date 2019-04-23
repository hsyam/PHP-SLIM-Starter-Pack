<?php
require __DIR__ . '/../vendor/autoload.php';
$config = include __DIR__ .'/../App/config/app.php';
use Slim\App as App ;
$app = new App($config);
require __DIR__ . '/../App/config/dependencies.php';
require __DIR__ . '/../routes/api.php';


$app->run();