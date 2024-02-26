<?php
namespace app\models;

class Counter
{
    private $count;

    public function __construct()
    {
        // Path to the counter file
        $filename = 'resources/counter.txt';

        // Check if the counter file exists
        if (file_exists($filename)) {
            // Open the file for reading
            $fileHandle = fopen($filename, "r");

            // Lock the file for exclusive reading
            flock($fileHandle, LOCK_SH);

            // Read the file contents into the $count variable
            $count = json_decode(fread($fileHandle, filesize($filename)))->count;

            // Release the lock
            flock($fileHandle, LOCK_UN);

            // Close the file
            fclose($fileHandle);
        } else {
            // If the file doesn't exist, set count to 0
            $count = '{"count":0}';
        }

        // Decode the JSON and copy the count property
        $this->count = json_decode($count)->count;
    }

    public function increment()
    {
        // Increment the count property by 1
        $this->count++;
    }

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

    public function __toString()
    {
        // Convert the counter object to a string (JSON representation)
        return json_encode(['count' => $this->count]);
    }


    public function getCount()
    {
        return $this->count;
    }


}
?>