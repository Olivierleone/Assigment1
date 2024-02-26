<?php

namespace app\core;

class App
{
    function __construct()
    {
        // Retrieve the URL from the query parameters
        $url = isset($_GET['url']) ? $_GET['url'] : '';

        // Define the routes mapping URLs to controller methods
        $routes = [
            'Main/index' => 'MainController,index',
            'Main/about_us' => 'MainController,about_us',
            'Message/contact' => 'Message,contact',
            'Message/read' => 'Message,read',
        ];

        // Iterate through each route to find a match for the requested URL
        foreach ($routes as $routeUrl => $controllerMethod) {

            // Check if the URL matches the route
            if ($url == $routeUrl) { 

                // Extract the controller and method from the route definition
                [$controller, $method] = explode(',', $controllerMethod);

                // Build the fully qualified controller class name
                $controller = '\\app\\controllers\\' . $controller;

                // Create an instance of the controller
                $controller = new $controller();

                // Call the specified method of the controller
                $controller->$method();
                
                // Stop further processing as we found a matching route
                break;
            }
        }
    }
}

?>