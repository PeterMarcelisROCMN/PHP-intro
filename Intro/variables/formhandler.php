<?php

if($_SERVER["REQUEST_METHOD"] == "POST")
{

    $name = $_POST['name'];

    // JS insertion example
    // $name = "<script> setInterval(function(){
    //     alert('help');
    // }, 100); </script>";

    echo $name;
    // retrieving file

    
    if ($_FILES['uploadedFile']['size'] > 0){

        $uploadedFile = $_FILES['uploadedFile'];
        
        echo "The username $name has been entered with an email of $email. <br>
        The file's name is " . $uploadedFile['name'];
    } 


    // header("location: index.php");
} else
{
    header("location: index.php");
}
