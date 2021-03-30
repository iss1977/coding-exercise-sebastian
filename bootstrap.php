<?php
/**
 * bootstrap.php will load our environment variables
 */

require 'vendor/autoload.php';
use Dotenv\Dotenv;

$dotenv = new DotEnv(__DIR__);
$dotenv->load();

// test code, should output:
// api://default
// when you run $ php bootstrap.php
echo getenv('DB_DNS');