<?php


/**
 * Execute the migrations
 */

// this will autoload our classes using composer
require_once __DIR__ . '/vendor/autoload.php';

// to be able to use the Application class, we must import it with use :

use app\core\Application;
use Dotenv\Dotenv;

// Loading .env data
$dotenv = Dotenv::createImmutable(__DIR__); // the directory where the .env file is present.
$dotenv->load();


// Application configuration
$config = [
    'db' => [
        'dsn' => $_ENV['DB_DNS'],
        'user' => $_ENV['DB_USER'],
        'password' => $_ENV['DB_PASSWORD']
    ]
];


$app = new Application(__DIR__, $config);
if ($argc>1) {
    if ($argv[1] === 'up'){ // $argv[0] will be this file,$argv[1] will be up, down, generate
        $app->db->applyMigrations();
    }


    if ($argv[1]  === 'generate') { // $argv[0] will be this file,$argv[1] will be up, down, generate
        $app->db->createMockData();
    }

}
