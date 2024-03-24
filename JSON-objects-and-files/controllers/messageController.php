<?php
// Controller.php
require_once 'models/message.php';
require_once 'views/messageView.php';

$filename = "files/csv-files/messages.csv";
// Get filter criteria from the form
$authorFilter = isset($_GET['author']) ? $_GET['author'] : null;
$messages = Message::getFilteredMessages($filename, $authorFilter);

displayMessages($messages);