<?php

namespace app\models;

class Message
{
    // Email of the message sender
    public $email; 

    // Content of the message
    public $message; 

    // IP address of the sender
    public $IP; 

    //constructor 
    public function __construct($object = null)
    {
        if ($object == null)
            return;

        $this->email = $object->email;
        $this->message = $object->message;
        $this->IP = $object->IP;
    }

    // Method to insert a message into the log file
    public function insert()
    {
        // Define the path to the message log file:
        // __DIR__ represents the directory of the current file.
        $filename = __DIR__ . "/../../resources/messages.txt";

        // Open the log file for appending
        $file_handle = fopen($filename, 'a');

        // Lock the file for exclusive writing
        flock($file_handle, LOCK_EX);

        // Convert the message object to JSON format
        $data = json_encode($this);

        // Write the JSON data to the log file
        fwrite($file_handle, $data . "\n");

        // Release the lock
        flock($file_handle, LOCK_UN);

        // Close the file handle
        fclose($file_handle);
    }

    // Method to read messages from the log file
    public static function read()
    {
        // Define the path to the log file
        // __DIR__ represents the directory of the current file.
        $logFilePath = __DIR__ . "/../../resources/messages.txt";

        // Read messages from the log file:
        // The FILE_IGNORE_NEW_LINES flag ensures that each line read from the file does not include the newline character (\n).
        // The FILE_SKIP_EMPTY_LINES flag skips any empty lines in the file.
        $lines = file($logFilePath, FILE_IGNORE_NEW_LINES | FILE_SKIP_EMPTY_LINES);

        // Initialize an empty array to store parsed messages
        $messages = [];

        // Iterate over each line and parse JSON data into objects
        foreach ($lines as $line) {

            // Decode JSON data into an associative array
            $data = json_decode($line, true);

            // Create a new Message object and add it to the messages array
            $message = new Message();
            $message->email = $data['email'];
            $message->message = $data['message'];
            $messages[] = $message;
        }

        // Return the array of parsed messages
        return $messages;
    }

    // Method to get all messages from the log file
    public static function getAll()
    {
        // Define the path to the log file
        // __DIR__ represents the directory of the current file.
        $logFilePath = __DIR__ . "/../../resources/messages.txt";

        // Read messages from the log file
        //// The FILE_IGNORE_NEW_LINES flag ensures that each line read from the file does not include the newline character (\n).
        // The FILE_SKIP_EMPTY_LINES flag skips any empty lines in the file.
        $lines = file($logFilePath, FILE_IGNORE_NEW_LINES | FILE_SKIP_EMPTY_LINES);

        // Initialize an empty array to store parsed messages
        $messages = [];

        // Iterate over each line and parse JSON data into objects
        foreach ($lines as $line) {
            // Decode JSON data into an object
            $data = json_decode($line);

            // Check if decoding was successful and data exists
            if ($data !== null && isset($data->email) && isset($data->message)) {
                // Create a new Message object and add it to the messages array
                $message = new Message();
                $message->email = $data->email;
                $message->message = $data->message;
                $messages[] = $message;
            }
        }

        // Return the array of parsed messages
        return $messages;
    }
}
