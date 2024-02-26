<?php

// Register an autoloader function
spl_autoload_register(
    function ($class_name) {

        // Replace namespace separator (\) with DIRECTORY_SEPARATOR (OS-dependent)
        $class_name = str_replace('\\', DIRECTORY_SEPARATOR, $class_name);
        
        // Check if the class file exists
        if (file_exists($class_name . '.php')) {

            // If the file exists, include it
            require_once($class_name . '.php');

            // Return true indicating successful autoloading
            return true; 
        } else {

            // Return false indicating class file not found
            return false; 
        }
    }
);

?>
