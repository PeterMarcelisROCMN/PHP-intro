<?php

class Message {

    // properties of the Message class
    public $message_id;
    public $author;
    private $message;
    public $timeStamp;

    // constructor of the Message class
    public function __construct($message_id, $author, $message, $timeStamp) {
        $this->message_id = $message_id;
        $this->author = $author;
        $this->message = $message;
        $this->timeStamp = $timeStamp;
    }

    // Method to get the message ID
    public function getMessageId() {
        return $this->message_id;
    }

    // Method to get the author of the message
    public function getAuthor() {
        return $this->author;
    }

    // Method to get the message
    public function getMessage() {
        return $this->message;
    }

    // Method to get the timestamp of the message
    public function getTimeStamp() {
        // Parse Unix timestamp
        $timestamp = DateTime::createFromFormat('U', $this->timeStamp);
        
        // Check if parsing was successful
        if ($timestamp === false) {
            // Handle parsing error
            return 'Invalid timestamp'; // or any other error handling mechanism
        }
        
        // Format the timestamp as desired
        return $timestamp->format('Y-m-d H:i:s');
    }

    // Method to retrieve the message(s) from the a CSV file
    public static function getAllMessagesFromCSV($filename) {
        $messages = [];

        if (($handle = fopen($filename, "r")) !== FALSE) {
            $headers = fgetcsv($handle);

            $headerMap = array_flip($headers);

            while (($data = fgetcsv($handle)) !== FALSE) {
                $message_id = $data[$headerMap['message_id']];
                $author = $data[$headerMap['author']];
                $message = $data[$headerMap['message']];
                $timeStamp = $data[$headerMap['timeStamp']];

                $messageObject = new Message($message_id, $author, $message, $timeStamp);
                $messages[] = $messageObject;
            }

            fclose($handle);
        }

        return $messages;
    }

    public static function getFilteredMessages($filename, $author) {
        $messages =  self::getAllMessagesFromCSV($filename);
    
        if ($author === null) {
            return $messages;
        } else {
            $messagesByAuthor = array_filter($messages, function($message) use ($author) {
                // Convert both the author's name and the filter value to lowercase for case-insensitive comparison
                $messageAuthor = strtolower($message->getAuthor());
                $filterAuthor = strtolower($author);
                // Check if the filter value is found within the author's name
                return strpos($messageAuthor, $filterAuthor) !== false;
            });
            
            return $messagesByAuthor;
        }
    }
}