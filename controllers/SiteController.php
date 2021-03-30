<?php

namespace app\controllers;

class SiteController extends \app\core\Controller
{
    public function home()
    {
        $params = [
            'name'=> "Jobs.at challenge"
        ];
        // return Application::$app->router->renderView('home',$params); // this was the old form of calling
        return $this->render('home',$params);
    }

}