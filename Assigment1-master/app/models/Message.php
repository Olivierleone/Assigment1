<?php

namespace app\models;

class Message
{
    public $name;
    public $email;
    public $message;
    public $ip;

    public function write()
    {

        // Define the path to the log file
        $logFilePath = __DIR__ . "/../../resources/messages.txt";

        // Open the log file for appending
        $fileHandle = fopen($logFilePath, "a");

        // Lock the file for writing
        flock($fileHandle, LOCK_EX);

        // Encode message as JSON
        $messageData = json_encode($this);

        // Write message to the file
        fwrite($fileHandle, $messageData . "\n");

        // Release the file
        flock($fileHandle, LOCK_UN);

        // Close the file
        fclose($fileHandle);
    }

    public static function read()
    {
        // Define the path to the log file
        $logFilePath = __DIR__ . "/../../resources/messages.txt";

        // Read messages from the log file
        return file($logFilePath, FILE_IGNORE_NEW_LINES | FILE_SKIP_EMPTY_LINES);
    }
}

?>