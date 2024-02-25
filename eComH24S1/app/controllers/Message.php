<?php
namespace app\controllers;

use stdClass;

class Message extends \app\core\Controller{

function list(){

    $message = \app\models\Message::getAll();
    $this->view('Message/list',$message);

}

    function contact(){
        $this->view('Message/contact');
    }


    function viewmessage(){


        $message = new \app\models\Message();

        $message->email = $_POST['email'];
        $message->message = $_POST['message'];

        $message->insert();
        $this->view('Message/viewmessage',$message);
    }




}