<?php

namespace app\core;

// Controller superclass from which all controller classes should inherit
class Controller
{
    // Method for loading view files to present them to the Web user
    function view($name, $data = null)
    {
        // Load the view files located in the 'app/views/' directory
        include('app/views/' . $name . '.php');
    }
}

?>