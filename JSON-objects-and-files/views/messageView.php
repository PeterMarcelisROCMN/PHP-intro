<?php
// View.php
function displayMessages($messages) {
    if (empty($messages)) {
        echo "No messages found";
        return;
    }else{
    foreach ($messages as $message) {
        echo "Message ID: " . $message->getMessageId() . "<br>";
        echo "Author: " . $message->getAuthor() . "<br>";
        echo "Message: " . $message->getMessage() . "<br>";
        echo "Timestamp: " . $message->getTimeStamp() . "<br>";
        echo "<br>";
    }
}
}