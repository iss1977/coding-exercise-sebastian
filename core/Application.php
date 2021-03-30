<?php

namespace app\core;


class Application
{
    // we define a root directory for our app
    public static string $ROOT_DIR;
    // the router will be stored in Application
    public Database $db;
    public Request $request;
    public Response $response;
    public Router $router;
    public Controller $controller;

    public static Application $app;


    public function __construct($rootPath, array $config)
    {
        self::$ROOT_DIR = $rootPath; // so we use always this directory in our project
        self::$app = $this; // ...so we can access the application object like this: Application::$app

        $this->request = new Request();
        $this->response = new Response();

        $this->router = new Router($this->request, $this->response);

        $this->db = new Database($config['db']); // subarray "dn" will be only send
    }

    public function run()
    {
        return $this->router->resolve();
    }

    /**
     * @return Controller
     */
    public function getController(): Controller
    {
        return $this->controller;
    }

    /**
     * @param Controller $controller
     */
    public function setController(Controller $controller): void
    {
        $this->controller = $controller;
    }


}