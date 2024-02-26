<?php

namespace app\controllers;

use app\models\Counter;

class CountController
{
    //method that will create counter object and call the model
    public function index()
    {
        // Create a new Counter model object
        $counter = new Counter();

        // Call increment on the Counter object
        $counter->increment();

        // Call write on the Counter object
        $counter->write();

        // Echo the Counter object
        echo $counter;
    }
}
?>