<?php

namespace app\controllers;

use stdClass; // Importing the stdClass class

class Message extends \app\core\Controller
{
    // Method for displaying the contact page
    function contact()
    {
        $this->view('Message/contact');
    }

    // Method for reading and displaying messages
    public function read()
    {
        // Check if the request method is POST
        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            // Create a new Message object with form data
            $message = new \app\models\Message();
            $message->email = $_POST['email'] ?? '';
            $message->message = $_POST['message'] ?? '';
            $message->IP = $_SERVER['REMOTE_ADDR'];

            // Insert the message into insert
            $message->insert();
        }

        // Call the getAll method of the Message model to retrieve messages
        $messages = \app\models\Message::getAll();
        
        // Pass the messages to the view for display
        $this->view('Message/read', ['messages' => $messages]);
    }
}
