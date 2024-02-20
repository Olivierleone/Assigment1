<?php

namespace app\controllers;

use app\core\Controller;

use app\models\Message;

class ContactController extends Controller{

	public function index(){

		//land on the contact us form view
		 $this->view('Contact/index');
	}

		public function submit(){
			//recive data from the form
		$name = $_POST['name'];
        $email = $_POST['email'];
        $message = $_POST['message'];
        // Get IP address
        $ip = $_SERVER['REMOTE_ADDR'];

        // Create a new Message model object
        $newMessage = new Message();
        $newMessage->name = $name;
        $newMessage->email = $email;
        $newMessage->message = $message;
        $newMessage->ip = $ip;

        // Write the message to the log file
        $newMessage->write();

        // Redirect to the message log page
        header('Location: /Contact/read');
        exit;
    }

public function read(){
    // Create a new Message model object
    $messageModel = new Message();

    // Read messages from the log file
    $messages = $messageModel->read();

    // Pass the messages to the view for display
    $this->view('Contact/read', ['messages' => $messages]);
}


}
		
	
	


?>