<?php

/**
 * MAIN
 */

// this will autoload our classes using composer
require_once __DIR__.'/../vendor/autoload.php';

// to be able to use the Application class, we must import it with use :

use app\controllers\ApiController;
use app\controllers\SiteController;
use app\core\Application;

// Loading .env data
$dotenv = Dotenv\Dotenv::createImmutable(dirname(__DIR__)); // the directory where the .env file is present.
$dotenv->load();


// Application configuration
$config = [
    'db' => [
        'dsn' => $_ENV['DB_DNS'],
        'user' => $_ENV['DB_USER'],
        'password' => $_ENV['DB_PASSWORD']
    ]
];

$app = new  Application(dirname(__DIR__), $config);


$app->router->get('/', [SiteController::class,'home']);
$app->router->get('/api', [ApiController::class,'processRequest']);

echo $app->run();
