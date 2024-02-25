<?php
namespace app\models;

class Message{

	public $email;
	public $message;

public function __construct($object = null){
			if($object == null)
				return; 
			//TODO: avoid this running when there is no parameter
			$this->email = $object->email;
			$this->message = $object->message;
		
		}



		public function insert(){


			$filename = 'resources/Messages.txt';

			$file_handle = fopen($filename, 'a');

			flock($file_handle, LOCK_EX);

			$data = json_encode($this);

			fwrite($file_handle, $data . "\n");

			flock($file_handle, LOCK_UN);

			fclose($file_handle);
		}



		public static function getAll(){


			$filename = 'resources/Messages.txt';

			$records = file($filename);


			foreach ($records as $key => $value) {
				$object = json_decode($value);
				$message = new \app\models\Message($object);
				$records[$key] = $message;
			}

			return $records;
		}


}