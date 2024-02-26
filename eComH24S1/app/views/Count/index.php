<?php
// Include the Counter model
require_once 'app/models/Counter.php';

// Create a new Counter object
$counter = new \app\models\Counter();

// Increment the count for each page visit
$counter->increment();

// Write the updated count to the file
$counter->write();

// Return the count as JSON-encoded data
header('Content-Type: application/json');
echo $counter;
?>