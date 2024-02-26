<?php
namespace app\models;

class Message
{

	public $email;
	public $message;

	public $IP;

	public function __construct($object = null)
	{
		if ($object == null)
			return;
		//TODO: avoid this running when there is no parameter
		$this->email = $object->email;
		$this->message = $object->message;
		$this->IP = $object->ip;
	}
	public function insert()
	{
		$filename = __DIR__ . "/../../resources/messages.txt";

		$file_handle = fopen($filename, 'a');

		flock($file_handle, LOCK_EX);

		$data = json_encode($this);

		fwrite($file_handle, $data . "\n");

		flock($file_handle, LOCK_UN);

		fclose($file_handle);
	}

	public static function read()
	{
		// Define the path to the log file
		$logFilePath = __DIR__ . "/../../resources/messages.txt";

		// Read messages from the log file
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

	public static function getAll(){
		//read the file and return the collection of people (all Person records)
		$filename = __DIR__ . "/../../resources/messages.txt";
		$records = file($filename);
		//TODO: process the JSON strings into objects
		foreach ($records as $key => $value) {
			//can I typecase objects in PHP?
			$object = json_decode($value);
			$person = new \app\models\Message($object);
			$records[$key] = $person;
		}
		return $records;
	}

}