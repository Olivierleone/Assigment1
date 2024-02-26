<?php
namespace app\controllers;

use stdClass;

class Message extends \app\core\Controller
{

    function contact()
    {
        $this->view('Message/contact');
    }


    public function read()
    {
        // Create a new Message object
        $message = new \app\models\Message();

        // Set the properties from the form data
        $message->email = $_POST['email'];
        $message->message = $_POST['message'];
        $message->IP = $_SERVER['REMOTE_ADDR'];

        // Insert the message into the log file
        $message->insert();

        // Read all messages from the log file
        $messages = \app\models\Message::getAll();

        // Pass the messages to the view for display
        $this->view('Message/read', ['messages' => $messages]);
    }
}