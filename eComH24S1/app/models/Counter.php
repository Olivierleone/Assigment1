<?php

namespace app\models;

class Counter
{
    // Variable to hold the count
    private $count; 

    //constructor
    public function __construct()
    {
        // Define the path to the counter file using forward slashes, relative to the current directory
        $filename = 'resources/counter.txt';

        // Check if the counter file exists
        if (file_exists($filename)) {

            // Read count from the file
            $countData = file_get_contents($filename);
            $countJson = json_decode($countData, true);
            $this->count = isset($countJson['count']) ? (int) $countJson['count'] : 0;
        } else {

            // If the file doesn't exist, set count to 0
            $this->count = 0;
        }
    }

    //method to increment the count by 1
    public function increment()
    {
        // Increment the count
        $this->count++;
    }

    //method to write 
    public function write()
    {
        // Path to the counter file
         $filename = 'resources/counter.txt';

        // Encode the counter object as JSON
        $count = json_encode(['count' => $this->count]);

        // Open the counter file for writing
        $fileHandle = fopen($filename, "w");

        // Lock the file for exclusive writing
        flock($fileHandle, LOCK_EX);

        // Write the JSON data to the file
        fwrite($fileHandle, $count);

        // Release the lock
        flock($fileHandle, LOCK_UN);

        // Close the file
        fclose($fileHandle);
    }

    //toString method
    public function __toString()
    {
        // Convert the counter object to a string (JSON representation)
        return json_encode(['count' => $this->count]);
    }
}

?>