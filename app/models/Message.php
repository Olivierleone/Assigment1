<?php

namespace app\models;

class Message {
    public $name;
    public $email;
    public $message;
    public $ip;

    public function write() {
        // Encode message as JSON
        $messageData = json_encode($this) . PHP_EOL;

        // Define the path to the log file
        $logFilePath = __DIR__ . "/../../resources/messages.txt";

        // Open the log file for appending
        $fileHandle = fopen($logFilePath, "a");

        // Lock the file for writing
        flock($fileHandle, LOCK_EX);

        // Write message to the file
        fwrite($fileHandle, $messageData);

        // Close the file
        fclose($fileHandle);
    }

    public function read() {
        // Define the path to the log file
        $logFilePath = __DIR__ . "/../../resources/messages.txt";

        // Read messages from the log file
        $messages = file($logFilePath, FILE_IGNORE_NEW_LINES | FILE_SKIP_EMPTY_LINES);

        // Decode JSON messages
        $decodedMessages = [];
        foreach ($messages as $message) {
            $decodedMessages[] = json_decode($message);
        }

        return $decodedMessages;
    }
}

?>