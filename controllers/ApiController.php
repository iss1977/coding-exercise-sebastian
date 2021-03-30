<?php

namespace app\controllers;

use app\core\Application;
use app\core\Controller;
use app\core\Response;
use app\TableGateways\JobsGateway;

class ApiController extends Controller
{
    public JobsGateway $gateway;
    private Response $response;

    public function __construct()
    {
        $this->gateway = new JobsGateway();
        $this->response =Application::$app->response;
    }
    public function processRequest()
    {

        $this->response->setHeader("Access-Control-Allow-Origin: *");
        $this->response->setHeader("Content-Type: application/json; charset=UTF-8");
        $this->response->setHeader("Access-Control-Allow-Methods: OPTIONS,GET,POST,PUT,DELETE");
        $this->response->setHeader("Access-Control-Max-Age: 3600");
        $this->response->setHeader("Access-Control-Allow-Headers: Content-Type, Access-Control-Allow-Headers, Authorization, X-Requested-With");


//        echo 'Process API request';
//        var_dump($this->gateway->findAll());
        $jobList=  $this->gateway->findAll();
        $this->response->setBody($jobList);
//        var_dump($jobList);

//        $this->response->setHeader('status_code_header = HTTP/1.1 200 OK');
//        $response['status_code_header'] = 'HTTP/1.1 200 OK';
//        $response['body'] = json_encode($jobList);
//        var_dump($response);
        return $this->response->getBodyAsJson();
    }
}