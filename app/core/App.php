<?php
namespace app\core;

class App{
   public function __construct(){
    	//call the appropriate controller class and method to handle the HTTP Request

        //Routing version 0.1
        //TODO: add PARAMETERS - later
        $url = $_GET['url'];

        //defined a few routes "url"=>"controller,method"
      $routes = [
    'Main/index' => 'MainController,index',
    'Main/about_us' => 'MainController,about_us',
    'Contact/index' => 'ContactController,index',
    'Contact/read' => 'ContactController,read',
    'Count/index' => 'CountController,index'
];

        //one by one compare the url to resolve the route
        foreach ($routes as $routeUrl => $controllerMethod) {
            if($url == $routeUrl){//match the route
                //run the route
                [$controller,$method]=explode(',', $controllerMethod);
                $controller = '\\app\\controllers\\'.$controller;
                $controller = new $controller();
                $controller->$method();
                //make sure that we don't run a second route
                break;
            }
        }


    }
}

?>